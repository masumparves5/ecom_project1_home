<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{
    public function index()
    {
        return view('frontEnd.home.home');
    }
    public function category($id)
    {
        return view('frontEnd.category.index', [
            'products' => Product::where('category_id',$id)->get(),
            'categories' => Category::all()
        ]);
    }
    public function product($id)
    {
        return view('frontEnd.product.index', [
            'product'      => Product::find($id)
        ]);
    }
}
