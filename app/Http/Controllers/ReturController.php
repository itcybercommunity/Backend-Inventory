<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ReturController;
use App\Models\retur;

class ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $retur = retur::all();

        return response()->json([
            "msg" => "GET Method Success",
            "data" => $retur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $retur = new retur;

        $retur->date = $request->date;
        $retur->qty = $request->qty;
        $retur->reason = $request->reason;
        $retur->id_outbound_detail = $request->id_outbound_detail;
        $retur->id_roadblock = $request->id_roadblock;

        $retur->save();

        return response()->json([
            'msg' => "POST Method Success",
            'data' => $retur
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function laporan_retur()
    {
        return view('laporan.retur');
    }

    public function cetak_laporan($tgl_awal, $tgl_akhir)
    {
        // dd("Tanggal Awal".$tgl_awal. "Tanggal Akhir". $tgl_akhir);
        $cetak = retur::whereBetween('date', [$tgl_awal, $tgl_akhir])->get();

        // dd($cetak);
        // return view('laporan.cetak_retur',['retur'=>$cetak]);
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $cetak
        ]);
    }
}
