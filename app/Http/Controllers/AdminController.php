<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelNotaRetur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Admin',
            'data_barang' => ModelBarang::all(),
            'data_nota' => ModelNotaRetur::join('barang', 'barang.id', '=', 'nota_retur.barang_id')
                ->select('nota_retur.*', 'barang.nama_barang')->get(),

        );
        return view('admin', $data);
    }
    public function tambahnota(Request $request, $id)
    {
        ModelNotaRetur::create([
            'barang_id' => $request->barang_id,
            'tanggal_nota' => $request->tanggal_nota,
            'total_harga' => $request->total_harga,
            'status_nota' => $request->status_nota,

        ]);
        $request->merge(['nota_retur' => 'yes']);
        ModelBarang::where('id', $id)
            ->update([
                'nota_retur' => $request->nota_retur,
            ]);

        return redirect('/admin')->with('success', 'Data Berhasil Disimpan');
    }

    public function updatenota(Request $request, $id)
    {
        ModelNotaRetur::where('id', $id)
            ->where('id', $id)
            ->update([
                'tanggal_nota' => $request->tanggal_nota,
                'total_harga' => $request->total_harga,
                'status_nota' => $request->status_nota,
            ]);
        return redirect('/admin')->with('success', 'Data Berhasil Diupdate');
    }
    public function destroynota(Request $request, $id)
    {
        
        // Dapatkan data nota retur yang akan dihapus
    $notaRetur = ModelNotaRetur::where('id', $id)->first();

    // Hapus data nota retur
    ModelNotaRetur::where('id', $id)->delete();

    // Perbarui barang
    if ($notaRetur) {
        ModelBarang::where('id', $notaRetur->barang_id)
            ->update([
                'nota_retur' => 'no',
            ]);
    }
        return redirect('/admin')->with('success', 'Data Berhasil dihapus');
    }
}
