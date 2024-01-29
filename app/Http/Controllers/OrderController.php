<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }
    public function create()
    {
        return view('admin.order.add');
    }
}
