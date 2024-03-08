<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(){
        $products = Product::all();
        return response()->json($products, 200, [], JSON_PRETTY_PRINT);
    }
}
