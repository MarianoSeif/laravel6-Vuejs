<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('product.show')->with('product', $product);
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'name'=>'required',
                'description'=>'required'
            ]);

            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->save();
            return redirect()->route('product', ['orderBy' => 0])->with('status', 'Product Created!');
        }
        return view('product.create');
    }

    public function edit(Request $request, Product $product)
    {
        if ($request->isMethod('post')){
            $data = $request->validate([
                'name'=>'required',
                'description'=>'required'
            ]);
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->save();
            return redirect()->route('product', ['orderBy'=>0])->with('status', 'Product updated!');
        }
        return view('product.edit')->with('product', $product);
    }

    public function remove(Product $product)
    {
        $product->delete();
        return redirect()->route('product', ['orderBy'=>0]);
    }
}
