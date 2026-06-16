<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\FoundItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
 public function index(Request $request)
{
    $categories = Category::all();

    $query = FoundItem::where('status', 'Tersedia');

    // SEARCH BAR
    if ($request->filled('search')) {

        $query->where('item_name', 'like', '%' . $request->search . '%');

    }

    // FILTER KATEGORI
    if ($request->filled('category_id')) {

        $query->where('category_id', $request->category_id);

    }

    $items = $query
        ->latest()
        ->get();

    return view(
        'mahasiswa.dashboard',
        compact('items', 'categories')
    );
}
    public function account()
    {
        return view('mahasiswa.account');
    }
}