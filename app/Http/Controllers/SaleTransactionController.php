<?php

namespace App\Http\Controllers;

use App\Sale_Transaction;
use DB;
use Illuminate\Http\Request;

class SaleTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sale_Transaction::all();
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
        $data= new Sale_Transaction;
        $data->sale_transaction_total_price = $request->input('sale_transaction_total_price');
        $data->sale_transaction_description = $request->input('sale_transaction_description');
        $data->staff_id = $request->input('staff_id');
        $data->category_id = $request->input('category_id');
        $data->save();
        
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Sale_Transaction::Where('supplier_id',$id)->get();
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
        $data  = DB::table('sale_transaction')->where('sale_transaction_id', $id)
        ->update($request->all());
        $da = Sale_Transaction::Where('sale_transaction_id',$id)->get();

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
        $data = Sale_Transaction::Where('staff_id',$id)->get();
        if($data->count()){
            $respone=[
                'data'=>$data,
                'success'=>1
            ];
            $delete= Sale_Transaction::Where('staff_id',$id)->delete();
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
