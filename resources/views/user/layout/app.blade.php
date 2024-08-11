<!DOCTYPE html>
<html lang="en">

<head>
    <title>GSHSPOfCar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetFile/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        #content {
            flex: 1;
        }

        footer {
            background: #f8f9fa;
            padding: 10px;
            text-align: center;
        }

        .star-rating {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .star-rating i {
            font-size: 2rem;
            color: gold;
            cursor: pointer;
        }
    </style>
</head>

<body class="animsition">

    <div id="content" class="mt-lg-5 pt-lg-2">
        @yield('content')
    </div>

    @extends('user.layout.footer')

    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <script src="{{ asset('assetFile/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assetFile/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assetFile/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assetFile/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetFile/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="{{ asset('assetFile/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assetFile/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assetFile/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assetFile/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick-custom.js') }}"></script>
    <script src="{{ asset('assetFile/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="{{ asset('assetFile/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <script src="{{ asset('assetFile/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assetFile/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <script src="{{ asset('assetFile/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // Handle star rating
        document.querySelectorAll('.star-rating i').forEach(function(star) {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                const formId = this.closest('form').getAttribute('id').replace('feedbackForm', '');
                document.getElementById('rate' + formId).value = value;
                resetStars(this.parentElement);
                highlightStars(this, value);
            });
        });

        function resetStars(starContainer) {
            starContainer.querySelectorAll('i').forEach(function(star) {
                star.classList.remove('fas');
                star.classList.add('far');
            });
        }

        function highlightStars(star, value) {
            for (let i = 0; i < value; i++) {
                star.parentElement.children[i].classList.add('fas');
                star.parentElement.children[i].classList.remove('far');
            }
        }

        // Handle feedback submission
        function submitFeedback(productId) {
            const form = document.getElementById('feedbackForm' + productId);
            const formData = new FormData(form);

            fetch('/feedback', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Append feedback to the carousel
                        const carouselInner = document.getElementById('carousel-inner' + productId);
                        const newItem = document.createElement('div');
                        newItem.className = 'carousel-item';
                        newItem.innerHTML =
                            `<p>${data.feedback.feedback || ' '}</p><p>Rating: ${data.feedback.rate} <i class="fas fa-star"></i></p>`;
                        carouselInner.appendChild(newItem);

                        // Activate the new carousel item if it's the first one
                        if (carouselInner.children.length === 1) {
                            newItem.classList.add('active');
                        }

                        // Reset form
                        form.reset();
                        resetStars(form.querySelector('.star-rating'));
                    } else {
                        alert('There was an error submitting your feedback.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>


</body>

</html>
