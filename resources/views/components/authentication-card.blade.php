<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container">
    <div class="card border-0 bg-info">
        <div class="row h-100" style="backdrop-filter: blur(10px);">
            <div class="col-lg-6 d-none d-lg-block child" style="background-color: rgba(255, 255, 255, 0.6);">
                <div class="pt-5">
                    <h1 class="text-center mt-5 pt-5">GSHSPsOfCar</h1>
                    <p class="d-flex justify-content-center align-item-center">Welcome to My Good Second Hand Shop</p>
                    <center class="">
                        <img src="{{asset('storage/images/CarAccessories.png')}}" alt="">
                    </center>
                </div>
            </div>
            <div class="p-4 col-lg-6 col-sm-12 d-block child" style="background-color: rgba(255, 255, 255, 0.6);">
                <div class="sm:max-w-md mt-6 p-4 shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUV0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
