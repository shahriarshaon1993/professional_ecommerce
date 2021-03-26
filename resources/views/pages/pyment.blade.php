@extends('layouts.app')

@section('content')

@php
    $setting = DB::table('settings')->first();
    $charge = $setting->shipping_charge;
    $vat = $setting->vat;
@endphp

    <!-- Contact Form -->

        <div class="contact_form">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 p-4" style="border: 1px solid gray; border-radius: 25px;">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Cart Products</div>

                            <div class="cart_items">
                                <ul class="cart_list">

                                @foreach($cart as $item)

                                    <li class="cart_item clearfix">
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">

                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Image</div>
                                                <div class="cart_item_text"><img src="{{ asset($item->options->image)}}" height="50px" width="50px" alt=""></div>
                                            </div>

                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $item->name }}</div>
                                            </div>

                                            @if ($item->options->color != NULL)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $item->options->color }}</div>
                                                </div>
                                            @endif

                                            @if ($item->options->size != NULL)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $item->options->size }}</div>
                                                </div>
                                            @endif

                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">{{ $item->qty }}</div>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $item->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">{{ $item->price*$item->qty }}</div>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                                </ul>
                            </div>

                            <ul class="list-group col-lg-8 mt-4" style="float: right;">

                                @if (Session::has('coupon'))
                                    <li class="list-group-item">Subtotal:<span style="float: right;">{{ Session::get('coupon')['balance'] }}</span></li>

                                    <li class="list-group-item">Coupon: ({{ Session::get('coupon')['name'] }}) <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">X</a> <span style="float: right;">{{ Session::get('coupon')['discount'] }}</span></li>
                                @else
                                    <li class="list-group-item">Subtotal:<span style="float: right;">{{ Cart::subtotal() }}</span></li>
                                @endif

                                <li class="list-group-item">Shipping Charge: <span style="float: right;">{{ $charge }}</span></li>

                                <li class="list-group-item">Vat: <span style="float: right;">{{ $vat }}</span></li>

                                @if (Session::has('coupon'))
                                    <li class="list-group-item">Total: <span style="float: right;">{{ Session::get('coupon')['balance'] + $charge + $vat }}</span></li>
                                @else
                                    <li class="list-group-item">Total: <span style="float: right;">{{ Cart::subtotal() + $charge + $vat }}</span></li>
                                @endif
                            </ul>

                        </div>
                    </div>

                    <div class="col-md-5 p-4">
                        <div class="contact_form_container">
                            <div class="contact_form_title text-center">Sign Up</div>

                            <form action="{{ route('payment.process') }}" method="post">
                                @csrf
                                <div class="form-group icon_parent">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your full name">
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus placeholder="Your phone">
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your E-mail">
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Your address">
                                </div>

                                <div class="form-group icon_parent">
                                    <label for="city">City</label>
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Your city">
                                </div>

                                <h3 class="contact_form_title text-center">Payment By</h3>

                                <div class="form-group">
                                    <ul class="logos_list">
                                        <li>
                                            <input type="radio" name="payment" value="stripe"><img src="{{ asset('public/frontend/images/mastercard.png') }}" style="width: 100px; height: 60px;" alt="">
                                        </li>
                                        <li>
                                            <input type="radio" name="payment" value="paypal"><img src="{{ asset('public/frontend/images/paypal.png') }}" style="width: 100px; height: 60px;" alt="">
                                        </li>
                                        <li>
                                            <input type="radio" name="payment" value="ideal"><img src="{{ asset('public/frontend/images/mollie.png') }}" style="width: 100px; height: 60px;" alt="">
                                        </li>
                                    </ul>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-info">Pay Now</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel"></div>
        </div>

@endsection
