<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use App\Models\ClaimRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimRequestController extends Controller
{
    public function create($id)
    {
        $item = FoundItem::findOrFail($id);

        return view('mahasiswa.claim-form', compact('item'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'phone' => 'required',
            'notes' => 'required',
        ]);

        ClaimRequest::create([
            'found_item_id' => $id,
            'user_id' => auth()->check() ? auth()->id() : null,
            'nim' => $request->nim,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('item.show', $id)
            ->with('success', 'Klaim berhasil dikirim, tunggu persetujuan admin.');
    }

}
