@extends('layouts.app')

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_responsive.css') }}">

@section('content')
@include('layouts.menubar')
        <!-- Home -->

        <div class="home">
            <div class="home_background parallax-window" data-parallax="scroll"
                data-image-src="{{ asset('public/frontend/images/shop_background.jpg') }}"></div>
            <div class="home_overlay"></div>
            <div class="home_content d-flex flex-column align-items-center justify-content-center">
                <h2 class="home_title">Smartphones & Tablets</h2>
            </div>
        </div>

        <!--End Home -->

        <!-- Shop -->

        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <!-- Shop Sidebar -->
                        <div class="shop_sidebar">
                            <div class="sidebar_section">
                                <div class="sidebar_title">Categories</div>
                                <ul class="sidebar_categories">
                                    @foreach ($categories as $item)
                                        <li><a href="#">{{ $item->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="sidebar_section filter_by_section">
                                <div class="sidebar_title">Filter By</div>
                                <div class="sidebar_subtitle">Price</div>
                                <div class="filter_price">
                                    <div id="slider-range" class="slider_range"></div>
                                    <p>Range: </p>
                                    <p><input type="text" id="amount" class="amount" readonly
                                            style="border:0; font-weight:bold;"></p>
                                </div>
                            </div>
                            <div class="sidebar_section">
                                <div class="sidebar_subtitle brands_subtitle">Brands</div>
                                <ul class="brands_list">
                                    @foreach ($brands as $item)
                                        @php
                                            $brand = DB::table('brands')->where('id', $item->brand_id)->first();
                                        @endphp

                                        <li class="brand"><a href="#">{{ $brand->brand_name }}</a></li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-9">

                        <!-- Shop Content -->

                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count"><span>186</span> products found</div>
                                <div class="shop_sorting">
                                    <span>Sort by:</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">highest rated<i
                                                    class="fas fa-chevron-down"></span></i>
                                            <ul>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "original-order" }'>highest rated
                                                </li>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "name" }'>name</li>
                                                <li class="shop_sorting_button"
                                                    data-isotope-option='{ "sortBy": "price" }'>price</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="product_grid row">
                                <div class="product_grid_border"></div>

                                    @foreach($products as $item)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset($item->image_one)}}" style="height: 120px; width: 100px" alt="Product Image"></div>
                                                <div class="product_content">

                                                    @if($item->discount_price == NULL)
                                                        <div class="product_price discount">{{ $item->selling_price }}</div>
                                                    @else
                                                        <div class="product_price discount">{{ $item->discount_price }}<span>{{ $item->selling_price }}</span></div>
                                                    @endif

                                                    <div class="product_name">
                                                        <div><a href="{{ url('product/details/'.$item->id.'/'.$item->product_name) }}">{{ $item->product_name }}</a></div>
                                                    </div>

                                                    <!--<div class="product_extras">
                                                        <button class="product_cart_button addcart" data-id="{{ $item->id }}">Add to Cart</button>
                                                    </div>-->

                                                    <div class="product_extras">
                                                        <button id="{{ $item->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal" onclick="productview(this.id)">Add to Cart</button>
                                                    </div>
                                                </div>

                                                <a class="addwishlist" data-id="{{ $item->id }}" >
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                </a>

                                                <ul class="product_marks">

                                                    @if ($item->discount_price == NULL)
                                                        <li class="product_mark product_new" style="background: #0e8ce4">new</li>
                                                    @else
                                                        <li class="product_mark product_discount">
                                                            @php
                                                                $amount = $item->selling_price - $item->discount_price;
                                                                $discount = $amount/$item->selling_price*100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                            </div>

                            <!-- Shop Page Navigation -->

                            <div class="shop_page_nav d-flex flex-row">
                                    {{ $products->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--End Shop -->
        <script src="{{ asset('public/frontend/js/shop_custom.js') }}"></script>
@endsection
