<?php

namespace App\Http\Controllers;

use App\Models\inbound;
use Illuminate\Http\Request;

class InboundController extends Controller
{
    //
    public function laporan_brg_masuk()
    {
        return view('laporan.brg_masuk');
    }

    public function cetak_laporan($tgl_awal, $tgl_akhir)
    {
        // dd("Tanggal Awal".$tgl_awal. "Tanggal Akhir". $tgl_akhir);
        $cetak = inbound::whereBetween('date', [$tgl_awal, $tgl_akhir])->get();

        // dd($cetak);
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $cetak
        ]);
        // return view('laporan.cetak_brg_masuk',['inbound'=>$cetak]);
    }
}
