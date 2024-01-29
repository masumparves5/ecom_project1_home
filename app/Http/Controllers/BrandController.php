<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
   public function index()
   {
       return view('admin.brand.index', [
           'brands' => Brand::all()
       ]);
   }
   public function create()
   {
       return view('admin.brand.add');
   }
    public function store(Request $request)
    {
        Brand::newBrand($request);
        return back()->with('message', 'Brand Info Create Successfully');
    }

    public function edit($id)
    {
        return view('admin.brand.edit', [
            'brand' => Brand::find($id)
        ]);
    }
    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('brand/manage')->with('message', "Brand Info Update Successfully");
    }
    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('brand/manage')->with('message', "Brand Info Deleted Successfully");
    }
}
