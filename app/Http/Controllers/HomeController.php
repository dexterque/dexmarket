<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 首页
    public function index(){
        return view("index");
    }
}
