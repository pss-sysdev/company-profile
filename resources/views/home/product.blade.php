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
        .product-title {
            color: #000;
            font-weight: bold;
        }

        .price {
            color: blue;
            font-size: 24px;
            font-weight: bold;
        }

        .btn-custom {
            margin: 5px;
        }

        .product-images {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .product-images img {
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: nowrap;
        }

        .btn-custom {
            width: 150px;
            text-align: center;
            padding: 10px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #EE4D2D;
        }

        .btn-success {
            background-color: #03AC0E;
        }

        .btn-warning {
            background-color: #25D366;
        }

        .btn-info {
            background-color: #007BFF;
        }

        .btn-wide {
            width: 100%;
            background-color: #1c2b39;
            color: white;
            padding: 15px;
            text-align: center;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .product-card {
            width: 100%;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            background: white;
            margin-bottom: 20px;
        }

        .product-card img {
            width: 100%;
            height: auto;
        }

        .request-btn {
            background-color: #333;
            color: #fff;
            padding: 8px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 3px;
        }

        .request-btn:hover {
            background-color: #555;
        }

        .brand-section {
            margin-top: 40px;
        }

        .brand-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .brand-logo {
            width: 120px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    @include('components_frontend.header')

    <div class="container mt-5">
        <nav>
            <a href="{{ route('explore_products') }}">Product</a> > <a href="#"> <strong>TIG-300</strong></a>
        </nav>

        <div class="row align-items-start mt-4">
            <!-- Gambar Produk -->
            <div class="col-md-4 product-images">
                <img src="apex-1.0.0/img/fact-1.jpg" alt="TIG-300" class="img-fluid w-100 mb-2" />
                <img src="apex-1.0.0/img/fact-2.jpg" alt="TIG-300" class="img-fluid w-25" />
            </div>

            <!-- Detail Produk -->
            <div class="col-md-6 text-start">
                <h1 class="product-title">TIG-300</h1>
                <h2 class="price">Rp 4.500.000</h2>
                <table class="table table-bordered mt-3">
                    <tr>
                        <th>Input Voltage (V)</th>
                        <td>3PH AC380V±15%, 50/60HZ</td>
                    </tr>
                    <tr>
                        <th>Input Current (A)</th>
                        <td>MMA: 11.5 / TIG: 9.6</td>
                    </tr>
                    <tr>
                        <th>Input Power Capacity (KVA)</th>
                        <td>MMA: 7.5 / TIG: 6.3</td>
                    </tr>
                    <tr>
                        <th>Output Current Range (A)</th>
                        <td>MMA: 10-210 / TIG: 10-230</td>
                    </tr>
                    <tr>
                        <th>Gas After-Flow Time (S)</th>
                        <td>5-10 (AUTO)</td>
                    </tr>
                    <tr>
                        <th>No-Load Voltage (V)</th>
                        <td>61</td>
                    </tr>
                    <tr>
                        <th>Rated Duty Cycle (%)</th>
                        <td>60</td>
                    </tr>
                    <tr>
                        <th>Efficiency (%)</th>
                        <td>85</td>
                    </tr>
                    <tr>
                        <th>Power Factor (COS dia.)</th>
                        <td>0.93</td>
                    </tr>
                    <tr>
                        <th>Electrode (MM)</th>
                        <td>1.6-5.0</td>
                    </tr>
                    <tr>
                        <th>Dimensions (MM)</th>
                        <td>485×210×380</td>
                    </tr>
                    <tr>
                        <th>Weight (KG)</th>
                        <td>20.5</td>
                    </tr>
                </table>
                <div class="button-container">
                    <button class="btn btn-danger btn-custom">Shopee</button>
                    <button class="btn btn-success btn-custom">Tokopedia</button>
                    <button class="btn btn-warning btn-custom">WhatsApp</button>
                    <button class="btn btn-info btn-custom">Email</button>
                </div>
                <button class="btn btn-dark btn-wide mt-2">Request Quotation</button>
            </div>
        </div>

        <h4 class="mt-4">Description</h4>
        <ul>
            <li>Advanced Mosfet inverter technology, strong resistance to high voltage and high temperature</li>
            <li>With O.C & O.H protection, hot start</li>
            <li>Molten tungsten electrode non-contact HF arc start method, which holds burning through the thin
                workspace</li>
            <li>With O.C & O.H protection, for long-term use</li>
            <li>Capable of welding stainless steel and other easy oxidated nonferrous metal and alloy steel, such as
                MIG, TIG or another alloy</li>
        </ul>

        <h4 class="mt-4">Other Products</h4>
        <div class="row">
            <div class="col-md-2 col-lg-2">
                <div class="product-card">
                    <img src="apex-1.0.0/img/fact-1.jpg" alt="Product 1">
                    <h6>Idealarc CV400</h6>
                    <button class="request-btn">Request Quotation</button>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="product-card">
                    <img src="apex-1.0.0/img/fact-2.jpg" alt="Product 2">
                    <h6>Vantage 441X</h6>
                    <button class="request-btn">Request Quotation</button>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="product-card">
                    <img src="apex-1.0.0/img/fact-3.jpg" alt="Product 3">
                    <h6>TIG 150-400A</h6>
                    <button class="request-btn">Request Quotation</button>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="product-card">
                    <img src="apex-1.0.0/img/fact-4.jpg" alt="Product 4">
                    <h6>KAP 8-20L</h6>
                    <button class="request-btn">Request Quotation</button>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="product-card">
                    <img src="apex-1.0.0/img/fact-1.jpg" alt="Product 5">
                    <h6>CUT 40-200</h6>
                    <button class="request-btn">Request Quotation</button>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="product-card">
                    <img src="apex-1.0.0/img/fact-2.jpg" alt="Product 6">
                    <h6>NBN 350-500</h6>
                    <button class="request-btn">Request Quotation</button>
                </div>
            </div>
        </div>

        <div class="brand-section text-center mt-5">
            <div class="brand-logos d-flex justify-content-center gap-3">
                <img src="apex-1.0.0/img/fact-1.jpg" alt="Isotech" class="brand-logo">
                <img src="apex-1.0.0/img/fact-2.jpg" alt="M" class="brand-logo">
                <img src="apex-1.0.0/img/fact-3.jpg" alt="Nishida" class="brand-logo">
                <img src="apex-1.0.0/img/fact-4.jpg" alt="Master" class="brand-logo">
            </div>
        </div><br>

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
