<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderWebController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                        ->join('orders', 'products.id','=','orders.product_id')
                        ->select('products.id as product_id', 'products.name', 'products.description', 'products.price', 'orders.id as order_id', 'orders.quantity')
                        ->where('customer_id', session('LoggedUserId'))
                        ->get();

        return view('user.orders', ['products' => $products]);
    }

    public function orderCreate(Request $request)
    {
        $request->validate([
            'quantity' => 'required'
        ]);

        $order = new Order;
        $order->quantity = $request->quantity;
        $order->status = 1;
        $order->customer_id = session('LoggedUserId');
        $order->product_id = $request->product_id;
        $order->save();
        return back();
    }
}
