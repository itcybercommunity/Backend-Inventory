<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = supplier::all();


        // return view('supplier.index', ['supplier' => $supplier]);
        return response()->json([
            'msg' => 'GET Method Success',
            'data' => $supplier
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier/add');
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
        // $this->validate($request,[
        //     'name' => 'required',
        //     'address' => 'required'
        // ]);

        // supplier::create([
        //     'name' => $request->name,
        //     'address' => $request->address
        // ]);

        // return redirect('supplier')->with('message', 'Data Berhasil Disimpan');

        $supplier = new supplier;

        $supplier->name = $request->name;
        $supplier->address = $request->address;

        $supplier->save();

        return response()->json([
            'msg' => 'Post Method Success',
            'data' => $supplier
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
        $supplier = supplier::find($id);
        return view('supplier.update', ['supplier' => $supplier]);
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
        // $this->validate($request,[
        //     'name' => 'required',
        //     'address' => 'required'
        // ]);
        // $supplier = supplier::find($id);
        // $supplier->name = $request->name;
        // $supplier->address = $request->address;

        // $supplier->save();
        // return redirect('/supplier')->with('message', 'Data Berhasil Diupdate');

        $supplier = supplier::where('id', $id)->first();

        if ($supplier) {
            $supplier->name = $request->name ? $request->name : $supplier->name;
            $supplier->address = $request->address ? $request->address : $supplier->address;

            $supplier->save();

            return response()->json([ 
                "msg" => "PUT Method Success ",
                "data" => $supplier
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
        // $supplier = supplier::find($id);
        // $supplier->delete();
        // return redirect('/supplier')->with('message', 'Data Berhasil Dihapus');

        $supplier =  supplier::where('id',$id)->first();
        if ($supplier) {
            $supplier->delete();
            return response()->json([ 
                "msg" => "Delete Method Success ". $id
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed ".$id. " Not Found"
        ], 400);
    }
}
