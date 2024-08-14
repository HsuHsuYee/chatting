<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
{{-- <link rel="icon" type="image/png" href="../assets/img/favicon.ico"> --}}
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>GSHSPOfCar</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #aaa;
        border-radius: 3px;
        padding: 5px;
        margin: 10px;
        background-color: transparent;
        width: 4rem;
    }

    #datatable_filter.dataTables_filter {
        background: lightblue;
    }

    .footer {
        background-color: #f8f9fa;
        padding: 10px 0;
        text-align: center;
    }

    .wrapper {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .content {
        flex-grow: 1;
    }
</style>
</head>

<body class="adminDashboard">
<div class="wrapper bg-info text-dark container-fluid">
    <div class="container flex-grow-1">
        <div class="d-block d-lg-none d-block">
            <button class="btn btn-dark text-info" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">Dashboard</button>
            <div class="offcanvas offcanvas-start bg-info text-dark" data-bs-scroll="true" tabindex="-1"
                id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">GS<i
                            class="fa-solid fa-hand"></i>SPsOf<i class="fa-solid fa-car"></i></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <a class="nav-link active text-dark" href="{{ url('/') }}">Dashboard</a>
                    <a class="nav-link text-dark" href="{{ route('categoryList') }}">Category</a>
                    <a class="nav-link text-dark" href="{{ route('subcategoryList') }}">SubCategory</a>
                    <a class="nav-link text-dark" href="{{ route('productList') }}">Product</a>
                    <a class="nav-link text-dark" href="http://127.0.0.1:8000/chatify">Chat</a>
                    <a class="nav-link text-dark" href="{{ route('admin.orders') }}">Order</a>
                    {{-- <a href="" class="btn-dark text-white "><x-app-layout></x-app-layout></a> --}}
                </div>
            </div>
        </div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info text-dark d-none d-lg-block">
            <div class="container-fluid">
                <button class="btn btn-dark text-info" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions1"
                    aria-controls="offcanvasWithBothOptions">Dashboard</button>
                <div class="offcanvas offcanvas-start bg-info text-dark" data-bs-scroll="true" tabindex="-1"
                    id="offcanvasWithBothOptions1" aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">GS<i
                                class="fa-solid fa-hand"></i>SPsOf<i class="fa-solid fa-car"></i></h5>
                                <x-app-layout></x-app-layout>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <a class="nav-link active text-dark" href="{{ url('/') }}">Dashboard</a>
                        <a class="nav-link text-dark" href="{{ route('categoryList') }}">Category</a>
                        <a class="nav-link text-dark" href="{{ route('subcategoryList') }}">SubCategory</a>
                        <a class="nav-link text-dark" href="{{ route('productList') }}">Product</a>
                        <a class="nav-link text-dark" href="http://127.0.0.1:8000/chatify">Chat</a>
                        <a class="nav-link text-dark" href="{{ route('admin.orders') }}">Order</a>
                        
                    </div>
                </div>
                <center class="fs-3 fw-bold text-center">Good Second Hand Spare Parts Of Car</center>
                {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <x-app-layout></x-app-layout>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </nav>

        <!-- End Navbar -->
        <div class="content">
            @yield('content')
        </div>
        
    </div>
    <footer class="footer mt-auto container-fl">
        <div class="container-fluid">
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="">GSHSPsOfCar</a>, made by Hsu Hsu Yee with love for a better web
            </p>
        </div>
    </footer>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
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
        // dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            text: 'Export to Excel',
        }],
    });
});
</script>

</html>
