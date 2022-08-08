<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Prestasi::all();
        $no = 1;
    
        return view('table_prestasi',compact('datas', 'no'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestasi');
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
            'name' => 'required',
            'date' => 'required',
            'students' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "-prestasi" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        $post = Prestasi::create([
            'name' => $request->name,
            'date' => $request->date,
            'students' => $request->students,
            'image' => $profileImage,
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
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        // 
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestasi $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = Prestasi::where('id',$id)->first()->toArray();
        return view('edit_prestasi', compact('prestasi'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required',
            'students' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "-prestasi" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            $profileImage = Prestasi::where('id', $id)->value('image');
        }
          
        $update = Prestasi::where('id', $id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'students' => $request->students,
            'image' => $profileImage,
        ]);

        if($update) {
            return back()->with("success", "Berhasil! data telah diperbarui");
        } else {
            return back()->with("failed", "Gagal! gagal memperbarui data");
        }
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prestasi::where('id',$id)->delete();
        return back()->with("success", "Berhasil! data telah dihapus"); 
    }
}