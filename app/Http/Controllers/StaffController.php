<?php

namespace App\Http\Controllers;
use App\Staff;
use DB;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::all();
        $d =$data->count();

        $respone=[
            'number of data'=>$d,
            'data'=>$data
        ];
        return response()->json($respone);
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
        $data= new Staff;
        $data->staff_img = $request->input('staff_img');
        $data->staff_name = $request->input('staff_name');
        $data->staff_password = md5($request->input('staff_password'));
        $data->staff_phonenumber = $request->input('staff_phonenumber');
        $data->supplier_id = $request->input('supplier_id');

        $name = $data->staff_name;
        $pass = $data->staff_password;

        $test_name = Staff::Where('staff_name',$name);
        $test_pass = Staff::Where('staff_password',$pass);
        
        if($test_name->count() or $test_pass->count()){
            $respone=[
                'data'=>'staff_name or staff_email is exists!!',
                'success'=>0
            ];
        }
        else{
            $respone=[
                'data'=>$data,
                'success'=>1
            ];
            $data->save();
        }
        
        
        return response()->json($respone);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Staff::Where('staff_id',$id)->get();
        if($data->count()){
            $respone = [
                'data'=>$data,
                'status'=> 1
            ];
        }else{
            $respone = [
                'data'=>$data,
                'status'=> 0
            ];
        }
        
        return response()->json($respone);
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
        $data=[
        'staff_img' => $request->input('staff_img'),
        'staff_name' => $request->input('staff_name'),
        'staff_password' => md5($request->input('staff_password')),
        'staff_phonenumber' => $request->input('staff_phonenumber'),
        'supplier_id' => $request->input('supplier_id')];
        
        $da = Staff::Where('staff_id',$id)->get();

        if($da->count()){
            Staff::Where('staff_id',$id)
            ->update($data);
            $response["staff"] = $da;
            $response["success"] = 1;
        }
        else{
            $response["staff"] = $da;
            $response["success"] = 0; 
        }
        

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Staff::Where('staff_id',$id)->get();
        if($data->count()){
            $respone=[
                'data'=>$data,
                'success'=>1
            ];
            $delete= Staff::Where('staff_id',$id)->delete();
        }
        else{
            $respone=[
                'data'=>$data,
                'success'=>0
            ];
        }
        return response()->json($respone);
    }
}
