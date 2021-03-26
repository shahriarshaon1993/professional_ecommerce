@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title mb-4">Post Details Page</h6>
                <div class="form-layout">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <img src="{{ URL::to($posts->post_image) }}" class="card-img-top" alt="Post Image">
                        </div>
                    </div><!-- End Row -->
                    <hr><br><br>

                    <div class="row">
                        <div class="col-md-8">
                            <h6>Product Name: <strong>{{ $posts->post_title_en }}</strong></h6><hr>
                            <p>Time: {{ \Carbon\Carbon::parse($posts->created_at)->diffForhumans() }}</p>
                            <p>{!! $posts->details_en !!}</p> <hr>
                        </div>

                        <div class="col-md-4">
                            <h6>Informations</h6><hr>
                            <h6>Category: {{ $posts->category_name_en }}</h6><hr>
                        </div>
                    </div><!-- End Row -->
                </div><!-- form-layout -->
            </div><!-- card -->
        </div>
    </div><!-- modal-dialog -->

@endsection
