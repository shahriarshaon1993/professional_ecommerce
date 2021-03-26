@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Update Post Category</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Post Category
                    <a href="{{ route('categories') }}" class="btn btn-sm btn-warning" style="float: right;">All Post Categories</a>
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

                    <form method="POST" action="{{ url('update/post/category/'.$post_category->id) }}">
                        @csrf
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <label for="category_name_en">Post Category Name EN</label>
                                <input type="text" class="form-control" id="category_name_en" value="{{ $post_category->category_name_en }}" name="category_name_en">
                            </div>

                            <div class="form-group">
                                <label for="category_name_bn">Post Category Name EN</label>
                                <input type="text" class="form-control" id="category_name_bn" value="{{ $post_category->category_name_bn }}" name="category_name_bn">
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
