<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();
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
        $data= new Supplier;
        $data->supplier_img = $request->input('supplier_img');
        $data->supplier_phonenumber = $request->input('supplier_phonenumber');
        $data->supplier_name = $request->input('supplier_name');
        $data->supplier_email = $request->input('supplier_email');
        $data->supplier_location = $request->input('supplier_location');

        $name = $data->supplier_name;
        $email = $data->supplier_email;

        $test_name = Supplier::Where('supplier_name',$name);
        $test_email = Supplier::Where('supplier_email',$email);
        
        if($test_name->count() or $test_email->count()){
            $respone=[
                'data'=>'supplier_name or supplier_email is exists!!',
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
        $data=Supplier::Where('supplier_id',$id)->get();
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
        $data  = DB::table('supplier')->where('supplier_id', $id)
        ->update($request->all());
        $da = Supplier::Where('supplier_id',$id)->get();

        if($da->count()){
            $response["supplier"] = $da;
            $response["success"] = 1;
        }
        else{
            $response["supplier"] = $da;
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
        $data = Supplier::Where('supplier_id',$id)->get();
        if($data->count()){
            $respone=[
                'data'=>$data,
                'success'=>1
            ];
            $delete= Supplier::Where('supplier_id',$id)->delete();
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
