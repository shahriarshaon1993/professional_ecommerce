@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Admin Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Admin List
                    <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
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
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Phone</th>
                                <th class="wd-15p">Access</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>

                                        @if($item->category == 1)
                                            <span class="badge btn-danger">Category </span>
                                        @endif


                                        @if($item->coupon == 1)
                                            <span class="badge btn-info">coupon </span>
                                        @endif


                                        @if($item->product == 1)
                                            <span class="badge btn-warning">product </span>
                                        @endif



                                        @if($item->blog == 1)
                                            <span class="badge btn-primary">blog </span>
                                        @endif



                                        @if($item->orders == 1)
                                            <span class="badge btn-success">order </span>
                                        @endif



                                        @if($item->other == 1)
                                            <span class="badge btn-danger">other </span>
                                        @endif


                                        @if($item->report == 1)
                                            <span class="badge btn-info">report </span>
                                        @endif



                                        @if($item->role == 1)
                                            <span class="badge btn-warning">role </span>
                                        @endif


                                        @if($item->returns == 1)
                                            <span class="badge btn-primary">return </span>
                                        @endif


                                        @if($item->contact == 1)
                                            <span class="badge btn-success">contact </span>
                                        @endif


                                        @if($item->comment == 1)
                                            <span class="badge btn-danger">comment </span>
                                        @endif

                                        @if($item->settings == 1)
                                            <span class="badge btn-info">setting </span>
                                        @endif

                                        @if($item->stock == 1)
                                            <span class="badge btn-warning">Stock </span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ URL::to('edit/admin/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{ URL::to('delete/admin/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
    </div><!-- sl-mainpanel -->

@endsection
