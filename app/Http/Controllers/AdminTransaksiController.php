<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Transaksi',
            'transaksi' => Transaksi::paginate(10),
            'content' => '/admin/transaksi/index'

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
            'user_id' => auth()->user()->id,
            'kasir_name' => auth()->user()->name,
            'total' => 0
            
        ];
        $transaksi = Transaksi::create($data);
         return redirect('/admin/transaksi/'. $transaksi->id.'/edit');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validate request data if necessary
        // $request->validate([...]);

        // Buat data untuk transaksi baru
        $data = [
            'user_id' => auth()->user()->id,
            'kasir_name' => auth()->user()->name,
            'total' => 0
        ];

        // Buat objek transaksi
        $transaksi = Transaksi::create($data);

        // Periksa apakah transaksi berhasil dibuat
        if ($transaksi) {
            // Redirect ke halaman edit transaksi yang baru
            return redirect('/admin/transaksi/' . $transaksi->id . '/edit');
        } else {
            // Penanganan kesalahan jika pembuatan transaksi gagal
            return back()->with('error', 'Gagal membuat transaksi.');
        }
    } catch (\Exception $e) {
        // Penanganan kesalahan jika terjadi pengecualian
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
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
        $produk = Produk::get();

        $produk_id = request('produk_id');
        $p_detail = Produk::find($produk_id);

        $transaksi_detail = TransaksiDetail::WhereTransaksiId($id)->get();

        $act = request('act');
        $qty = request('qty');
        if($act == 'min'){
            if($qty <= 1) {

                $qty = 1;
            }else{
                $qty = $qty - 1;
            }
        }else{
            $qty = $qty +1;
        }
$subtotal = 0;
if($p_detail){
    $subtotal = $qty * $p_detail->harga;

}

        $data = [
            'title' => 'Tambah Transaksi',
            'produk' => $produk,
            'p_detail' => $p_detail,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'transaksi_detail' => $transaksi_detail,
            'content' => '/admin/transaksi/create'

        ];
        return view('admin.layout.wrapper', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
