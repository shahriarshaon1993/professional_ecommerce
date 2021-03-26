@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title mb-4">Product Details Page</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <img src="{{ URL::to($product->image_one) }}" class="card-img-top" alt="Product Image">
                        </div>

                        <div class="col-md-4 mb-2">
                            <img src="{{ URL::to($product->image_two) }}" class="card-img-top" alt="Product Image">
                        </div>

                        <div class="col-md-4 mb-2">
                            <img src="{{ URL::to($product->image_three) }}" class="card-img-top" alt="Product Image">
                        </div>
                    </div><!-- End Row -->
                    <hr><br><br>

                    <div class="row">
                        <div class="col-md-8">
                            <h6>Product Name: <strong>{{ $product->product_name }}</strong></h6><hr>
                            <p>Time: {{ \Carbon\Carbon::parse($product->created_at)->diffForhumans() }}</p>
                            <p>{!! $product->product_details !!}</p> <hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <span>Main Slider</span>
                                    @if ($product->main_slider == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <span>Hot Deal</span>
                                    @if ($product->hot_deal == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <span>Best Rated</span>
                                    @if ($product->best_rated == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <span>Mid Slider</span>
                                    @if ($product->mid_slider == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <span>Hot New</span>
                                    @if ($product->hot_new == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <span>Trand</span>
                                    @if ($product->trand == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <h6>Informations</h6><hr>
                            <h6>Brand: {{ $product->brand_name }}</h6><hr>
                            <h6>Category: {{ $product->category_name }}</h6><hr>
                            <h6>Sub Category: {{ $product->subcategory_name }}</h6><hr>
                            <h6>Product Code: {{ $product->product_code }}</h6><hr>
                            <h6>Product Quantity: {{ $product->product_quantity }}</h6><hr>
                            <h6>Product Color: {{ $product->product_color }}</h6><hr>
                            <h6>Product Size: {{ $product->product_size }}</h6><hr>
                            <h6>Product Selling: {{ $product->selling_price }}</h6><hr>
                            <h6>Product Discount: {{ $product->discount_price }}</h6><hr>
                            <h6>Video Link:
                                <a target="_blank" href="{{ $product->video_link }}">Click To See</a>
                            </h6><hr>
                        </div>
                    </div><!-- End Row -->
                </div><!-- form-layout -->
            </div><!-- card -->
        </div>
    </div><!-- modal-dialog -->

@endsection
