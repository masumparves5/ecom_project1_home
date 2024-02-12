@extends('admin.master')

@section('title', 'Add SubCategory')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">SubCategory</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Add SubCategory</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage SubCategory</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit SubCategory Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('subCategory.update', ['id' =>$subCategory->id])}}" >
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id" class="form-control">
                                    <option value="">--Select Category Name</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @selected($category->id == $subCategory->category_id)>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">SubCategory Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" value="{{$subCategory->name}}" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">SubCategory Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="" type="text" name="description">{{$subCategory->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="file" name="image">
                                <img src="{{asset($subCategory->image)}}" alt="" height="100px" width="100px">
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" {{$subCategory->status == 1 ? 'checked':''}} value="1">Published</label>
                                <label><input type="radio" name="status" {{$subCategory->status == 0 ? 'checked':''}} value="2">Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
