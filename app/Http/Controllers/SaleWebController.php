<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SaleWebController extends Controller
{
    public function saleCreate(Request $request)
    {
        $sale = new Sale;
        $sale->product_id = $request->product_id;
        $sale->order_id = $request->order_id;
        $sale->save();
        $id = $request->product_id;
        $this->sale($request, $id);
        return back();
    }

    public function sale(Request $request, $id)
    {                  
        $product = Product::find($id);
        $totalQuantity =  $product->quantity - $request->quantity;
        $product->update(['quantity' => $totalQuantity]);
    }
}
