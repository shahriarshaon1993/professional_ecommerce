@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add New Post
                    <a href="{{ route('all.post') }}" class="btn btn-success btn-sm" style="float: right;">All Post</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Post Add Form.</p>
                <div class="form-layout">
                    <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="post_title_en">Post Title (English): <span class="tx-danger">*</span></label>
                                    <input id="post_title_en" class="form-control" type="text" name="post_title_en"
                                        placeholder="Enter Post Title in English">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="post_title_bn" class="form-control-label">Post Title (Bangla): <span class="tx-danger">*</span></label>
                                    <input id="post_title_bn" class="form-control" type="text" name="post_title_bn" placeholder="Enter Post Title in Bangla">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label for="category_id" class="form-control-label">Post Category: <span class="tx-danger">*</span></label>
                                    <select id="category_id" name="category_id" class="form-control select2" data-placeholder="Choose Post Category">
                                        <option label="Choose Post category"></option>
                                        @foreach ($post_category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-6 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote" class="form-control-label">Post Details (English): <span
                                    class="tx-danger">*</span></label>
                                    <textarea name="details_en" id="summernote" class="form-control"></textarea>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote1" class="form-control-label">Post Details (Bangla): <span
                                    class="tx-danger">*</span></label>
                                    <textarea name="details_bn" id="summernote1" class="form-control"></textarea>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="post_image" class="form-control-label">Image One (Main Thumbnail): <span
                                    class="tx-danger"></span></label>
                                    <label class="custom-file">
                                        <input type="file" id="post_image" class="custom-file-input" name="post_image" onchange="readURL(this)">
                                        <span class="custom-file-control"></span>
                                        <br><br>
                                        <img id="one">
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

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
    </script>

@endsection
