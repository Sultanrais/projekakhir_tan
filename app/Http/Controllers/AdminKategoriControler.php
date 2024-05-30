<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKategoriControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Kategori',
            'kategori' => kategori::paginate(10),
            'content' => '/admin/kategori/index'

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
            'title' => 'Tambah Kategori',
            'content' => '/admin/kategori/create'

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
        kategori::create($data);
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
            'title' => 'Tambah Kategori',
            'kategori' => kategori::find($id),
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
        $kategori = kategori::find($id);
        $data = $request->validate([
            'name' => 'required|unique:kategoris,name' . $kategori->id
        ]);
        $kategori->update($data);
        Alert::success('Sukses', 'Data Berhasil Diedit');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kategori = kategori::find($id);
        $kategori-> delete();
        Alert::success('Sukses', 'Data Berhasil Dihapus');
        return redirect()->back();
    }
}
