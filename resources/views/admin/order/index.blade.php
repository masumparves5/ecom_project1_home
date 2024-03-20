@extends('admin.master')

@section('title', 'Manage Product')

@section('body')
    <div class="page-header">
        <div>
            <h1 class="page-title">Order</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Manage Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
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
                                <th class="wd-15p border-bottom-0">Customer Info</th>
                                <th class="wd-15p border-bottom-0">Order Date</th>
                                <th class="wd-15p border-bottom-0">Order Total</th>
                                <th class="wd-10p border-bottom-0">Order States</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->status == 1 ? "Published" : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('order.invoice1', ['id'=>$order->id])}}" class="btn btn-danger btn-sm rounded-0">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a href="{{route('order.detail', ['id'=>$order->id])}}" class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-bookmark-o"></i>
                                        </a>
                                        <a href="{{route('order.edit', ['id'=>$order->id])}}" class="btn btn-success btn-sm rounded-0">
                                            <i class="fa fa-edit"></i>
                                        </a>
{{--                                        <a href="{{route('order.invoice1', ['id'=>$order->id])}}" class="btn btn-danger btn-sm rounded-0">--}}
{{--                                            <i class="fa fa-download"></i>--}}
{{--                                        </a>--}}
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

