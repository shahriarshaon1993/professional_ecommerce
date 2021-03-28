@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order Details</h6>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Order</strong> Details</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name:</th>
                                        <th>{{ $order->name }}</th>
                                    </tr>

                                    <tr>
                                        <th>Phone:</th>
                                        <th>{{ $order->phone }}</th>
                                    </tr>

                                    <tr>
                                        <th>Payment type:</th>
                                        <th>{{ $order->payment_type }}</th>
                                    </tr>

                                    <tr>
                                        <th>Payment Id:</th>
                                        <th>{{ $order->payment_id }}</th>
                                    </tr>

                                    <tr>
                                        <th>Total:</th>
                                        <th>{{ $order->total }}</th>
                                    </tr>

                                    <tr>
                                        <th>Month:</th>
                                        <th>{{ $order->month }}</th>
                                    </tr>

                                    <tr>
                                        <th>Date:</th>
                                        <th>{{ $order->date }}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Sipping</strong> Details</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name:</th>
                                        <th>{{ $shipping->ship_name }}</th>
                                    </tr>

                                    <tr>
                                        <th>Phone:</th>
                                        <th>{{ $shipping->ship_phone }}</th>
                                    </tr>

                                    <tr>
                                        <th>E-mail:</th>
                                        <th>{{ $shipping->ship_email }}</th>
                                    </tr>

                                    <tr>
                                        <th>Address</th>
                                        <th>{{ $shipping->ship_address }}</th>
                                    </tr>

                                    <tr>
                                        <th>City:</th>
                                        <th>{{ $shipping->ship_city }}</th>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <th>
                                            @if ($order->status == 0)
                                                <span class="badge badge-warning">Pending</span>

                                            @elseif($order->status == 1)
                                                <span class="badge badge-info">Payment Accept</span>

                                            @elseif($order->status == 2)
                                                <span class="badge badge-warning">Progress</span>

                                            @elseif($order->status == 3)
                                                <span class="badge badge-success">Delevered</span>

                                            @else
                                                <span class="badge badge-danger">Cencel</span>

                                            @endif
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card pd-20 pd-sm-40">
                            <h6 class="card-body-title">Product Details</h6>
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
                                <table class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p">Product Id</th>
                                            <th class="wd-15p">Product Name</th>
                                            <th class="wd-15p">Image</th>
                                            <th class="wd-15p">Color</th>
                                            <th class="wd-15p">Size</th>
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-15p">Unit Price</th>
                                            <th class="wd-20p">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $item)
                                            <tr>
                                                <td>{{ $item->product_code }}</td>
                                                <td>{{ $item->product_name }}</td>
                                                <td>
                                                    <img src="{{ URL::to($item->image_one) }}" height="50px" width="50px" alt="Product img">
                                                </td>
                                                <td>{{ $item->color }}</td>
                                                <td>{{ $item->size }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->singleprice }}</td>
                                                <td>{{ $item->totalprice }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->

                            @if ($order->status == 0)
                                <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info mb-2">Payment Accept</a>
                                <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger">Order Cancel</a>

                            @elseif($order->status == 1)
                                <a href="{{ url('admin/delevery/process/'.$order->id) }}" class="btn btn-info mb-2">Process Delevery</a>

                            @elseif($order->status == 2)
                                <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success mb-2">Delevery Done</a>

                            @elseif($order->status == 4)
                                <strong class="text-center">This order are not valid</strong>

                            @else
                                <strong class="text-center">This product are successfully deleverd</strong>

                            @endif

                        </div><!-- card -->
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
