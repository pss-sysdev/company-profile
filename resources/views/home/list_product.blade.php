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
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Layout utama */
        .product-container {
            display: flex;
            flex-wrap: wrap;
        }

        .filter {
            width: 20%;
            padding: 20px;
        }

        .product-list {
            width: 80%;
            padding: 20px;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Brand Section */
        .brand-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            text-align: right;
            margin-top: 5rem;
            padding-right: 5%;
        }

        .brand-logos {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 1rem;
        }

        .brand-logo {
            width: 120px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .brand-list img {
            width: 120px;
            height: 60px;
            /* height: 40px; */
            margin-right: 10px;
        }

        .brand-list {
            display: flex;
            justify-content: center;
            align-items: center;
        }


        /* Responsive */
        @media (max-width: 992px) {
            .filter {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #ddd;
                padding-bottom: 15px;
            }

            .product-list {
                width: 100%;
            }

            .brand-section {
                align-items: center;
                text-align: center;
                padding-right: 0;
            }

            .search-container {
                position: static;
                margin-bottom: 10px;
            }

            .brand-logos {
                justify-content: center;
            }
        }

        p {
            color: black;
        }
    </style>
</head>

<body>
    @include('components_frontend.header')

    <div class="brand-section">
        <div class="search-container">
            <input type="text" placeholder="Search..." class="search-box">
        </div>
        <p>Brand of PT. Perintis Sukses Sejahtera</p>
        <div class="brand-logos">
            <img src="apex-1.0.0/img/fact-1.jpg" alt="Isotech" class="brand-logo">
            <img src="apex-1.0.0/img/fact-2.jpg" alt="M" class="brand-logo">
            <img src="apex-1.0.0/img/fact-3.jpg" alt="Nishida" class="brand-logo">
            <img src="apex-1.0.0/img/fact-4.jpg" alt="Master" class="brand-logo">
        </div>
    </div><br>

    <div class="container-fluid">
        <div class="border-start border-5 border-danger ps-4 mb-5">
            <h2 class="fw-bold">Product</h2>
        </div>
        <div class="product-container d-flex">
            <!-- Sidebar Filter -->
            <div class="filter border-end">
                <h5>Filter</h5>
                <select class="form-select mb-3">
                    <option>Category</option>
                </select>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="weldingMachine" checked>
                    <label class="form-check-label" for="weldingMachine">Welding Machine</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="weldingTools">
                    <label class="form-check-label" for="weldingTools">Welding Tools</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="weldingConsumable">
                    <label class="form-check-label" for="weldingConsumable">Welding Consumable</label>
                </div>
            </div>

            <!-- Product Listing -->
            <div class="product-list">
                <div class="border-start border-5 border-danger ps-4 mb-5">
                    <h3>Welding Machine</h3>
                    <p>Brand Included</p>
                </div>
                <div class="brand-list d-flex mb-3">
                    <img src="apex-1.0.0/img/fact-1.jpg" alt="Isotech">
                    <img src="apex-1.0.0/img/fact-2.jpg" alt="Master">
                    <img src="apex-1.0.0/img/fact-3.jpg" alt="Nishida">
                    <img src="apex-1.0.0/img/fact-4.jpg" alt="Lincoln">
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="product-card">
                            <a href="{{ route('product', ['page' => 'tig-150-400A']) }}" target="_blank">
                                <img src="apex-1.0.0/img/fact-1.jpg" alt="TIG 150-400A" class="img-fluid">
                            </a>
                            <p>TIG 150-400A</p>
                            <button class="btn btn-dark">Request Quotation</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <a href="halaman-tujuan.html" target="_blank">
                                <img src="apex-1.0.0/img/fact-2.jpg" alt="KAP 8-20L" class="img-fluid">
                            </a>
                            <p>KAP 8-20L</p>
                            <button class="btn btn-dark">Request Quotation</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <a href="halaman-tujuan.html" target="_blank">
                                <img src="apex-1.0.0/img/fact-3.jpg" alt="CUT 40-200" class="img-fluid">
                            </a>
                            <p>CUT 40-200</p>
                            <button class="btn btn-dark">Request Quotation</button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="product-card">
                            <a href="halaman-tujuan.html" target="_blank">
                                <img src="apex-1.0.0/img/fact-4.jpg" alt="CUT 40-200" class="img-fluid">
                            </a>
                            <p>CUT 40-200</p>
                            <button class="btn btn-dark">Request Quotation</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

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
