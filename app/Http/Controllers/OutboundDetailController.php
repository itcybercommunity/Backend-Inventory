<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\outbound_detail;

class OutboundDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outboundDetail = outbound_detail::all();

        return response()->json([
            'msg' => 'GET Method Success',
            'data' => $outboundDetail
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
        $outboundDetail = new outbound_detail;

        $outboundDetail->faktur_outbound = $request->faktur_outbound;
        $outboundDetail->faktur_inbound_detail = $request->faktur_inbound_detail;
        $outboundDetail->qty = $request->qty;
        $outboundDetail->total = $request->total;


        $outboundDetail->save();

        return response()->json([
            "msg" => "POST Method Success",
            "data" => $outboundDetail
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
        $outboundDetail = outbound_detail::where('id', $id)->get();
        return response()->json([
            "msg" => "Get Method Success",
            "data" => $outboundDetail
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
        $outboundDetail = outbound_detail::where('id', $id)->first();

        if ($outboundDetail) {
            $outboundDetail->faktur_outbound = $request->faktur_outbound ?  $request->faktur_outbound : $outboundDetail->faktur_outbound ;
            $outboundDetail->faktur_inbound_detail = $request->faktur_inbound_detail ?  $request->faktur_inbound_detail : $outboundDetail->faktur_inbound_detail;
            $outboundDetail->qty = $request->qty ?  $request->qty : $outboundDetail->qty;
            $outboundDetail->total = $request->total ?  $request->total : $outboundDetail->total;

            $outboundDetail->save();
            return response()->json([
                'msg' => "PUT Method Success",
                'data' => $outboundDetail
            ]);
        }
        return response()->json([
            "msg" => "PUT Method Failed ".$id
        ]);

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
        $outboundDetail = outbound_detail::where('id', $id)->first();

        if ($outboundDetail) {
            $outboundDetail->delete();
            return response()->json([
                "msg" => "Delete Method Success"
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed ".$id. " Not Found"
        ], 400);
    }


}
