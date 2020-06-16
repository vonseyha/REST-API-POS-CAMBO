<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product () 
    {
        
        return response()->json(Product::get());

    }

    public function productById (Request $request, $product_id)
    {

        $product = DB::table('products')->where('product_id', $product_id)->get();

        return response()->json($product, 200);

    }

    public function createProduct (Request $request)
    {

        $product = Product::create($request->all());

        return response()->json($product, 201);

    }

    public function updateProduct (Request $request, $product_id)
    {

        $product  = DB::table('products')->where('product_id', $product_id)
        ->update($request->all());

        $response["products"] = $product;

        $response["success"] = 1;

        return response()->json($response, 200);

    }

    public function deleteProduct (Request $request, $product_id)
    {

        $product  = DB::table('products')->where('product_id', $product_id)->delete();

        $response["products"] = $product;

        $response["success"] = 1;

        return response()->json(null, 204);

    }
}
