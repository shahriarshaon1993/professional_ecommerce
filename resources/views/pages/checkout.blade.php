@extends('layouts.app')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">

@section('content')

@include('layouts.menubar')

@php
    $setting = DB::table('settings')->first();
    $charge = $setting->shipping_charge;
    $vat = $setting->vat;
@endphp
        <!-- Cart -->
        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_container">
                            <div class="cart_title">Checkout</div>
                            <div class="cart_items">
                                <ul class="cart_list">

                                @foreach($cart as $item)

                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset($item->options->image)}}" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
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

                                                <form action="{{ route('update.cartitem') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{ $item->rowId }}">
                                                    <input type="number" name="qty" value="{{ $item->qty }}" style="width: 50px; margin-top:35px;">
                                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i></button>
                                                </form>
                                            </div>

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $item->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">{{ $item->price*$item->qty }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <a href="{{ url('remove/cart/'.$item->rowId) }}" class="btn btn-sm btn-danger" style="margin-top:35px;" title="Cancel Product">X</a>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                                </ul>
                            </div>

                            <!-- Order Total -->
                            <div class="order_total_content mt-5">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        @if (!Session::has('coupon'))
                                            <form action="{{ route('apply.coupon') }}" method="post">
                                                @csrf
                                                <label for="exampleCoupon">Apply Coupon</label>

                                                <input id="exampleCoupon" type="text" name="coupon" class="form-control" placeholder="Enter your coupon" required>

                                                <button type="submit" class="btn btn-danger mt-2"> Submit </button>
                                            </form>
                                        @endif
                                    </div>

                                    <ul class="list-group col-lg-6 mt-4">

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

                            <div class="cart_buttons">
                                <button type="button" class="btn btn-danger">All Cancel</button>
                                <a href="{{ route('payment.step') }}" class="btn btn-info">Fainal Step</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Cart -->


    <script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection
