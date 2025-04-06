<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('uploads/' . $global_setting->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('uploads/' . $global_setting->favicon) }}" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('apex-1.0.0/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('apex-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('apex-1.0.0/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('library/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('library/slick/slick.min.css') }}">

    <!-- Template Stylesheet -->
    <link href="{{ asset('apex-1.0.0/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('dealarohtml/style.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('dealarohtml/fontawesome.min.css') }}" rel="stylesheet" /> --}}
    <style>
        .product-category {
            text-align: center;
            margin-bottom: 40px;
        }

        .product-category h6 {
            color: #666;
            text-transform: uppercase;
        }

        .product-category h1 {
            font-weight: bold;

        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .product-item {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 220px;
            transition: transform 0.3s;
        }

        .product-item img {
            width: 100%;
            height: 140px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .product-item:hover {
            transform: scale(1.05);
        }

        .explore {
            display: inline-block;
            background-color: black;
            color: white;
            padding: 6px 14px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s;
            margin: 0 auto;
        }

        .explore:hover {
            background-color: red;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .title {
            display: inline-block;
            border-bottom: 3px solid red;
            padding-bottom: 5px;
        }

        hr {
            height: 2px;
            background-color: red;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .carousel-container {
            max-width: 100%;
            margin: auto;
        }

        .carousel-item img {
            width: 500px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-prev {
            left: 0;
        }

        .carousel-control-next {
            right: 0;
        }

        .request-quotation {
            background-color: #b01b1b;
            padding: 60px 20px;
            text-align: center;
            margin-top: 50px;
            margin-bottom: -48px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .request-quotation .btn {
            background-color: black;
            color: white;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-top: -2.5%;
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .request-quotation {
                padding: 40px 10px;
            }

            .request-quotation .btn {
                font-size: 16px;
                margin-bottom: 8%;
                padding: 10px 25px;
            }
        }

        .request-quotation .btn:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    @include('components_frontend.header')

    @yield('content')

    <div class="request-quotation">
        <button class="btn" onclick="location.href='{{ route('contact_us') }}#service-wrapper'">
            Request Quotation
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

    @include('components_frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @stack('modal')
    @stack('other')

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('apex-1.0.0/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('apex-1.0.0/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('apex-1.0.0/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('apex-1.0.0/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('library/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('library/slick/slick.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('apex-1.0.0/js/main.js') }}"></script>
    <script src="{{ asset('js/custom-frontend.js') }}"></script>
    @stack('js_stack')
</body>

</html>
