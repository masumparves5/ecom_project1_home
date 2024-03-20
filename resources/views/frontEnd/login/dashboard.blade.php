@extends('frontEnd.master')

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i>Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            @foreach($orders as $order)
            <div class="cart-list-head py-3">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-10 col-md-3 col-12">
                            <p>Order #0000000{{$order->id}}<br> Placed on {{$order->order_date}}</p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-12">
                            <h6>Total Order :BDT {{$order->order_total}}</h6>
                        </div>
                    </div>
                </div>
                    @foreach($order->orderDetails as $item)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="">
                                    <img src="{{asset($item->product_image)}}" alt="#">
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name">
                                    <a href="">{{$item->product_name}}</a>
                                </h5>
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                <p >
                                    <span><em>Qty: {{$item->product_qty}} @ {{$item->product_price}}TK</em></span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-3 col-12">
                                <p>
                                    <span><em>TK {{$item->product_qty * $item->product_price}}</em></span>
                                </p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <p>
                                    <span><em>{{$order->order_status}}</em></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
                <br/>
        </div>
    </div>


@endsection
