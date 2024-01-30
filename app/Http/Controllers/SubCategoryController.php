<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.subCategory.index',[
            "subCategories" => SubCategory::all()
        ]);
    }
    public function create()
    {
        return view('admin.subCategory.add', [
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request)
    {
        SubCategory::newSubCategory($request);
        return back()->with('message', 'SubCategory Info Create Successfully');
    }

    public function edit($id)
    {
        return view('admin.subCategory.edit', [
            'subCategory' => SubCategory::find($id),
            'categories' => Category::all()
        ]);
    }
    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/subCategory/manage')->with('message', "SubCategory Info Update Successfully");
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/subCategory/manage')->with('message', "SubCategory Info Deleted Successfully");
    }
}
