<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $department = department::all();

        // return view('department.index', ['department' => $department]);
        return response()->json([
            'msg' => 'Get Method Success',
            'data' => $department
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
        return view('department.add');
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
        //     'name' => 'required'
        // ]);

        // department::create([
        //     'name' => $request->name
        // ]);

        // return redirect('/department')->with('message', 'Data Berhsil Disimpan');
        $department = new department;
        $department->name = $request->name;

        $department->save();

        return response()->json([
            'msg' => 'Post Method Success',
            'data' => $department
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
        $department = department::find($id);
        return view('department.update', ['department'=> $department]);
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
        //     'name' => 'required'
        // ]);

        // $department = department::find($id);
        // $department->name = $request->name;
        
        // $department->save();

        // return redirect('/department')->with('message', 'Data Berhasil Diupdate');
        $department = department::where('id', $id)->first();
        
        if ($department) {
        $department->name = $request->name ? $request->name : $department->name;
        $department->save();
        return response()->json([
            'msg' => 'Put Method Success',
            'data' => $department
        ], 200);            
        }
        return response()->json([
            'msg' => 'Put Method Success',
            'data' =>"PUT Method Failed ".$id
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
        // $department = department::find($id);

        // $department->delete();
        // return redirect('/department')->with('message', 'Data Berhasil DiHapus');

        $department =  department::where('id',$id)->first();
        if ($department) {
            $department->delete();
            return response()->json([ 
                "msg" => "Delete Method Success ". $id
            ]);
        }
        return response()->json([
            "msg" => "Delete Method Failed ".$id. " Not Found"
        ], 400);
    }
    
}
