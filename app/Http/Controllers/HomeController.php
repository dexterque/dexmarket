<?php

namespace App\Http\Controllers;

//use App\Models\HotProduct;
use App\Models\TopProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 首页
    public function index(){

        $hot_products = \App\Models\HotProduct::join('products', 'products.id', '=', 'product_id')->get();
        $top_products = TopProduct::join('products', 'product_id', '=', 'products.id')->get();
        return view("index")
            ->with('hot_products', $hot_products)
            ->with('top_products', $top_products);
    }
}
