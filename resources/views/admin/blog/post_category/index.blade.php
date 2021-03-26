@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Post Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post Category List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
                </h6>
                <br>

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
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">ID</th>
                                <th class="wd-15p">Post Category Name EN</th>
                                <th class="wd-15p">Post Category Name BN</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post_categories as $key=>$item)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $item->category_name_en }}</td>
                                    <td>{{ $item->category_name_bn }}</td>
                                    <td>
                                        <a href="{{ URL::to('edit/post/category/'.$item->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{ URL::to('delete/post/category/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
    </div><!-- sl-mainpanel -->

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('store.post.category') }}">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="category_name_en">Category Name EN</label>
                            <input type="text" class="form-control" id="category_name_en" placeholder="Category Name EN" name="category_name_en">
                        </div>

                        <div class="form-group">
                            <label for="category_name_bn">Category Name BN</label>
                            <input type="text" class="form-control" id="category_name_bn" placeholder="Category Name EN" name="category_name_bn">
                        </div>

                    </div><!-- modal-body -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection
