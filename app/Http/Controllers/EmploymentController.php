<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // if ($request->has('jabatan')) {
        //     $employment = employment::where('id_department', 'LIKE', '%'.$request->jabatan.'%')->get();            
        // }else {
        //     $employment = employment::with('department')->get();
        // }
        // $department = department::all();
        $employment = employment::with('department')->get();

        return response()->json([
            'msg' => 'Get Method Success',
            'data 1' => $employment,
            // 'data 2' => $department
        ]);

        
        //  return view('employment.index', ['employment' => $employment, 'department'=>$department]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $department = department::all();

        return view('employment.add', ['department' => $department]);
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
        //     'gender' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'department' => 'required',
        // ]);

        // employment::create([
        //     'name' => $request->name,
        //     'gender' => $request->gender,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        //     'id_department' => $request->department
        // ]);

        // return redirect('/employment')->with('message', 'Data Berhasil Disimpan');

        $employment = new employment;
        $employment->name = $request->name;
        $employment->gender = $request->gender;
        $employment->email = $request->email;
        $employment->password = bcrypt($request->password);
        $employment->phone = $request->phone;
        $employment->address = $request->address;
        $employment->id_department = $request->id_department;

        $employment->save();

        return response()->json([
            'msg' => 'Post Method Success',
            'data' => $employment
        ], 200);
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
        $employment = employment::find($id);
        $department = department::all();
        return view('employment.update', ['employment'=> $employment, 'department' => $department]);
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
        //     'gender' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'department' => 'required',
        // ]);

        // $employment = employment::find($id);
        // $employment->name = $request->name;
        // $employment->gender = $request->gender;
        // $employment->email = $request->email;
        // $employment->password = bcrypt($request->password);
        // $employment->phone = $request->phone;
        // $employment->address = $request->address;
        // $employment->id_department = $request->department;

        // $employment->save();
        // return redirect('/employment')->with('message', 'Data Berhasil Disimpan');

        $employment = employment::where('nip',$id)->first();

        if ($employment) {
            $employment->name = $request->name ? $request->name : $employment->name;
            $employment->gender = $request->gender ? $request->gender : $employment->gender;
            $employment->email = $request->email ? $request->email : $employment->email;
            $employment->password = bcrypt($request->password)? bcrypt($request->password) : $employment->password;
            $employment->phone = $request->phone? $request->phone : $employment->phone;
            $employment->address = $request->address? $request->address : $employment->address;
            $employment->id_department = $request->id_department? $request->id_department : $employment->id_department;

            $employment->save();
            return response()->json([ 
                "msg" => "PUT Method Success ",
                "data" => $employment
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
    //    $employment = employment::where('nip',$id);
    //    $employment->delete();

    //     return redirect('/employment')->with('message', 'Data Berhasil Di Hapus');
    $employment =  employment::where('nip',$id)->first();
    if ($employment) {
        $employment->delete();
        return response()->json([ 
            "msg" => "Delete Method Success ". $id
        ]);
    }
    return response()->json([
        "msg" => "Delete Method Failed ".$id. " Not Found"
    ], 400);
    }
}
