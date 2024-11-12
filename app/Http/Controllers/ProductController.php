<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // dd($products);
        return view('product.index', compact('products'));
    }
    public function save(Request $request, $id=0)
    {
        // dd($id);
        // dd($request->all());
        if($id==0){
            $product = new Product();
            $product->name = $request->input('name');
        } else{
            $product = Product::findOrFail($id);
            $product->name = $request->input('name');
        }
       

        $product->save();

        return redirect()->back();
    }
}
