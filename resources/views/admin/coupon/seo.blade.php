@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">SEO Setting Section</span>
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
                <h6 class="card-body-title">Seo Setting

                </h6>

                <div class="form-layout">
                    <form action="{{ route('update.seo') }}" method="POST">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="meta_title">Meta Title: <span class="tx-danger">*</span></label>
                                    <input id="meta_title" class="form-control" type="text" name="meta_title"
                                        value="{{ $seo->meta_title }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="meta_author" class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                                    <input id="meta_author" class="form-control" type="text" name="meta_author" value="{{ $seo->meta_author }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="meta_tag" class="form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                                    <input id="meta_tag" class="form-control" type="text" name="meta_tag" value="{{ $seo->meta_tag }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote" class="form-control-label">Meta Description: <span
                                    class="tx-danger">*</span></label>
                                    <textarea name="meta_description" id="summernote" class="form-control">
                                        {{ $seo->meta_description }}
                                    </textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote1" class="form-control-label">Meta Analytics: <span
                                    class="tx-danger">*</span></label>
                                    <textarea name="meta_analytics" id="summernote1" class="form-control">
                                        {{ $seo->meta_analytics }}
                                    </textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="summernote2" class="form-control-label">Bing Analytics: <span
                                    class="tx-danger">*</span></label>
                                    <textarea name="bing_analytics" id="summernote2" class="form-control">
                                        {{ $seo->bing_analytics }}
                                    </textarea>
                                    <input type="hidden" name="id" value="{{ $seo->id }}">
                                </div>
                            </div><!-- col-12 -->

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
