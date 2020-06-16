<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;

class OrderController extends Controller
{
    public function order () 
    {
        
        return response()->json(Order::get());

    }

    public function orderById (Request $request, $payment_id)
    {

        $order = DB::table('order')->where('payment_id', $payment_id)->get();

        return response()->json($order, 200);

    }

    public function createOrder (Request $request)
    {

        $order = Order::create($request->all());

        return response()->json($order, 201);

    }

    public function updateOrder (Request $request, $payment_id)
    {

        $order  = DB::table('order')->where('payment_id', $payment_id)
        ->update($request->all());

        $response["order"] = $order;

        $response["success"] = 1;

        return response()->json($response, 200);

    }

    public function deleteOrder (Request $request, $payment_id)
    {

        $order  = DB::table('order')->where('payment_id', $payment_id)->delete();

        $response["customer"] = $order;

        $response["success"] = 1;

        return response()->json(null, 204);

    }
}
