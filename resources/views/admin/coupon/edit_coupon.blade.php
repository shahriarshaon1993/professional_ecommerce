@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Update Coupon</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update
                    <a href="{{ route('admin.coupons') }}" class="btn btn-sm btn-warning" style="float: right;">All Coupon</a>
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

                    <form method="POST" action="{{ url('update/coupon/'.$coupon->id) }}">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group">
                            <label for="coupon">Coupon Name</label>
                            <input type="text" class="form-control" id="coupon" placeholder="Enter Coupon Name" name="coupon" value="{{ $coupon->coupon }}">
                        </div>

                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount" value="{{ $coupon->discount }}">
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
