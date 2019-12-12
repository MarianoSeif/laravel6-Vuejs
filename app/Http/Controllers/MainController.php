<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function index()
    {
        $variable1 = 'Hello World!';
        return view('pages.index')->with('var1', $variable1);
    }

    public function links()
    {
        return view('pages.links');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function productsIndex(int $orderBy = 0)
    {
        $previousOrderBy = Session::get('orderBy');

        switch ($orderBy){
            case 0:
                $products = Product::all();
                Session::put('orderBy', 0);
                break;
            case 1:
                if ($previousOrderBy == 1) {
                    $products = DB::table('products')->orderBy('created_at', 'asc')->get();
                    Session::put('orderBy', 0);
                    break;
                }
                $products = DB::table('products')->orderBy('created_at', 'desc')->get();
                Session::put('orderBy', 1);
                break;
            case 2:
                if ($previousOrderBy == 2) {
                    $products = DB::table('products')->orderBy('name', 'asc')->get();
                    Session::put('orderBy', 0);
                    break;
                }
                $products = DB::table('products')->orderBy('name', 'desc')->get();
                Session::put('orderBy', 2);
                break;
        }

        return view('product.products')->with('products', $products);
    }

    public function vueapp()
    {
        return view('pages.vueapp');
    }

    /*public function returnProducts()
    {
        return Product::all();
    }*/
}
