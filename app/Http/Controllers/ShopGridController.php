<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.home');
    }
    public function category()
    {
        return view('frontEnd.category.index');
    }
    public function product()
    {
        return view('frontEnd.product.index');
    }
}
