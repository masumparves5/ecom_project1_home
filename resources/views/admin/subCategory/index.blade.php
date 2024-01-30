@extends('admin.master')

@section('title', 'Manage Sub Category')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Add Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
        </div>
    </div>

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sub Category Manage</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL No</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-20p border-bottom-0">Description</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategories as $subCategory)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subCategory->name}}</td>
                                    <td>{{$subCategory->description}}</td>
                                    <td><img src="{{asset($subCategory->image)}}" alt="" width="50px" height="50px"></td>
                                    <td>{{$subCategory->status}}</td>
                                    <td>
                                        <a href="{{route('subCategory.edit', ['id'=>$subCategory->id])}}" class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('subCategory.delete', ['id'=>$subCategory->id])}}" class="btn btn-danger btn-sm rounded-0">
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
