@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Update Category</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update
                    <a href="{{ route('sub.categories') }}" class="btn btn-sm btn-warning" style="float: right;">All Sub Categories</a>
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

                    <form method="POST" action="{{ url('update/subcategory/'.$subcat->id) }}">
                        @csrf
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <label for="subcategory_name">Sub Category Name</label>
                                <input type="text" class="form-control" id="subcategory_name" value="{{ $subcat->subcategory_name }}" name="subcategory_name">
                            </div>

                            <div class="form-group">
                                <label for="subcategory_name">Category Name</label>
                                <select name="category_id" class="form-control">

                                    @foreach ($category as $item)

                                        <option value="{{ $item->id }}" <?php if($item->id == $subcat->category_id) { echo 'selected'; } ?> >{{ $item->category_name }}</option>

                                    @endforeach

                                </select>

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
