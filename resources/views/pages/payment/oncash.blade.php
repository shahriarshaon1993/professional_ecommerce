@extends('layouts.app')

@section('content')

@php
    $setting = DB::table('settings')->first();
    $charge = $setting->shipping_charge;
    $vat = $setting->vat;
    $cart = Cart::content();
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
                            <div class="contact_form_title text-center">
                                <h3>Submit Card</h3>
                            </div>

                            <form action="{{ route('oncash.charge') }}" method="post">
                                @csrf
                                <div class="form-row my-4">
                                    <label for="card-element">
                                        Cash On Delivery
                                    </label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                                <input type="hidden" name="shipping" value="{{ $charge }} ">
                                <input type="hidden" name="vat" value="{{ $vat }} ">
                                <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + $vat }}">

                                <input type="hidden" name="ship_name" value="{{ $data['name'] }} ">
                                <input type="hidden" name="ship_phone" value="{{ $data['phone'] }} ">
                                <input type="hidden" name="ship_email" value="{{ $data['email'] }} ">
                                <input type="hidden" name="ship_address" value="{{ $data['address'] }} ">
                                <input type="hidden" name="ship_city" value="{{ $data['city'] }} ">
                                <input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">

                                <button class="btn btn-info">Pay Now</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="panel"></div>
        </div>

@endsection
