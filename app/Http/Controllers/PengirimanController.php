<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang;
use App\Models\ModelNotaRetur;
use App\Models\ModelPengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Pengiriman',
            'data_nota' => ModelNotaRetur::join('barang', 'barang.id', '=', 'nota_retur.barang_id')
                ->select('nota_retur.*', 'barang.nama_barang')->get(),
            // 'data_pengiriman' => ModelPengiriman::all(),
            'data_pengiriman' => ModelPengiriman::join('nota_retur', 'nota_retur_id', '=', 'pengiriman.nota_retur_id')
                ->join('barang', 'barang.id', '=', 'nota_retur.barang_id')
                ->get(),
        );
        return view('pengiriman', $data);
    }
    public function tambahpengiriman(Request $request, $id)
    {

        ModelPengiriman::create([
            'nota_retur_id' => $request->nota_retur_id,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
            'status_pengiriman' => $request->status_pengiriman,
            'catatan' => $request->catatan,
        ]);
        $request->merge(['status_pengiriman' => 'dikirim']);
        ModelNotaRetur::where('id', $id)
            ->where('id', $id)
            ->update([
                'status_pengiriman' => $request->status_pengiriman,
            ]);
        return redirect('/pengiriman')->with('success', 'Data Berhasil Disimpan');
    }
    public function updatepengiriman(Request $request, $id)
    {
        ModelPengiriman::where('id', $id)
            ->where('id', $id)
            ->update([
                'tanggal_pengiriman' => $request->tanggal_pengiriman,
                'status_pengiriman' => $request->status_pengiriman,
                'catatan' => $request->catatan,
            ]);
        return redirect('/pengiriman')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function destroypengiriman($id)
    {
        ModelPengiriman::where('id', $id)->delete();
        return redirect('/pengiriman')->with('success', 'Data Berhasil Ditambahkan');
    }
}
