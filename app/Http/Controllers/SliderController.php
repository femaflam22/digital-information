<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Prestasi;

class SliderController extends Controller
{
    public function index()
    {
        $items = Item::where('status', 1)->orderBy('order', 'asc')->get();
        $no = Item::orderBy('id', 'asc')->limit(1)->value('id');
        $prestasi = Prestasi::all();

        return view('index', compact('items', 'prestasi', 'no'));
    }
}
