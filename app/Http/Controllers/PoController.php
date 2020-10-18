<?php

namespace App\Http\Controllers;

use App\Models\po;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $po = po::all();
        return response()->json([
            "msg" => "Get Method Success",
            "data"=> $po
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
        $po = new po;
        $po->date = $request->date;
        $po->total = $request->total;
        $po->id_employment = $request->id_employment;
        $po->id_supplier = $request->id_supplier;
        $po->status = $request->status;

        $po->save();
        return response()->json([
            "msg" => "Success",
            "data" => $po
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
        $po =  po::where('faktur',$id)->first();
        if ($po) {
            $po->date = $request->date ? $request->date : $po->date;
            $po->total = $request->total ? $request->total : $po->total;
            $po->id_employment = $request->id_employment ? $request->id_employment : $po->id_employment;
            $po->id_supplier = $request->id_supplier ? $request->id_supplier : $po->id_supplier;
            $po->status = $request->status ? $request->status : $po->status;

            $po->save();
            return response()->json([ 
                "msg" => "PUT Method Success ",
                "data" => $po
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
        $po =  po::where('faktur',$id)->first();
        if ($po) {
            $po->delete();
            return response()->json([ 
                "msg" => "Delete Method Success ". $id
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed ".$id. " Not Found"
        ], 400);
    }
}
