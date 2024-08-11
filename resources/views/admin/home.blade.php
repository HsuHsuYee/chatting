@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card mb-5 mt-5" style="width: 18rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title">Products</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $products->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-5 mt-5" style="width: 18rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title">Categories</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $categories->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-5 mt-5" style="width: 18rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title">SubCategories</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $subCategories->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-5 mt-5" style="width: 18rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title">Orders</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $orders->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-5 mt-5" style="width: 18rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title">Users</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $users->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-5 mt-5" style="width: 18rem;">
                <div class="card-body text-center fw-bolder">
                    <h5 class="card-title">Payments</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $payments->count()}}</h6>
                </div>
            </div>
        </div>
    </div>
    
@endsection
