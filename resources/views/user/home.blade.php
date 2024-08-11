@extends('user.layout.app')
@extends('user.layout.nav')
@section('content')
    <!-- Sidebar -->
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
                            Home
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            My Wishlist
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            My Account
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Track Oder
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Refunds
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Help & FAQs
                        </a>
                    </li>
                </ul>

                <div class="sidebar-gallery w-full p-tb-30">
                    <span class="mtext-101 cl5">
                        @ GS<i class="fa-solid fa-hand"></i>SPsOf<i class="fa-solid fa-car"></i>
                    </span>

                    <div class="flex-w flex-sb p-t-36 gallery-lb">
                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-01.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-02.jpg');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery"
                                style="background-image: url('images/gallery-03.jpg');"></a>
                        </div>

                    </div>
                </div>

                <div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        About Us
                    </span>

                    <p class="stext-108 cl6 p-t-27">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit.
                        Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum
                        quis.
                    </p>
                </div>
            </div>
        </div>
    </aside>

   
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1 bg-info">
                <center class="item-slick1 ">
                    <img src="{{ asset('images/bannerImg1.jpg') }}" style="height: 100%;width:100%" alt="">
                </center>
                <center class="item-slick1 ">
                    <img src="{{ asset('images/bannerImg9.webp') }}" style="height: 100%;width:100%" alt="">
                </center>
                <center class="item-slick1">
                    <img src="{{ asset('images/bannerImg6.jpg') }}" style="height: 100%;width:100%" alt="">
                </center>
            </div>
        </div>

    </section>


    <!-- Category -->
    <section class="bg0 p-t-23 p-b-130">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>
            <div class="row" style="margin: 10px;">
                @foreach ($categories as $category)
                    <div class="col-4 mb-3 d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="position-relative" style="width: 100%; height: 100%;">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-fluid"
                                style="object-fit: cover; width: 100%; height: 100%;">
                            <div class="overlay">
                                <a href="{{ route('subcategoryShow', $category->id) }}" class="overlay-text text-decoration-none text-center">
                                    {{ $category->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
    {{-- Latest product --}}
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Latest Products
            </h3>
            @php 
                $latest = App\Models\Product::latest()->take(8)->get();
            @endphp
        </div>
        <div class="row" style="margin: 10px;">
            @foreach ($latest as $product)
            <div class="col-md-3 col-sm-6 col-xs-12 mb-4">
                <div class="card">
                    @if(isset($product->images[0]))
                        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->carModel }}" class="card-img-top" style="object-fit: cover; height: 200px;">
                    @else
                        <img src="https://via.placeholder.com/150" alt="No Image" class="card-img-top" style="object-fit: cover; height: 200px;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Product Name:{{ $product->carBrand }}</h5>
                        <h5 class="card-title">Model:{{ $product->carModel }}</h5>
                        <p class="card-text">
                            <strong>Price:</strong> ${{ $product->price }}<br>
                            @if($product->stock==0)
                            <strong class="text-danger">Stock:</strong> Out of Stock<br>
                            @else
                            <strong>Stock:</strong> {{ $product->stock }}<br>
                            @endif
                        </p>
                        <button class="btn btn-dark text-white" data-toggle="modal" data-target="#productModal{{ $product->id }}">
                            View Details
                        </button>
                    </div>
                </div>
            </div>
            <!-- Product Detail Modal -->
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-info" id="productModalLabel{{ $product->id }}">
                                {{ $product->carBrand }} <span class="text-secondary">| {{ $product->category->name }}</span>
                            </h5>
                            <hr>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    @if(isset($product->images[0]))
                                        <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->carBrand }}" class="img-fluid">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="No Image" class="img-fluid">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h5 class="card-title">Product Name:{{ $product->carBrand }}</h5>
                                    <p>Model:{{ $product->carModel }}</p>
                                    @if($product->stock==0)
                                    <p class="text-danger">Out of Stock</p>
                                    @else
                                    <p>Stock:{{ $product->stock }}</p>
                                    @endif
                                    <strong class="product-price">MMK:{{ $product->price }}</strong>
                                    {{-- <p>Brand:{{ $product->carBrand }}</p> --}}
                                    <p>Made In:{{ $product->madeIn }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            @guest
                                <a href="{{ url('/login') }}" class="btn btn-primary">Login First</a>
                            @else
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                                <input type="hidden" name="sub_category_id" value="{{ $product->sub_category_id }}">
                                <input type="hidden" name="carModel" value="{{ $product->carModel }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="images" value="{{ json_encode($product->images) }}">
                                <input type="hidden" name="carBrand" value="{{ $product->carBrand }}">
                                <input type="hidden" name="madeIn" value="{{ $product->madeIn }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="btn btn-dark text-white @if($product->stock == 0) d-none @else d-block @endif">Add to Cart</button>
                            </form>
                            
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
          
