@extends('user.layout.app')
@extends('user.layout.nav')
@section('content')

    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('images/car1.jpg')}});">
        <h2 class="ltext-105 cl0 txt-center">
            About
        </h2>
    </section>	


    <!-- Content page -->
    <section class="bg0 p-t-75 p-b-120">
        <div class="container">
            <div class="row p-b-148">
                <div class="col-md-7 col-lg-8">
                    <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Story
                        </h3>

                        <p class="stext-113 cl6 p-b-26">
                        Our website is an online platform dedicated to connecting car owners and enthusiasts with high-quality, reliable used auto parts. Our website serves as a trusted marketplace where users can conveniently buy and sell second-hand car parts. Each part listed is thoroughly inspected to ensure it meets our standards of quality and durability
                        </p>

                        <p class="stext-113 cl6 p-b-26">
                        Users can browse our extensive catalog of parts, ranging from engines and transmissions to smaller components like mirrors and headlights. Sellers can request permission to list their parts through a streamlined process, ensuring that only genuine and functional items are available on our site.
</p>
<p class="stext-113 cl6 p-b-26">With a commitment to sustainability and affordability, Good Second-Hand Car Parts offers a cost-effective solution for vehicle repairs and upgrades, while also contributing to reducing waste by extending the life of automotive components. Whether you're a mechanic, a DIY enthusiast, or just someone looking to maintain your vehicle, our platform provides a seamless, secure, and user-friendly experience.

</p>


                        <p class="stext-113 cl6 p-b-26">
                            Any questions? Let us know AUNG SAN ROAD, PYAY,  or call us on 09764377247
                        </p>
                    </div>
                </div>

                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="how-bor1 ">
                        <div class="hov-img0">
                            <img src="{{ asset('images/car4.png')}}" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                        <h3 class="mtext-111 cl2 p-b-16">
                            Our Mission
                        </h3>

                        <p class="stext-113 cl6 p-b-26">
                        Our mission at Good Second-Hand Car Parts is to provide a reliable, affordable, and sustainable platform for buying and selling high-quality used auto parts. We are dedicated to ensuring that every part meets strict quality standards, offering cost-effective solutions for vehicle repairs, and promoting the reuse of automotive components to reduce waste.

By creating a secure and user-friendly environment, we aim to connect car owners, mechanics, and enthusiasts, fostering a community that values sustainability and resourcefulness in vehicle maintenance.






                        </p>
                    </div>
                </div>

                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="how-bor2">
                        <div class="hov-img0">
                            <img src="{{asset('images/car5.webp')}}" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection