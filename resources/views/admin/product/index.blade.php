@extends('admin.master')

@section('title', 'Manage Product')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Product</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('product.add')}}">Add Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Manage</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL No</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Code</th>
                                <th class="wd-15p border-bottom-0">Category Name</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Stock Amount</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{isset($product->category->name) ? $product->category->name : ' '}}</td>
                                    <td><img src="{{asset($product->image)}}" alt="" width="50px" height="50px"></td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td>{{$product->status == 1 ? "Published" : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('product.detail', ['id'=>$product->id])}}" class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-bookmark-o"></i>
                                        </a>
                                        <a href="{{route('product.edit', ['id'=>$product->id])}}" class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('product.delete', ['id'=>$product->id])}}" onclick="return confirm('Are you sure to delete this');" class="btn btn-danger btn-sm rounded-0">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
