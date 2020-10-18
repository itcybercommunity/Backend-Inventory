<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = product::all();
        return response()->json([
            "msg" => "GET method Success",
            "data" => $product
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
        $product = new product;
        $product->name = $request->name;
        $product->id_type = $request->id_type;

        $product->save();
        return response()->json([
            "msg" => "Post Method Success",
            "data" => $product
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
        $product = product::where('code', $id)->first();

        if ($product) {
            $product->name = $request->name ? $request->name : $product->name;
            $product->id_type = $request->id_type ? $request->id_type : $product->id_type;

            $product->save();

            return response()->json([
                "msg" => "PUT Method Success",
                "data" => $product
            ]);

        }
        return response()->json([
            "msg" => "Delete Method Failed, Id ". $id . " Not Found"
        ], 400);
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
        $product = product::where('code', $id)->first();

        if ($product) {
            $product->delete();
            return response()->json([
                "msg" => "Delete Method Success"
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed, ID ". $id . " Not Found"
        ], 400);
    }
}
