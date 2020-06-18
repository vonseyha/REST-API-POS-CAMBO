<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductHasSalesTransaction;
use DB;

class ProductHasSalesTransactionController extends Controller
{
    public function productHST () 
    {
        
        return response()->json(ProductHasSalesTransaction::get());

    }

    public function productHSTById (Request $request, $productHST_id)
    {

        $productHST = DB::table('product_has_sales_transaction')->where('product_product_id', $productHST_id)->get();

        return response()->json($productHST, 200);

    }

    public function createProductHST (Request $request)
    {

        $productHST = ProductHasSalesTransaction::create($request->all());

        return response()->json($productHST, 201);

    }

    public function updateProductHST (Request $request, $productHST_id)
    {

        $productHST  = DB::table('product_has_sales_transaction')->where('product_product_id', $productHST_id)
        ->update($request->all());

        $response["product_has_sales_transaction"] = $productHST;

        $response["success"] = 1;

        return response()->json($response, 200);

    }

    public function deleteProductHST (Request $request, $productHST_id)
    {

        $productHST  = DB::table('product_has_sales_transaction')->where('product_product_id', $productHST_id)->delete();

        $response["product_has_sales_transaction"] = $productHST;

        $response["success"] = 1;

        return response()->json(null, 204);

    }
}
