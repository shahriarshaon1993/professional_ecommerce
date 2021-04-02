@extends('layouts.app')

@section('content')

    @php
        $order = DB::table('orders')->where('user_id', Auth::id())->orderBy('id', 'DESC')->limit(10)->get();

    @endphp

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-8 card">
                    <table class="table table-response">
                        <thead>
                            <tr>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Return</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td scope="col">{{ $item->payment_type }}</td>
                                    <td scope="col">
                                        @if ($item->return_order == 0)
                                            <span class="badge badge-warning">No Request</span>

                                        @elseif($item->return_order == 1)
                                            <span class="badge badge-info">Panding</span>

                                        @elseif($item->return_order == 2)
                                            <span class="badge badge-warning">Success</span>

                                        @endif
                                    </td>
                                    <td scope="col">{{ $item->total }}</td>
                                    <td scope="col">{{ $item->date }}</td>
                                    <td scope="col">
                                        @if ($item->status == 0)
                                            <span class="badge badge-warning">Pending</span>

                                        @elseif($item->status == 1)
                                            <span class="badge badge-info">Payment Accept</span>

                                        @elseif($item->status == 2)
                                            <span class="badge badge-warning">Progress</span>

                                        @elseif($item->status == 3)
                                            <span class="badge badge-success">Delevered</span>

                                        @else
                                            <span class="badge badge-danger">Cencel</span>

                                        @endif
                                    </td>
                                    <td scope="col">
                                        @if ($item->return_order == 0)
                                            <a href="{{ url('request/return/'.$item->id) }}" class="btn btn-sm btn-danger" id="return">Return</a>

                                        @elseif($item->return_order == 1)
                                            <span class="badge badge-info">Panding</span>

                                        @elseif($item->return_order == 2)
                                            <span class="badge badge-warning">Success</span>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-4">
                    <div class="card">
                        <br>
                        <img src="{{ asset('public/frontend/images/shaon.jpg') }}" alt="Profile" class="card-img-top" style="width: 90px; height:90px; margin-left: 34%; border-radius: 50%;" >

                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('password.change') }}"> Change Password </a></li>
                            <li class="list-group-item"><a href="{{ route('success.orderlist') }}">Return Order</a></li>
                            <li class="list-group-item">HEllo</li>
                        </ul>

                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
