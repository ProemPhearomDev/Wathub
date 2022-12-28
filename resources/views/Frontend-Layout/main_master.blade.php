<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>WatHub System Managerment</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Frontend/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css') }} ">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Frontend/assets/plugins/morris/morris.css') }}">
    <!--search ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--icon alert cdn5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css') }}">
    <!--toast-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <!--datatable-->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('Frontend/assets/DataTables/datatables.min.css') }}" />

    <!--[if lt IE 9]>
   <script src="assets/js/html5shiv.min.js"></script>
   <script src="assets/js/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!--Header-->
        @include('Frontend-Layout.body.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('Frontend-Layout.body.sidebar')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        @yield('content')
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('Frontend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('Frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('Frontend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('Frontend/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('Frontend/assets/js/chart.morris.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('Frontend/assets/js/script.js') }}"></script>
    <!-- datatable local script -->
    <script type="text/javascript" src="{{ asset('Frontend/assets/DataTables/datatables.min.js') }}"></script>

    <!-- multi select script -->
    <script type="text/javascript" src="{{ asset('Frontend/assets/multiselect-dropdown.js') }}"></script>

    <!-- toast alert script -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!--Toast alert-->
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"

            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <!--sweet alert-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            //
            Swal.fire({
                title: 'តើអ្នកប្រាកដជាចង់លុបមែនឬទេ?',
                // text: "សូមធ្វើការបញ្ជាក់!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link //return route 
                    // Swal.fire(
                    //     'Deleted!',
                    //     'The file has been deleted.',
                    //     'success'
                    // )
                }
            })
        });
    </script>
    <!--End sweetalert-->
    <!-- Preview image upload script -->
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('formFile').value = null;
            frame.src = "";
        }
    </script>
    <script>
        //  $('li').click(function(e) {
        // var $this = $(this);
        // e.preventDefault();
        // $('li').removeClass('active');
        // $(this).addClass('active');
        // });


        // $(document).ready(function() {
        //     $("#sidebar-menu").removeClass('active');
        //     $("#sidebar-menu li ul li").removeClass('active');
        //     $("#menu_setting_slider").addClass('active open');
        //     $("#setting_collapse_slider").addClass('collapse in')
        //     $("#menu_manage_slider").addClass('active')
        // })

        // datatable
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    search: 'ស្វែងរក',
                    searchPlaceholder: ' Type here to search...',
                }
            });

        });
    </script>
</body>

</html>
