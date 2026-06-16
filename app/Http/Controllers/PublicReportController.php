<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoundItem;
use App\Models\Category;
use App\Models\SecurityPost;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Tag;

class PublicReportController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $posts = SecurityPost::all();
        $tags = Tag::all();


        return view('report', compact(
            'categories',
            'posts',
            'tags'
        ));
    }

    public function store(Request $request)
    {
        // Validasi disesuaikan karena 'photo' sekarang dikirim via string Base64 hidden input
        $request->validate([
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'security_post_id' => 'required|exists:security_posts,id',
            'photo_base64' => 'required|string', // Validasi string base64 hasil jepret kamera live
            'location_found' => 'required|string|max:255',
            'reporter_name' => 'nullable|string|max:255',
            'reporter_phone' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $photoPath = null;

        // Proses decoding gambar Base64 dari Kamera Live Web
        if ($request->filled('photo_base64')) {
            $imageData = $request->photo_base64;

            // Bersihkan header format data URL base64 jika ada (ex: data:image/jpeg;base64,)
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData, $type)) {
                $imageData = substr($imageData, strpos($imageData, ',') + 1);
                $extension = strtolower($type[1]); // png, jpeg, jpg
            } else {
                $extension = 'jpg'; // Default extension
            }

            // Ganti spasi menjadi plus (karena translasi request url)
            $imageData = str_replace(' ', '+', $imageData);
            $decodedImage = base64_decode($imageData);

            if ($decodedImage !== false) {
                // Generate nama file unik & simpan ke dalam folder storage/app/public/found-items
                $fileName = 'found-items/' . Str::random(40) . '.' . $extension;
                Storage::disk('public')->put($fileName, $decodedImage);
                $photoPath = $fileName;
            }
        }

        // Simpan data laporan lengkap ke database
        $foundItem = FoundItem::create([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'security_post_id' => $request->security_post_id,
            'location_found' => $request->location_found,
            'reporter_name' => $request->reporter_name,
            'reporter_phone' => $request->reporter_phone,
            'description' => $request->description,
            'photo' => $photoPath,
            'created_by' => 1,
            'found_at' => now(),
            'status' => 'Tersedia',
        ]);

        if ($request->has('tags')) {
            $foundItem->tags()->sync($request->tags);
        }
       // Jika user sudah login (Mahasiswa), arahkan ke dashboard
        if (auth()->check()) {
            return redirect()->route('dashboard')->with('success', 'Laporan barang temuan berhasil dibuat!');
        }

        // Jika user tidak login (Publik/Anonim), arahkan ke Landing Page utama
        return redirect()->route('home')->with('success', 'Laporan barang temuan berhasil dikirim! Terima kasih.');
    }
}