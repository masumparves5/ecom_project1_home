@extends('admin.master')

@section('title', 'Add Unit')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Unit</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Add Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Unit</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class=" col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Unit Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('unit.update', ['id' =>$unit->id])}}" >
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" value="{{$unit->name}}" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit code</label>
                            <div class="col-md-9">
                                <input class="form-control" id="firstName" value="{{$unit->code}}" type="text" name="code">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Unit Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="" type="text" name="description">{{$unit->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label for="" class="col-md-3 form-label">Published Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="status" {{$unit->status == 1 ? 'checked':''}} value="1">Published</label>
                                <label><input type="radio" name="status" {{$unit->status == 0 ? 'checked':''}} value="2">Unpublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

