<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
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
        $data= new Category;
        $data->category_name = $request->input('category_name');

        $name = $data->category_name;

        $test_name = Category::Where('category_name',$name);
        
        if($test_name->count()){
            $respone=[
                'data'=>'category_name is exists!!',
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
        $data=Category::Where('category_id',$id)->get();
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
        $data  = DB::table('category')->where('category_id', $id)
        ->update($request->all());
        $da = Category::Where('category_id',$id)->get();

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
        $data = Category::Where('category_id',$id)->get();
        if($data->count()){
            $respone=[
                'data'=>$data,
                'success'=>1
            ];
            $delete= Category::Where('category_id',$id)->delete();
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
