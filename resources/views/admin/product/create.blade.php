@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add New Product
                    <a href="{{ route('all.product') }}" class="btn btn-success btn-sm" style="float: right;">All Products</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Product Add Form.</p>
                <div class="form-layout">
                    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_name">Product Name: <span class="tx-danger">*</span></label>
                                    <input id="product_name" class="form-control" type="text" name="product_name"
                                        placeholder="Enter Product Name">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="product_code" class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input id="product_code" class="form-control" type="text" name="product_code" placeholder="Enter Product Code">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="product_quantity">Product Quantity: <span
                                            class="tx-danger">*</span></label>
                                    <input id="product_quantity" class="form-control" type="text" name="product_quantity" placeholder="Enter Product Quantity">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="discount_price">Discount Price: <span
                                            class="tx-danger"></span></label>
                                    <input id="discount_price" class="form-control" type="text" name="discount_price" placeholder="Enter Your Discount Price">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="category_id" class="form-control-label">Product Category: <span class="tx-danger">*</span></label>
                                    <select id="category_id" name="category_id" class="form-control select2" data-placeholder="Choose Category">
                                        <option label="Choose category"></option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="subcategory_id" class="form-control-label">Product Sub Category: <span class="tx-danger"></span></label>
                                    <select id="subcategory_id" name="subcategory_id" class="form-control select2" data-placeholder="Choose sub category">

                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label for="brand_id" class="form-control-label">Product Brand: <span class="tx-danger"></span></label>
                                    <select id="brand_id" name="brand_id" class="form-control select2" data-placeholder="Choose Brand">
                                        <option label="Choose Brand"></option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size: <span
                                    class="tx-danger">*</span></label>
                                    <input id="size" class="form-control" type="text" name="product_size" data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color: <span
                                    class="tx-danger">*</span></label>
                                    <input id="size" class="form-control" type="text" name="product_color" data-role="tagsinput">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="selling_price" class="form-control-label">Selling Price: <span
                                    class="tx-danger">*</span></label>
                                    <input id="selling_price" class="form-control" type="text" name="selling_price" placeholder="Enter Selling Price">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote" class="form-control-label">Product Details: <span
                                    class="tx-danger">*</span></label>
                                    <textarea name="product_details" id="summernote" class="form-control"></textarea>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="video_link" class="form-control-label">Video Link: <span
                                    class="tx-danger"></span></label>
                                    <input id="video_link" class="form-control" type="text" name="video_link" placeholder="Enter Video Link">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="image_one" class="form-control-label">Image One (Main Thumbnail): <span
                                    class="tx-danger"></span></label>
                                    <label class="custom-file">
                                        <input type="file" id="image_one" class="custom-file-input" name="image_one" onchange="readURL(this)">
                                        <span class="custom-file-control"></span>
                                        <br><br>
                                        <img id="one">
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="image_two" class="form-control-label">Image Two: <span
                                    class="tx-danger"></span></label>
                                    <label class="custom-file">
                                        <input type="file" id="image_two" class="custom-file-input" name="image_two" onchange="readURL2(this)">
                                        <span class="custom-file-control"></span>
                                        <br><br>
                                        <img id="two">
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="image_three" class="form-control-label">Image One Three <span
                                    class="tx-danger"></span></label>
                                    <label class="custom-file">
                                        <input type="file" id="image_three" class="custom-file-input" name="image_three" onchange="readURL3(this)">
                                        <span class="custom-file-control"></span>
                                        <br><br>
                                        <img id="three">
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->
                        <hr>
                        <br><br>

                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="main_slider" value="1">
                                    <span>Main Slider</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_deal" value="1">
                                    <span>Hot Deal</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="buyone_getone" value="1">
                                    <span>BuyOne GetOne</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="best_rated" value="1">
                                    <span>Best Rated</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="trand" value="1">
                                    <span>Trand</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="mid_slider" value="1">
                                    <span>Middle Slider</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="hot_new" value="1">
                                    <span>Hot New</span>
                                </label>
                            </div>

                        </div><!-- row -->
                        <br><br>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit Form</button>
                            {{-- <button class="btn btn-secondary">Cancel</button> --}}
                        </div><!-- form-layout-footer -->
                    </form><!-- End Form -->
                </div><!-- form-layout -->
            </div><!-- card -->
        </div>
    </div><!-- modal-dialog -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <!-- Ajax code for Subcategory -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {

                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');

                            });
                        },
                    });

                } else {
                    alert('danger');
                }

            });
        });

    </script>

    <!-- Ajax code for Live image show -->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
