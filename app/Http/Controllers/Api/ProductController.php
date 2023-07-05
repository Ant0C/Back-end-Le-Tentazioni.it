<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $results = Product::all();
        return response()->json([
            'success' => true,
            'results' => $results,
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Product not found'
            ]);
        }
    }
}
