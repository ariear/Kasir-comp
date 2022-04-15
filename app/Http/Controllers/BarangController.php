<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.barang.barang',[
            'barangs' => Barang::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.barang.create',[
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'id_barang' => 'required|unique:barangs',
            'category_id' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'stock' => 'required|integer',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer'
        ]);

        Barang::create($validasi);

        return redirect('/dashboard/barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('dashboard.barang.edit',[
            'barangs' => $barang,
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'category_id' => 'required',
            'nama_barang' => 'required',
            'merk' => 'required',
            'stock' => 'required|integer',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer'
        ];

        if ($request->id_barang != $barang->id_barang) {
            $rules['id_barang'] = 'required|unique:barangs';
        }

        $validasi = $request->validate($rules);

        $barang->update($validasi);

        return redirect('dashboard/barang')->with('success', 'Barang berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return back()->with('success', 'Barang berhasi dihapus');
    }
}
