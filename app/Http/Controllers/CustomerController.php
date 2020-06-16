<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function customer () 
    {
        
        return response()->json(Customer::get());

    }

    public function customerById (Request $request, $customer_id)
    {

        $product = DB::table('customer')->where('customer_id', $customer_id)->get();

        return response()->json($product, 200);

    }

    public function createCustomer (Request $request)
    {

        $customer = Customer::create($request->all());

        return response()->json($customer, 201);

    }

    public function updateCustomer (Request $request, $customer_id)
    {

        $customer  = DB::table('customer')->where('customer_id', $customer_id)
        ->update($request->all());

        $response["customer"] = $customer;

        $response["success"] = 1;

        return response()->json($response, 200);

    }

    public function deleteCustomer (Request $request, $customer_id)
    {

        $customer  = DB::table('customer')->where('customer_id', $customer_id)->delete();

        $response["customer"] = $customer;

        $response["success"] = 1;

        return response()->json(null, 204);

    }
}
