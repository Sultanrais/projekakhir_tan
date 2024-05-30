<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Produk',
            'produk' => Produk::paginate(10),
            'content' => '/admin/produk/index'

        ];
        return view('admin.layout.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = [
            'title' => 'Tambah Produk',
            'content' => '/admin/produk/create'

        ];
        return view('admin.layout.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required|unique:kategoris'
        ]);
        Produk::create($data);
        Alert::success('Sukses', 'Data Berhasil Di Tambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = [
            'title' => 'Tambah Produk',
            'produk' => Produk::find($id),
            'content' => '/admin/kategori/create'

        ];
        return view('admin.layout.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produk = Produk::find($id);
        $data = $request->validate([
            'name' => 'required|unique:kategoris,name' . $produk->id
        ]);
        $produk->update($data);
        Alert::success('Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produk = Produk::find($id);
        $produk-> delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}