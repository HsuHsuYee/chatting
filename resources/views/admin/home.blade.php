@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card mb-5 mt-5" style="width: 13rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title"><i class="fa-brands fa-product-hunt me-2"></i>Products</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $products->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card mb-5 mt-5" style="width: 13rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title"><i class="fa-solid fa-table-list me-2"></i>Categories</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $categories->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card mb-5 mt-5" style="width: 13rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title"><i class="fa-solid fa-rectangle-list me-2"></i>SubCategories</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $subCategories->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card mb-5 mt-5" style="width: 13rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title"><i class="fa-solid fa-clipboard-list me-2"></i>Orders</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $orders->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card mb-5 mt-5" style="width: 13rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title"><i class="fa-solid fa-users me-2"></i>Users</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $users->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card mb-5 mt-5" style="width: 13rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title"><i class="fa-solid fa-credit-card me-2"></i>Payments</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $payments->count()}}</h6>
                </div>
            </div>
        </div>
    </div>
    
@endsection
