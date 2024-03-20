@extends('admin.master')
@section('title', 'Edit Category')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <form class="form-horizontal" action="{{route('order.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Customer Info</label>
                            <div class="col-md-9">
                                <input class="form-control" readonly value="{{$order->customer->name}}" type="text" name=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Order Total</label>
                            <div class="col-md-9">
                                <input class="form-control" readonly value="{{$order->order_total}}" type="number" name=""/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Delivery Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" readonly type="date" name="delivery_address">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Courier Info</label>
                            <div class="col-md-9">
                                <select class="form-control" name="courier_id" id="" required>
                                    <option value="{{$order->courier_id}}" disabled selected>
                                        @if($order->courier_id)
                                            @if($order->courier_id == 1)
                                                "S A Paribahan"
                                            @elseif($order->courier_id == 2)
                                                Sundorbon
                                            @elseif($order->courier_id == 3)
                                                Korotar
                                            @endif
                                        @else
                                        Select Courier Info
                                        @endif

                                    </option>
                                    <option value="1">S A Paribahan</option>
                                    <option value="2">Sundorbon</option>
                                    <option value="3">Korotar</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Order Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" name="order_status" {{$order->order_status == 'Pending' ? 'checked' : ' '}} value="Pending">Pending</label>
                                <label><input type="radio" name="order_status" {{$order->order_status == 'Pending' ? 'checked' : ' '}} value="Processing">Processing</label>
                                <label><input type="radio" name="order_status" {{$order->order_status == 'Pending' ? 'checked' : ' '}} value="Complete">Complete</label>
                                <label><input type="radio" name="order_status" {{$order->order_status == 'Pending' ? 'checked' : ' '}} value="Cancel">Cancel</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Category Info</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

