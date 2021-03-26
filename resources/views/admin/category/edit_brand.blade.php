@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Update Brand</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update
                    <a href="{{ route('categories') }}" class="btn btn-sm btn-warning" style="float: right;">All Brand</a>
                </h6>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="table-wrapper">

                    <form method="POST" action="{{ url('update/brand/'.$brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" placeholder="Enter Brand Name" name="brand_name" value="{{ $brand->brand_name }}">
                        </div>

                        <div class="form-group">
                            <label for="brand_logo">Brand Logo</label>
                            <input type="file" class="form-control" id="brand_logo" name="brand_logo">
                            <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                        </div>

                        <div class="form-group">
                            <label for="brand_logo">Old Image</label>
                            <img src="{{ URL::to($brand->brand_logo) }}" height="30px" width="70px" alt="Brand Logo">
                        </div>

                    </div><!-- modal-body -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    </div>

                </form>

                </div><!-- table-wrapper -->
            </div><!-- card -->
    </div><!-- sl-mainpanel -->

@endsection
