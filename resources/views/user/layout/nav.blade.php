<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<header class="header-v3">
    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop p-l-45">
                <!-- Logo desktop -->
                <a href="{{ url('/') }}" class="text-white">
                    GS<i class="fa-solid fa-hand"></i>SPsOf<i class="fa-solid fa-car"></i>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li><a href="{{ route('UserProduct') }}">Shop</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        @auth
                        <li><a href="http://127.0.0.1:8000/chatify">Chat</a></li>
                        <li><a href="{{ route('orderList') }}">Order List</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m h-full">
                    <div class="flex-c-m h-full p-r-25 bor6">
                        @auth
                        <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                            data-notify="{{ App\Models\Cart::where('user_id', auth()->user()->id)->count() }}">
                            <a href="{{ route('cart.index') }}"><i class="zmdi zmdi-shopping-cart"></i></a>
                        </div>
                        @endauth
                    </div>

                    <div class="flex-c-m h-full p-r-25 bor6">
                        @auth
                            <x-app-layout></x-app-layout>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo mobile -->
        <div class="logo-mobile">
            <a href="{{ url('/') }}" class="text-dark">GS<i class="fa-solid fa-hand"></i>SPsOf<i
                    class="fa-solid fa-car"></i></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
            <div class="flex-c-m h-full p-r-5">
                @auth
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                    data-notify="{{ App\Models\Cart::where('user_id', auth()->user()->id)->count() }}">
                    <a href="{{ route('cart.index') }}"><i class="zmdi zmdi-shopping-cart"></i></a>
                </div>
                @endauth
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{ url('/dashboard') }}">Home</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            <li><a href="{{ route('UserProduct') }}">Shop</a></li>
            @auth
            <li>
                <div class="flex-c-m h-full p-r-25 bor6">
                    <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart"
                        data-notify="{{ App\Models\Cart::where('user_id', auth()->user()->id)->count() }}">
                        <a href="{{ route('cart.index') }}"><i class="zmdi zmdi-shopping-cart"></i></a>
                    </div>
                </div>
            </li>
            <li><a href="">Order List</a></li>
            <li><a href="http://127.0.0.1:8000/chatify">Chat</a></li>
            @endauth
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            
            <li>
                @auth
                    <x-app-layout></x-app-layout>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </li>
        </ul>
    </div>
</header>
