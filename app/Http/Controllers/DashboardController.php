<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $discounts = Discount::all();

        return view('dashboard', compact('products', 'categories', 'discounts'));
    }

    /* Product dashboard */

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        Product::create($request->all());
        
        return back();
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return back();
    }

    public function destroyProduct($id)
    {
        Product::destroy($id);

        return back();
    }

    /* Category dashboard */
    
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        
        return back();
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        return back();
    }
    
    public function destroyCategory($id)
    {
        try 
        {
            Category::destroy($id);
        } 
        catch (QueryException $exception) 
        {
            return back()->withError('You can not delete the row if it used in Products table');
        }
        
        return back();
    }

    /* Discount dashboard */

    public function storeDiscount(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'status' => 'required'
        ]);

        Discount::create($request->all());
        
        return back(); 
    }

    public function updateDiscount(Request $request, $id)
    {
        $discount = Discount::find($id);
        $discount->update($request->all());

        return back();
    }
    
    public function destroyDiscount($id)
    {
        try 
        {
            Discount::destroy($id);
        } 
        catch (QueryException $exception) 
        {
            return back()->withError('You can not delete the row if it used in Products table');
        }

        return back();
    }
}
