@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Admin Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Admin</h6>
                <p class="mg-b-20 mg-sm-b-30">New Admin Add Form.</p>
                <div class="form-layout">
                    <form action="{{ route('store.admin') }}" method="POST">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">Name: <span class="tx-danger">*</span></label>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="Enter Name">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                                    <input id="phone" class="form-control" type="text" name="phone" placeholder="Enter Phone">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email: <span class="tx-danger">*</span></label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="Enter E-mail">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password: <span class="tx-danger">*</span></label>
                                    <input id="password" class="form-control" type="password" name="password" placeholder="Enter Password">
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                        <hr>
                        <br><br>

                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="category" value="1">
                                    <span>Category</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="coupon" value="1">
                                    <span>Coupon</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="product" value="1">
                                    <span>Product</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="blog" value="1">
                                    <span>Blog</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="orders" value="1">
                                    <span>Orders</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="other" value="1">
                                    <span>Other</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="report" value="1">
                                    <span>Report</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="role" value="1">
                                    <span>Role</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="returns" value="1">
                                    <span>Returns</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="contact" value="1">
                                    <span>Contact</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="comment" value="1">
                                    <span>Comment</span>
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <label class="ckbox">
                                    <input type="checkbox" name="settings" value="1">
                                    <span>Settings</span>
                                </label>
                            </div>

                        </div><!-- row -->
                        <br><br>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Submit</button>
                            {{-- <button class="btn btn-secondary">Cancel</button> --}}
                        </div><!-- form-layout-footer -->
                    </form><!-- End Form -->
                </div><!-- form-layout -->
            </div><!-- card -->
        </div>
    </div><!-- modal-dialog -->

@endsection
