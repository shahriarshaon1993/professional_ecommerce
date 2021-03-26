@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Sub Category Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Sub Category List
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
                                <th class="wd-15p">Category Name</th>
                                <th class="wd-15p">Sub Category Name</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcat as $key=>$item)
                                <tr>
                                    <td>{{ $key +1 }}</td>
                                    <td>{{ $item->subcategory_name }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        <a href="{{ URL::to('edit/subcategory/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ URL::to('delete/subcategory/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Sub Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('store.subcategory') }}">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="subcategory_name">Category Name</label>
                            <input type="text" class="form-control" id="subcategory_name" placeholder="Enter Sub Category Name" name="subcategory_name">
                        </div>

                        <div class="form-group">
                            <label for="subcategory_name">Category Name</label>
                            <select name="category_id" class="form-control">

                                @foreach ($category as $item)

                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>

                                @endforeach

                            </select>
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
