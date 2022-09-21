<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $products = Product::query();

        if ($request->has('price')) {
            if ($request->has('operator')) {
                $operator = $request->input('operator');
                $availableOperators = ['<', '>', '<=', '>='];

                if (!in_array($operator, $availableOperators)) {

                    $operator = $availableOperators[0];
                }
            }

            $products->byPrice($request->input('price'), $operator);
        }

        if ($request->has('category')) {
            $products->byCategory($request->input('category'));
        }

        $products = $products->get();

        return response()->json($products);
    }
}
