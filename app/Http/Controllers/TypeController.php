<?php

namespace App\Http\Controllers;

use App\Models\type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type = type::all();
        return response()->json([
            "msg" => "Method GET Success",
            "data" => $type
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
        $type = new type;
        $type->type = $request->type;

        $type->save();

        return response()->json([
            "msg" => "Post Method Success",
            "data" => $type
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
        $type = type::where('id',$id)->first();

        if ($type) {
            $type->type = $request->type ? $request->type : $type->type;
            $type->save();

            return response()->json([
                "msg" => "PUT method Success",
                "data" => $type
            ]);
            
            return response()->json([
                "msg" => "PUT method Failed". $id. " Not Found",
            ], 400);
        }
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
        $type = type::where('id', $id)->first();
        if ($type) {
            $type->delete();
            return response()->json([
                "msg" => "Delete Method Success"
            ]);
        }

        return response()->json([
            "msg" => "Delete Method Failed ". $id . " Not Found"
        ], 400);
    }
}
