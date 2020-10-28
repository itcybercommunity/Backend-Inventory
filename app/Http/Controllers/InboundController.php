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
        $this->validate($request, [
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
        ]);
        $cetak = inbound::whereBetween('date', [$tgl_awal, $tgl_akhir])->get();

        // dd($cetak);
        return view('laporan.cetak_brg_masuk',['inbound'=>$cetak]);
    }
}
