<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Good Second Hand Spare Parts of Car</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />

    <!-- Custom Styles -->
    <style>
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            padding: 5px;
            background-color: transparent;
            width: 4rem;
        }

        .sidebar-wrapper {
            background: #1e9ad4;
            height: 100vh;
            overflow: auto;
            position: fixed;
            width: 250px;
            transition: transform 0.3s ease;
            z-index: 1050; /* Ensure the sidebar is above the overlay */
        }

        .sidebar-wrapper.hide {
            transform: translateX(-250px);
        }

        .sidebar-wrapper.show {
            transform: translateX(0);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 1040; /* Ensure the overlay is below the sidebar but above other content */
        }

        .overlay.show {
            display: block;
        }

        .main-panel {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        .main-panel.full-width {
            margin-left: 0;
        }

        @media (max-width: 992px) {
            .sidebar-wrapper {
                transform: translateX(-250px);
            }

            .sidebar-wrapper.show {
                transform: translateX(0);
            }

            .main-panel.full-width {
                margin-left: 0;
            }
        }

        .footer {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }

        .zoom {
            transition: transform 0.2s ease;
            cursor: pointer;
        }

        .zoom-in {
            transform: scale(2);
            z-index: 1000;
        }

        .zoom-out {
            transform: scale(1);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar-wrapper">
            <div class="logo fs-4 fs-bolder text-white text-center py-3">
                GS<i class="fa-solid fa-hand"></i>SPsOf<i class="fa-solid fa-car"></i>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <x-app-layout></x-app-layout>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('categoryList') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('subcategoryList') }}">SubCategory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('productList') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="http://127.0.0.1:8000/chatify">Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.orders') }}">Order</a>
                </li>
            </ul>
        </div>
        <!-- Overlay -->
        <div class="overlay"></div>
        <!-- Main Panel -->
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">Dashboard</a>
                    <button class="navbar-toggler" type="button" id="sidebarToggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content container-fluid">
                @yield('content')
            </div>

            <footer class="footer mt-auto container-fluid">
                <p class="text-center">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="#">GSHSPsOfCar</a>, made by Hsu Hsu Yee with love for a better web
                </p>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                responsive: true,
                paging: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All']
                ],
                language: {
                    search: '',
                    searchPlaceholder: 'Search Records'
                },
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                }],
            });

            $('#sidebarToggle').click(function () {
                $('.sidebar-wrapper').toggleClass('show');
                $('.overlay').toggleClass('show');
                $('.main-panel').toggleClass('full-width');
            });

            $('.overlay').click(function () {
                $('.sidebar-wrapper').removeClass('show');
                $('.overlay').removeClass('show');
                $('.main-panel').removeClass('full-width');
            });
        });
    </script>
</body>

</html>
