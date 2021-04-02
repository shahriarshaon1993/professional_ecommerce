@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Stock Product Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Stock Product List
                    <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
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
                                <th class="wd-15p">Product Code</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Category</th>
                                <th class="wd-15p">Brand</th>
                                <th class="wd-15p">Quantity</th>
                                <th class="wd-15p">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->product_code }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        <img src="{{ URL::to($item->image_one) }}" height="50px" width="50px" alt="Product img">
                                    </td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->brand_name }}</td>
                                    <td>{{ $item->product_quantity }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
    </div><!-- sl-mainpanel -->

@endsection
