<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;

class HomeController extends Controller
{
    public function index()
    {
        $items = FoundItem::latest()
            ->take(6)
            ->get();

        return view('home', compact('items'));
    }
}