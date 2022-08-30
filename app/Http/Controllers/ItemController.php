<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('order', 'ASC')->get();
        $no = 1;
    
        return view('table_item',compact('items', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        if (isset($request->desc)) {
           $desc = $request->desc;
        } else {
            $desc = '-';
        }

        $cek = Item::all()->toArray();
        if (empty($cek)) {
            $order = 1;
        }else {
            $order = count($cek)+1;
        }
        
        $post = Item::create([
            'title'=> $request->title,
            'image'=> $profileImage,
            'desc'=> $desc,
            'status' => 1,
            'order' => $order,
        ]);

        if($post) {
            return back()->with("success", "Berhasil! data telah ditambahkan");
        } else {
            return back()->with("failed", "Gagal! gagal menambahkan data");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::where('id',$id)->first()->toArray();
        $allItem = Item::all()->toArray();
        $total = count($allItem);
        return view('edit_item', compact('item', 'total'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'order' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            $profileImage = Item::where('id', $id)->value('image');
        }

        if (isset($request->desc)) {
            $desc = $request->desc;
        } else {
            $desc = '-';
        }

        if (isset($request->status)) {
            $status = 1;
        }else {
            $status = 0;
        }
        
        $itemOrder = Item::where('id', $id)->value('order');
        $itemOtherId = Item::where('order', $request->order)->first()->value('id');
        
        $update = Item::where('id', $id)->update([
            'title'=> $request->title,
            'image'=> $profileImage,
            'desc'=> $desc,
            'status' => $status,
            'order' => $request->order,
        ]);

        $updateOtherItem = Item::where('id', $itemOtherId)->update([
            'order' => $itemOrder,
        ]);

        if($update && $updateOtherItem) {
            return back()->with("success", "Berhasil! data telah diperbarui");
        } else {
            return back()->with("failed", "Gagal! gagal memperbarui data");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::where('id',$id)->delete();
        return back()->with("success", "Berhasil! data telah dihapus");
    }
}
