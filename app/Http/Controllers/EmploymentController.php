<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BaseLoginController;
use Auth;
use Validator;

class EmploymentController extends BaseLoginController
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
        // validate data
        $validator = Validator::make($request->all(), [
            'name'     => 'required|min:3|max:5',
            'gender'   => 'required',
            'email'   => 'required|email',
            'password'   => 'required',
            'phone'   => 'required',
            'address'   => 'required',
            'id_department'   => 'required'
        ],
            [
                'name.required' => 'Masukkan Title Post !',
                'gender.required' => 'Masukkan JK Post !',
                'email.required' => 'Masukkan email Post !',
                'email.email' => 'Masukan alamat email yang benar',
                'password.required' => 'Masukkan password Post !',
                'phone.required' => 'Masukkan Phone Post !',
                'address.required' => 'Masukkan Alamat Post !',
                'id_department.required' => 'Masukkan Department Post !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $employment = employment::create([
                'name'     => $request->input('name'),
                'gender'   => $request->input('gender'),
                'email'   => $request->input('email'),
                'password'   => bcrypt($request->input('password')),
                'phone'   => $request->input('phone'),
                'address'   => $request->input('address'),
                'id_department'   => $request->input('id_department')
            ]);

            if ($employment) {
                return response()->json([
                    'success' => true,
                    'message' => 'POST Method Success',
                    'data' => $employment
                ], 200);
            } 
        
        }
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'string'],
    //         'gender' => ['required', 'string'],
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'string'],
    //         'phone' => ['required', 'string'],
    //         'address' => ['required', 'string'],
    //         'id_department' => ['required', 'numeric']
    //     ]);
    //     if ($validator->fails()) {
    //         return $this->responseError('Add Items Failed', 422, $validator->errors());
    //     }else{
    //         $employment = new employment;
    //         $employment->name = $request->name;
    //         $employment->gender = $request->gender;
    //         $employment->email = $request->email;
    //         $employment->password = bcrypt($request->password);
    //         $employment->phone = $request->phone;
    //         $employment->address = $request->address;
    //         $employment->id_department = $request->id_department;

    //         $employment->save();

    //         return response()->json([
    //             'msg' => 'Post Method Success',
    //             'data' => $employment
    //         ], 200);
    // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = employment::whereId($id)->first();
        $post = employment::where('nip',$id)->first();


        if ($post) {
            return response()->json([
                'msg' => 'Detail get by ID',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'msg'    => "Detail Method Failed ".$id. " not found"
            ], 422);
        }
    
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'id_department' => ['required', 'numeric']
        ]);

        if ($employment) {
            if ($validator->fails()) {
                return $this->responseError('Update Items Failed', 422, $validator->errors());
            }
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
            "msg" => "PUT Method Failed ".$id. " not found"
        ], 404);

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
    ], 404);
    }
}
