@extends('admin.master')

@section('title', 'Update Product')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Update Product</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Product</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Update Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('product.update', ['id' => $product->id])}}" >
                        @csrf
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control">
                                    <option value="">--Select Category Name</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @selected($product->category_id == $category->id)>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select name="sub_category_id" class="form-control">
                                    <option value="">--Select Sub Category Name</option>
                                    @foreach($sub_categories as $subCategory)
                                        <option value="{{$subCategory->id}}" @selected($product->sub_category_id == $subCategory->id)>{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Band Name</label>
                            <div class="col-md-9">
                                <select name="brand_id" class="form-control">
                                    <option value="">--Select Brand Name</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" @selected($product->brand_id == $brand->id)>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select name="unit_id" class="form-control">
                                    <option value="">--Select Unit Name</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" @selected($product->unit_id == $unit->id)>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label"> Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Product Name" type="text" name="name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label"> Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Product Code" type="text" name="code" value="{{$product->code}}">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label"> Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="" placeholder="Short Description" type="text" name="short_description"> value="{{$product->short_description}}"</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label"> Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" placeholder="Long Description" type="text" name="long_description"> value="{{$product->long_description}}"</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Regular Price" type="number" name="regular_price" value="{{$product->regular_price}}"/>
                                <input class="form-control" id="" placeholder="Selling Price" type="number" name="selling_price" value="{{$product->selling_price}}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Stock Amount</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" placeholder="Stock Amount" type="number" name="stock_amount" value="{{$product->stock_amount}}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Product Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" type="file" name="image">
                                <img src="{{asset($product->image)}}" alt="" height="70px" width="70pc">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Other Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="" type="file" name="other_image[]" multiple accept="image/*"/>
                                @foreach($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="" height="70px" width="70pc">
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" {{$subCategory->status == 1 ? 'checked':''}} value="1">Published</label>
                                <label><input type="radio" name="status" {{$subCategory->status == 0 ? 'checked':''}} value="2">UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

