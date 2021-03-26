<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin Ecommerce Dashboard</title>

    <!-- vendor css -->
    <link href="{{ asset('public/backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

    <!-- Multi tag input CDN -->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <!-- Data Table Css  -->
    <link href="{{ asset('public/backend/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/starlight.css') }}">

    <link href="{{ asset('public/backend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

</head>

<body>

    @guest

    @else

        <!-- START: LEFT PANEL  -->

        @include('admin.partials.sidebar')

        <!-- END: LEFT PANEL  -->

        <!--  START: HEAD PANEL  -->

        @include('admin.partials.header')

        <!--  END: HEAD PANEL  -->

        <!--  START: RIGHT PANEL  -->

        @include('admin.partials.rightsidebar')

        <!--  END: RIGHT PANEL  --->

    @endguest

        @yield('admin_content');

    <script src="{{ asset('public/backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('public/backend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

    <!-- Data Table JS -->
    <script src="{{ asset('public/backend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('public/backend/lib/select2/js/select2.min.js') }}"></script>

    {{-- <script src="{{ asset('public/backend/js/starlight.js') }}"></script> --}}
    <script>
        $(function () {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>

    <script src="{{ asset('public/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('public/backend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/backend/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/backend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="{{ asset('public/backend/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{ asset('public/backend/lib/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        $(function () {
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote').summernote({
                height: 150,
                tooltip: false
            })
        });
    </script>

    <script>
        $(function () {
            'use strict';

            // Inline editor
            var editor = new MediumEditor('.editable');

            // Summernote editor
            $('#summernote1').summernote({
                height: 150,
                tooltip: false
            })
        });
    </script>

    <script src="{{ asset('public/backend/js/starlight.js') }}"></script>
    <script src="{{ asset('public/backend/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('public/backend/js/dashboard.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

    <script>

        @if (Session::has('message'))

            var type = "{{ Session::get('alert-type', 'info') }}"

            switch(type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'worning':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
            }

        @endif


    </script>

    <script>
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>

</body>

</html>
