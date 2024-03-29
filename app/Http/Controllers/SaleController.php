<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSales;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function store(Request $request){
        // Validação dos dados da requisição
        $rules = [
            '*.product_id' => 'required',
            '*.amount' => 'required|integer|min:1',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(['errors'=>$validator->errors()]);
        }

        $sale = new Sale();
        $sale->amount = 0;
        $sale->save();

        foreach ($request->all() as $item) {
            $product = Product::findOrFail($item['product_id']);

            $sale->amount += $item['amount'];
            $productSales = new ProductSales();
            $productSales->product_id = $product->id;
            $productSales->sale_id = $sale->id;
            $productSales->amount = $item['amount'];
            $productSales->save();
        }

        $sale->save();

        return response()->json([
            'success' => true,
            'message' => 'Venda cadastrada com sucesso.',
            'data' => $sale,
        ], 201, [], JSON_PRETTY_PRINT);
    }


    public function find($id){
        $sale = Sale::findOrFail($id);

        return response()->json($sale);
    }

    public function updateSale(Request $request, $id){
        $sale = Sale::findOrFail($id);

        // Validação dos dados da requisição
        $rules = [
            '*.product_id' => 'required',
            '*.amount' => 'required|integer|min:1',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        foreach ($request->all() as $item) {
            $product = Product::findOrFail($item['product_id']);

            $sale->amount += $item['amount'];
            $productSales = new ProductSales();
            $productSales->product_id = $product->id;
            $productSales->sale_id = $sale->id;
            $productSales->amount = $item['amount'];
            $productSales->save();
        }

        $sale->save();

        return response()->json($sale);
    }

    public function show(){
        $sale = Sale::with('products')->get();
        return response()->json($sale, 200, [], JSON_PRETTY_PRINT);
    }

    public function delete($id){
        $sale = Sale::findOrFail($id);

        $sale->delete();

        return response()->json($sale, 200, [], JSON_PRETTY_PRINT);
    }
}
