@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Newslater Table</h5>
            </div><!-- sl-page-title -->

            <form method="post">
                @csrf
                @method('DELETE')
                <button formaction="{{ route('deleteall') }}" type="submit" class="btn btn-danger">All Delete</button>

                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title">Newslater List </h6>
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
                                    <th class="wd-15p">E-mail</th>
                                    <th class="wd-15p">Subscription Time</th>
                                    <th class="wd-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newslaters as $key=>$item)
                                    <tr>
                                        <td> <input type="checkbox" name="ids[]" value="{{ $item->id }}"> {{ $key +1 }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</td>
                                        <td>
                                            <a href="{{ URL::to('delete/sub/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </form>
    </div><!-- sl-mainpanel -->

@endsection
