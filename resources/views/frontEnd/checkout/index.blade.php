@extends('frontEnd.master')
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-wrapper section">
        <div class="container">
            <form action="{{route('newOrder')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Checkout Form</h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            @if(isset($customer->name))
                                                                <input type="text" value="{{$customer->name}}" readonly name="name">
                                                            @else
                                                                <input type="text" name="name" placeholder="Full Name">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->email))
                                                            <input type="email" name="email" value="{{$customer->email}}" readonly>
                                                        @else
                                                            <input type="email" name="email" placeholder="Email Address">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->mobile))
                                                            <input type="text" name="mobile" value="{{$customer->mobile}}" readonly>
                                                        @else
                                                            <input type="text" name="mobile" placeholder="Phone Number">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->address))
                                                            <textarea type="text" class="pt-2" name="delivery_address" placeholder="Delivery Address">{{$customer->address}}</textarea>
                                                        @else
                                                            <textarea type="text" class="pt-2" name="delivery_address" placeholder="Delivery Address"></textarea>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Payment Method</label>
                                                    <div class="">
                                                        <label class="pe-3"><input type="radio" name="payment_method" checked value="Cash"><span class="ps-2">Cash on Delivery</span></label>
                                                        <label><input type="radio" name="payment_method" value="Online"><span class="ps-2">Online</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button type="submit" class="btn">Confirm Order</button>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-sidebar">
                            <div class="checkout-sidebar-price-table">
                                <h5 class="title">Your Cart Summery</h5>
                                <div class="sub-total-price">
                                    @php($sum=0)
                                    @foreach(Cart::content() as $cartProduct)
                                        <div class="total-price">
                                            <p class="value">{{$cartProduct->name}} : ({{$cartProduct->qty}} PCS @ {{$cartProduct->price}} TK) </p>
                                            <p class="value">{{$cartProduct->subtotal}}</p>
                                        </div>

                                        @php($sum = $sum + $cartProduct->subtotal)
                                    @endforeach
                                    <hr/>
                                </div>
                                <div class="sub-total-price">
                                    <div class="total-price">
                                        <p class="value">Subotal Price:</p>
                                        <p class="price">{{$sum = round($sum)}} TK</p>
                                        <input type="hidden" name="sub_total" value="{{$sum}}">
                                    </div>
                                    <div class="total-price shipping">
                                        <p class="value">Tax 15%:</p>
                                        <p class="price">{{$tax = round($sum * 0.15)}} TK</p>
                                        <input type="hidden" name="tax_total" value="{{$tax}}">
                                    </div>
                                    <div class="total-price discount">
                                        <p class="value">Delivery Charge:</p>
                                        <p class="price">{{$delivery = 100}} TK</p>
                                        <input type="hidden" name="shipping_total" value="{{$delivery}}">
                                    </div>
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Total Payable:</p>
                                        <p class="price">{{$total = $sum+$tax+$delivery}}</p>
                                        <input type="hidden" name="order_total" value="{{$total}}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-sidebar-banner mt-30">
                                <a href="product-grids.html">
                                    <img src="{{asset('/')}}frontEnd-assets/assets/images/banner/banner.jpg" alt="#">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection
