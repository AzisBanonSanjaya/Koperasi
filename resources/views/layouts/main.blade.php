<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 15px;
        }
        .hidden {
            display: none;
        }
        .invalid-feedback {
            display: block;
        }
        .select-readonly{
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                @include('layouts.sidebar')
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     @if (session('error'))
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Oops...',
        //             text: '{{ session('error') }}',
        //             footer: '<a href="#">Why do I have this issue?</a>'
        //         });
        //     @endif

        //     @if (session('success'))
        //         Swal.fire({
        //             icon: 'success',
        //             title: 'Success',
        //             text: '{{ session('success') }}'
        //         });
        //     @endif
        // });
        $(document).ready(function () {
            $(".currency").on("keyup", function() {
                value = $(this).val().replace(/,/g, '');
                if (!$.isNumeric(value) || value == NaN) {
                    $(this).val('0').trigger('change');
                    value = 0;
                }
                $(this).val(parseFloat(value, 10).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            });
        });
    </script>
    
     @stack('scripts')
</body>
</html>
