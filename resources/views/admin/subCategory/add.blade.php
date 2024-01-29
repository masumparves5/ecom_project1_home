@extends('admin.master')

@section('title', 'Add Sub-Category')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Add Sub-Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub-Category</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Sub-Category</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">It is Very Easy to Customize and it uses in your website apllication.</p>
                    <form class="form-horizontal" method="post" action="">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub-Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" placeholder="Sub-Category Name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Sub-Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="Sub-Category Description" type="text" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" type="file" name="image">
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" value="1">Published</label>
                                <label><input type="radio" name="status" value="2">UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

