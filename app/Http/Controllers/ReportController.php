<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $items = DB::select("CALL GetItemsReport()");

        return view('report', compact('items'));
    }
    public function available()
{
    $items = DB::select("CALL GetAvailableItems()");

    return view('available-items', compact('items'));
}
public function taken()
{
    $items = DB::select("CALL GetTakenItems()");

    return view('taken-items', compact('items'));
}
}