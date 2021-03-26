@extends('layouts.app')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css')}}">

@section('content')

@include('layouts.menubar')
        <!-- Cart -->
        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_container">
                            <div class="cart_title">Your wishlist product</div>
                            <div class="cart_items">
                                <ul class="cart_list">

                                @foreach($product as $item)

                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset($item->image_one)}}" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $item->product_name }}</div>
                                            </div>

                                            @if ($item->product_color != NULL)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $item->product_color }}</div>
                                                </div>
                                            @endif

                                            @if ($item->product_size != NULL)
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $item->product_size }}</div>
                                                </div>
                                            @endif

                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <a href="#" class="btn btn-sm btn-info" style="margin-top: 35px;">Add to cart</a>
                                            </div>

                                        </div>
                                    </li>

                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Cart -->


    <script src="{{ asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection
