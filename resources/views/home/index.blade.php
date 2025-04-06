<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="apex-1.0.0/img/favicon.ico" rel="icon" />

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
    <link href="apex-1.0.0/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="apex-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="apex-1.0.0/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="apex-1.0.0/css/style.css" rel="stylesheet" />
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

    <!-- Product Category -->
    <div class="container py-5">
        <div class="product-category">
            <div style="display: flex; justify-content: center; align-items: center; gap: 90px;">
                <h2><i class="fa-solid fa-check text-red-500" style="color: red"></i> Sale</h2>
                <h2><i class="fa-solid fa-check text-red-500" style="color: red"></i> Repair</h2>
                <h2><i class="fa-solid fa-check text-red-500" style="color: red"></i> Rental</h2>
            </div><br><br>
            <h6 class="text-uppercase" style="color: black">Product Category</h6>
            <h2 class="title">We Provide Type of Product</h2>
        </div>
        <div class="product-list">
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-1.jpg') }}" alt="Air Compressor">
                <h5>Air Compressor</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-2.jpg') }}" alt="Airless Painting">
                <h5>Airless Painting</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-3.jpg') }}" alt="Diesel Generator">
                <h5>Diesel Generator</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-4.jpg') }}" alt="Drilling & Tapping Machine">
                <h5>Drilling & Tapping Machine</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-5.jpg') }}" alt="Gas Cutting Machine">
                <h5>Gas Cutting Machine</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-6.jpg') }}" alt="Hydraulic Punch Machine">
                <h5>Hydraulic Punch Machine</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-1.jpg') }}" alt="Lifting Equipment">
                <h5>Lifting Equipment</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-2.jpg') }}" alt="Safety Equipment">
                <h5>Safety Equipment</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-3.jpg') }}" alt="Tools">
                <h5>Tools</h5>
            </div>
            <div class="product-item">
                <img src="{{ asset('apex-1.0.0/img/service-4.jpg') }}" alt="Welding Equipment">
                <h5>Welding Equipment</h5>
            </div>
        </div>
        <br>
        <div class="button-container">
            <a href="{{ route('explore_products') }}" class="explore">Explore Products</a>
        </div>
    </div>
    <!-- Product Category End -->

    <!-- Top Selling Product -->
    <div class="container my-5">
        <div class="top-selling-product"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h6 class="text-uppercase">Top Selling Product</h6>
            <h2 class="title">Our High Demand Products</h2>
        </div><br>

        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 justify-content-center">
            <div class="col">
                <div class="card border-0 text-center">
                    <img src="apex-1.0.0/img/fact-1.jpg" class="card-img-top img-fluid" alt="Product 1">
                    <div class="card-body">
                        <h6 class="fw-bold">PRO ARC-200S/250S - Master</h6>
                        <p class="text-muted">Welding Machine</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center">
                    <img src="apex-1.0.0/img/fact-2.jpg" class="card-img-top img-fluid" alt="Product 2">
                    <div class="card-body">
                        <h6 class="fw-bold">CMD35 - Unibor</h6>
                        <p class="text-muted">Magnetic Drill</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center">
                    <img src="apex-1.0.0/img/fact-3.jpg" class="card-img-top img-fluid" alt="Product 3">
                    <div class="card-body">
                        <h6 class="fw-bold">CUT-100i - Isotech</h6>
                        <p class="text-muted">Plasma Cutting Machine</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center">
                    <img src="apex-1.0.0/img/fact-4.jpg" class="card-img-top img-fluid" alt="Product 4">
                    <div class="card-body">
                        <h6 class="fw-bold">RSR-2500 - Isotech</h6>
                        <p class="text-muted">Welding Machine</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center">
                    <img src="apex-1.0.0/img/fact-4.jpg" class="card-img-top img-fluid" alt="Product 5">
                    <div class="card-body">
                        <h6 class="fw-bold">RSR-2500 - Isotech</h6>
                        <p class="text-muted">Welding Machine</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Selling Product End -->

    <!-- Find More About Our Brands -->
    <div class="container-fluid my-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h2 class="title">Find More About Our Brands</h2>
        </div>

        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-4 justify-content-center">
            <div class="col">
                <div class="card border-0 text-center shadow-sm p-3">
                    <img src="apex-1.0.0/img/fact-1.jpg" class="card-img-top img-fluid" alt="Product 1">
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center shadow-sm p-3">
                    <img src="apex-1.0.0/img/fact-2.jpg" class="card-img-top img-fluid" alt="Product 2">
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center shadow-sm p-3">
                    <img src="apex-1.0.0/img/fact-3.jpg" class="card-img-top img-fluid" alt="Product 3">
                </div>
            </div>
            <div class="col">
                <div class="card border-0 text-center shadow-sm p-3">
                    <img src="apex-1.0.0/img/fact-4.jpg" class="card-img-top img-fluid" alt="Product 4">
                </div>
            </div>
        </div>
    </div>
    <!-- Find More About Our Brands End -->

    <!-- We Provide Brands -->
    <div class="container-fluid my-5">
        <div class="we-provide-brands text-center">
            <h6 class="text-uppercase">Brand</h6>
            <h2 class="title">We Provide Brands</h2>
        </div>

        <!-- Carousel -->
        <div id="brandCarousel" class="carousel slide mt-4 carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center gap-3">
                        <img src="apex-1.0.0/img/fact-1.jpg" class="img-fluid" alt="Brand 1">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 2">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 3">
                        <img src="apex-1.0.0/img/fact-4.jpg" class="img-fluid" alt="Brand 4">
                        <img src="apex-1.0.0/img/fact-1.jpg" class="img-fluid" alt="Brand 5">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center gap-3">
                        <img src="apex-1.0.0/img/fact-4.jpg" class="img-fluid" alt="Brand 6">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 7">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 8">
                        <img src="apex-1.0.0/img/fact-1.jpg" class="img-fluid" alt="Brand 9">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 10">
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#brandCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#brandCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
        </div>

        <!-- Button Explore -->
        <div class="text-center mt-4">
            <button class="explore">Explore Brands</button>
        </div>
    </div>
    <!-- We Provide Brands End -->

    <div class="request-quotation">
        <button class="btn" onclick="location.href='{{ route('contact_us') }}#service-wrapper'">
            Request Quotation
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>

    @include('components_frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="apex-1.0.0/lib/wow/wow.min.js"></script>
    <script src="apex-1.0.0/lib/easing/easing.min.js"></script>
    <script src="apex-1.0.0/lib/waypoints/waypoints.min.js"></script>
    <script src="apex-1.0.0/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="apex-1.0.0/js/main.js"></script>
</body>

</html>
