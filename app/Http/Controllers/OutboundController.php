<?php

namespace App\Http\Controllers;

use App\Models\outbound;
use Illuminate\Http\Request;

class OutboundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outbound = outbound::all();

        return response()->json([
            'msg' => "Get Method Success",
            'data' => $outbound
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
        $outbound = new outbound;
        $outbound->id_customer = $request->id_customer;
        $outbound->id_employment = $request->id_employment;
        $outbound->date = $request->date;
        $outbound->total = $request->total;

        $outbound->save();

        return response()->json([
            'msg' => 'Post method Success',
            'data' => $outbound
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
        $outbound = outbound::where('faktur', $id)->get();
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $outbound
        ]);
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
    public function laporan_penjualan()
    {
        return view('laporan.penjualan');
    }

    public function cetak_laporan($tgl_awal, $tgl_akhir)
    {
        // dd("Tanggal Awal".$tgl_awal. "Tanggal Akhir". $tgl_akhir);
        // $this->validate($request, [
        //     'tgl_awal' => 'required|date',
        //     'tgl_akhir' => 'required|date',
        // ]);
        
        $cetak = outbound::with('employment')->whereBetween('date', [$tgl_awal, $tgl_akhir])->get();

        // dd($cetak);
        return response()->json([
            "msg" => "GET ID Method Success",
            "data" => $cetak
        ]);
        // return view('laporan.cetak_penjualan',['outbound'=>$cetak]);
    }
}
