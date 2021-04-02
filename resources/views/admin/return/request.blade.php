@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Return Request</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Return Request List</h6>
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
                                <th class="wd-15p">Payment type</th>
                                <th class="wd-15p">Transaction ID</th>
                                <th class="wd-15p">Subtotal</th>
                                <th class="wd-15p">Shipping</th>
                                <th class="wd-15p">Total</th>
                                <th class="wd-15p">Date</th>
                                <th class="wd-15p">Return</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{ $item->payment_type }}</td>
                                    <td>{{ $item->blnc_transection }}</td>
                                    <td>{{ $item->subtotal }} </td>
                                    <td>{{ $item->shipping }} </td>
                                    <td>{{ $item->total }} </td>
                                    <td>{{ $item->date }} </td>
                                    <td>
                                        @if ($item->return_order == 1)
                                            <span class="badge badge-warning">Pending</span>

                                        @elseif($item->return_order == 2)
                                            <span class="badge badge-success">success</span>

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('admin/approve/return/'.$item->id) }}" class="btn btn-sm btn-info">Approve</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
    </div><!-- sl-mainpanel -->

@endsection