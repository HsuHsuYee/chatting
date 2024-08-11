@extends('user.layout.app')
@extends('user.layout.nav')
@section('content')

    <!-- Product -->
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m ">

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 ">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="bor8 dis-flex p-l-15">
                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search"
                                placeholder="You can search here.......">
                            <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <section class="bg0 p-b-130">
                <div class="container">
                    <div class="p-b-10">
                        <h3 class="ltext-103 cl5">
                            All Products
                        </h3>
                    </div>
                    <div class="row" style="margin: 10px;">
                        @if ($products->isEmpty())
                            <div class="col-12 text-center">
                                <p>No products found.</p>
                            </div>
                        @else
                            @foreach ($products as $product)
                                <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                                    <div class="card">
                                        @if (isset($product->images[0]))
                                            <img src="{{ asset('storage/' . $product->images[0]) }}"
                                                alt="{{ $product->carModel }}" class="card-img-top"
                                                style="object-fit: cover; height: 200px;">
                                        @else
                                            <img src="https://via.placeholder.com/150" alt="No Image" class="card-img-top"
                                                style="object-fit: cover; height: 200px;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">Model:{{ $product->carModel }}</h5>
                                            <p class="card-text">
                                                <strong>Price:</strong> ${{ $product->price }}<br>
                                                @if ($product->stock == 0)
                                                    <strong class="text-danger">Stock:</strong> Out of Stock<br>
                                                @else
                                                    <strong>Stock:</strong> {{ $product->stock }}<br>
                                                @endif
                                            </p>
                                            <button class="btn btn-dark text-white" data-toggle="modal"
                                                data-target="#productModal{{ $product->id }}">
                                                View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Detail Modal -->
                                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-info"
                                                    id="productModalLabel{{ $product->id }}">
                                                    {{ $product->carBrand }} <span class="text-secondary">|
                                                        {{ $product->category->name }}</span>
                                                </h5>
                                                <hr>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if (isset($product->images[0]))
                                                            <img src="{{ asset('storage/' . $product->images[0]) }}"
                                                                alt="{{ $product->carBrand }}" class="img-fluid">
                                                        @else
                                                            <img src="https://via.placeholder.com/150" alt="No Image"
                                                                class="img-fluid">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Model:{{ $product->carModel }}</p>
                                                        @if ($product->stock == 0)
                                                            <p class="text-danger">Out of Stock</p>
                                                        @else
                                                            <p>Stock:{{ $product->stock }}</p>
                                                        @endif
                                                        <strong class="product-price">MMK:{{ $product->price }}</strong>
                                                        <p>Brand:{{ $product->carBrand }}</p>
                                                        <p>Made In:{{ $product->madeIn }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                @guest
                                                    <a href="{{ url('/login') }}" class="btn btn-primary">Login First</a>
                                                @else
                                                    <form action="{{ route('cart.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="category_id"
                                                            value="{{ $product->category_id }}">
                                                        <input type="hidden" name="sub_category_id"
                                                            value="{{ $product->sub_category_id }}">
                                                        <input type="hidden" name="carModel" value="{{ $product->carModel }}">
                                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                                        <input type="hidden" name="images"
                                                            value="{{ json_encode($product->images) }}">
                                                        <input type="hidden" name="carBrand"
                                                            value="{{ $product->carBrand }}">
                                                        <input type="hidden" name="madeIn" value="{{ $product->madeIn }}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <button type="submit"
                                                            class="btn btn-dark text-white @if ($product->stock == 0) d-none @else d-block @endif">Add
                                                            to Cart</button>
                                                    </form>

                                                @endguest
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-show-search').on('click', function() {
                $('.panel-search').toggleClass('dis-none');
                $('.icon-search').toggleClass('dis-none');
                $('.icon-close-search').toggleClass('dis-none');
            });
        });
    </script>
@endsection
