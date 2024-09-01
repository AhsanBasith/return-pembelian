<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class GudangController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Gudang',
            'data_barang' => ModelBarang::all(),
        );
        return view('gudang', $data);
    }
    public function storebarang(Request $request)
    {
        ModelBarang::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'supplier' => $request->supplier,
        ]);
        return redirect('/gudang')->with('success', 'Data Berhasil Disimpan');
    }
    public function updatebarang(Request $request, $id)
    {
        ModelBarang::where('id', $id)
            ->where('id', $id)
            ->update([
                'nama_barang' => $request->nama_barang,
                'kode_barang' => $request->kode_barang,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                // 'stok' => $request->stok,
                'supplier' => $request->supplier,
            ]);
        return redirect('/gudang')->with('success', 'Data Berhasil Diubah');
    }

    // Kualitas Barang

    public function updatekualitas(Request $request, $id)
    {
        ModelBarang::where('id', $id)
            ->where('id', $id)
            ->update([
                'kualitas' => $request->kualitas,
            ]);
        return redirect('/gudang')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function destroybarang($id)
    {
        ModelBarang::where('id', $id)->delete();
        return redirect('/gudang')->with('success', 'Data Berhasil Ditambahkan');
    }
}
