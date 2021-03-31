@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Search Report</h5>
            </div><!-- sl-page-title -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="card pd-20 pd-sm-40">

                        <div class="table-wrapper">

                            <form method="POST" action="{{ route('search.by.date') }}">
                                @csrf
                                <div class="modal-body pd-20">

                                    <div class="form-group">
                                        <label for="date">Search by date</label>
                                        <input type="date" class="form-control" id="date" placeholder="Enter Brand Name" name="date" value="">
                                    </div>

                                </div><!-- modal-body -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            </div>

                        </form>

                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4">
                    <div class="card pd-20 pd-sm-40">

                        <div class="table-wrapper">

                            <form method="POST" action="{{ route('search.by.month') }}">
                                @csrf
                                <div class="modal-body pd-20">

                                    <div class="form-group">
                                        <label for="month">Search by month</label>
                                        <select class="form-control" name="month">
                                            <option value="january">January</option>
                                            <option value="february">February</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                            <option value="may">May</option>
                                            <option value="jun">Jun</option>
                                            <option value="july">July</option>
                                            <option value="augoust">Augoust</option>
                                            <option value="september">September</option>
                                            <option value="october">October</option>
                                            <option value="november">November</option>
                                            <option value="december">December</option>
                                        </select>
                                    </div>

                                </div><!-- modal-body -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            </div>

                        </form>

                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

                <div class="col-lg-4">
                    <div class="card pd-20 pd-sm-40">

                        <div class="table-wrapper">

                            <form method="POST" action="{{ route('search.by.year') }}">
                                @csrf
                                <div class="modal-body pd-20">

                                    <div class="form-group">
                                        <label for="year">Search by year</label>
                                        <select class="form-control" name="year">
                                            <option value="2021">2021</option>
                                            <option value="2022">2021</option>
                                            <option value="2023">2021</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                        </select>
                                    </div>

                                </div><!-- modal-body -->

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                            </div>

                        </form>

                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>
            </div>
    </div><!-- sl-mainpanel -->

@endsection
