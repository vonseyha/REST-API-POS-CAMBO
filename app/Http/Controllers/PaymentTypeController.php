<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PaymentType;

class PaymentTypeController extends Controller
{
    public function payment () 
    {
        
        return response()->json(PaymentType::get());

    }

    public function paymentById (Request $request, $payment_id)
    {

        $payment = DB::table('payment_type')->where('payment_id', $payment_id)->get();

        return response()->json($payment, 200);

    }

    public function createPaymentType (Request $request)
    {

        $payment = PaymentType::create($request->all());

        return response()->json($payment, 201);

    }

    public function updatePaymentType (Request $request, $payment_id)
    {

        $payment  = DB::table('payment_type')->where('payment_id', $payment_id)
        ->update($request->all());

        $response["payment_type"] = $payment;

        $response["success"] = 1;

        return response()->json($response, 200);

    }

    public function deletePaymentType (Request $request, $payment_id)
    {

        $payment  = DB::table('payment_type')->where('payment_id', $payment_id)->delete();

        $response["payment_type"] = $payment;

        $response["success"] = 1;

        return response()->json(null, 204);

    }
}
