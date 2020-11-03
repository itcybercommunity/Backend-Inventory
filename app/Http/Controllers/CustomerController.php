<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = customer::all();
        // return view('customer.index', ['customer' => $customer]);

        return response()->json([
            'msg' => "GEt Method Success",
            'data' => $customer
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
        return view('customer.add');
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'address' => 'required'
        // ]);

        // customer::create([
        //     'name' => $request->name,
        //     'address' => $request->address
        // ]);
        // return redirect('customer')->with('message','Data Berhasil Disimpan');

        $customer = new customer;

        $customer->name = $request->name;
        $customer->address = $request->address;

        $customer->save();
        return response()->json([
            'msg' => 'GEt Method Success',
            'data' => $customer
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
        $customer = customer::find($id);
        return view('customer.update', ['customer'=> $customer]);
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'address' => 'required'
        // ]);
        // $customer = customer::find($id);
        // $customer->name = $request->name;
        // $customer->address = $request->address;

        // $customer->save();
        // return redirect('/customer')->with('message', 'Data Berhasil Diupdate');
        
        $customer = customer::where('id', $id)->first();

        if ($customer) {
            $customer->name = $request->name ? $request->name : $customer->name;
            $customer->address = $request->address ? $request->address : $customer->address;

            $customer->save();
            return response()->json([
                'msg' => 'Put Method Success',
                'data' => $customer
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
        $customer =  customer::where('id',$id)->first();
        if ($customer) {
            $customer->delete();
            return response()->json([ 
                "msg" => "Delete Method Success ". $id
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed ".$id. " Not Found"
        ], 400);
    }
}
