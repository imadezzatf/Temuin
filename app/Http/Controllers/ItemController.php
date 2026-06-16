<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;

class ItemController extends Controller
{
    public function show($id)
    {
        $item = FoundItem::findOrFail($id);

        return view('mahasiswa.detail-item', compact('item'));
    }
}