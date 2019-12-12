<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use Illuminate\Http\Request;
use Session;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>[
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->input('orderBy')){
            case 'all':
                $products = DB::table('products')
                    ->paginate(5);
                Session::put('orderBy', 'all');
                break;

            case 'created_at_asc':
                $products = DB::table('products')
                    ->orderBy('created_at', 'asc')
                    ->paginate(5);
                Session::put('orderBy', 'created_at_asc');
                break;

            case 'created_at_desc':
                $products = DB::table('products')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
                Session::put('orderBy', 'created_at_desc');
                break;

            case 'name_asc':
                $products = DB::table('products')
                    ->orderBy('name', 'asc')
                    ->paginate(5);
                Session::put('orderBy', 'name_asc');
                break;

            case 'name_desc':
                $products = DB::table('products')
                    ->orderBy('name', 'desc')
                    ->paginate(5);
                Session::put('orderBy', 'name_desc');
                break;
        }
        return view('product.products', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            return redirect()->route('product.index', ['orderBy' => Session::get('orderBy')])->with('status', 'Product Saved!');
        }
        return view('product.products')->with('status', 'oops!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();
        return redirect(route('product.index', ['orderBy'=>Session::get('orderBy')]))->with('status', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index', ['orderBy'=>Session::get('orderBy')])->with('status', 'Product Deleted!');
    }
}
