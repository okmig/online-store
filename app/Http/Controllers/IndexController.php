<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $discounts = Discount::all();

        return view('index', compact('products', 'categories', 'discounts'));
    }
}
