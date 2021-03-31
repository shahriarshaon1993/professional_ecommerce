@extends('admin.admin_layouts')


@section('admin_content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Admin Section</span>
        </nav>

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Admin</h6>
                <p class="mg-b-20 mg-sm-b-30">Edit Admin Add Form.</p>
                <div class="form-layout">
                    <form action="{{ route('update.sitesetting') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $setting->id }}">

                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_one">Phone One: <span class="tx-danger">*</span></label>
                                    <input id="phone_one" class="form-control" type="text" name="phone_one" value="{{ $setting->phone_one }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="phone_two" class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                                    <input id="phone_two" class="form-control" type="text" name="phone_two" value="{{ $setting->phone_two }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email: <span class="tx-danger">*</span></label>
                                    <input id="email" class="form-control" type="email" name="email" value="{{ $setting->email }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="company_name">Company Name: <span class="tx-danger">*</span></label>
                                    <input id="company_name" class="form-control" type="text" name="company_name" value="{{ $setting->company_name }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="company_address">Company Address: <span class="tx-danger">*</span></label>
                                    <input id="company_address" class="form-control" type="text" name="company_address" value="{{ $setting->company_address }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="facebook">Facebook: <span class="tx-danger">*</span></label>
                                    <input id="facebook" class="form-control" type="text" name="facebook" value="{{ $setting->facebook }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="youtube">Youtube: <span class="tx-danger">*</span></label>
                                    <input id="youtube" class="form-control" type="text" name="youtube" value="{{ $setting->youtube }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="instagram">Instagram: <span class="tx-danger">*</span></label>
                                    <input id="instagram" class="form-control" type="text" name="instagram" value="{{ $setting->instagram }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="twitter">Twitter: <span class="tx-danger">*</span></label>
                                    <input id="twitter" class="form-control" type="text" name="twitter" value="{{ $setting->twitter }}">
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                            {{-- <button class="btn btn-secondary">Cancel</button> --}}
                        </div><!-- form-layout-footer -->
                    </form><!-- End Form -->
                </div><!-- form-layout -->
            </div><!-- card -->
        </div>
    </div><!-- modal-dialog -->

@endsection
