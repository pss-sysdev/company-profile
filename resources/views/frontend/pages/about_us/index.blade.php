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
        .accordion-container {
            width: 100%;
            text-align: center;
            padding-top: 10px;
        }

        .accordion-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }

        .accordion-title::after {
            content: "";
            display: block;
            width: 50px;
            height: 3px;
            background-color: red;
            margin: 3px auto 0;
        }

        .accordion-nav {
            display: flex;
            width: 100%;
            background-color: #333;
            justify-content: space-between;
        }

        .accordion-nav button {
            flex: 1;
            text-align: center;
            background: none;
            border: none;
            color: white;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            padding: 12px 0;
            position: relative;
            transition: background-color 0.3s ease;
            border-right: 1px solid rgba(255, 255, 255, 0.3);
        }

        .accordion-nav button:last-child {
            border-right: none;
        }

        .accordion-nav button:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .accordion-nav button.active::after {
            content: "";
            width: 50px;
            height: 3px;
            background-color: red;
            position: absolute;
            bottom: -2px;
            left: 50%;
            transform: translateX(-50%);
        }

        .content {
            display: none;
            padding: 15px;
            text-align: center;
            max-width: 1900px;
            margin: 10px auto;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .content.active {
            display: block;
        }

        @media (max-width: 768px) {
            .accordion-nav {
                flex-direction: column;
            }

            .accordion-nav button {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }

            .accordion-nav button:last-child {
                border-bottom: none;
            }
        }

        .about-title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
            position: relative;
        }

        .about-title::after {
            content: "";
            width: 130px;
            height: 3px;
            background-color: red;
            display: block;
            margin: 8px auto;
        }

        .content p {
            text-align: justify;
            hyphens: auto;
        }

        .content center {
            color: black;
        }

        .header {
            background-color: #4a2ef5;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            max-width: 1300px;
            margin: 0 auto;
            position: relative;
            text-align: left;
        }

        .header h1 {
            font-size: 20px;
            font-weight: bold;
        }

        .header p {
            font-size: 14px;
            margin-top: 5px;
        }

        .header::after {
            content: '\2197';
            font-size: 40px;
            font-weight: bold;
            position: absolute;
            right: 10px;
            top: 47%;
            transform: translateY(-120%);
        }

        .content_card {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .card {
            width: 100%;
            max-width: 580px;
            min-height: 160px;
            padding: 20px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
            width: 100%;
        }


        .card p {
            font-size: 14px;
            line-height: 1.5;
            text-align: center;
            color: black
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(1, 1fr);
            }

            .card {
                max-width: 100%;
            }
        }

        .carousel-container {
            max-width: 100%;
            margin: auto;
        }

        .title {
            display: inline-block;
            border-bottom: 3px solid red;
            padding-bottom: 5px;
        }

        .carousel-item img {
            width: 500px;
            height: 310px;
            object-fit: cover;
            border-radius: 8px;
        }

        #brandCarouselClient .carousel-item img {
            width: 300px;
            height: 300px;
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

    <div class="accordion-container">
        <h2 class="about-title">About Us</h2>
    </div>

    {{-- Accordion --}}
    <div class="accordion-nav">
        <button class="active" onclick="showContent('overview', this)">Overview</button>
        <button onclick="showContent('history', this)">History</button>
        <button onclick="showContent('growth', this)">Growth</button>
        <button onclick="showContent('industries', this)">Industries</button>
        <button onclick="showContent('commitment', this)">Commitment</button>
    </div>
    <div id="overview" class="content active">
        @foreach ($data as $value)
            <p>
                <center>{{ $value->overview }}</center>
            </p>
        @endforeach
    </div>
    <div id="history" class="content">
        <p>
            <center>{{ $value->history }}</center>
        </p>
    </div>
    <div id="growth" class="content">
        <p>
            <center>{{ $value->growth }}</center>
        </p>
    </div>
    <div id="industries" class="content">
        <p>
            <center>{{ $value->industries }}</center>
        </p>
    </div>
    <div id="commitment" class="content">
        <p>
            <center>{{ $value->commitment }}<center>
        </p>
    </div><br>
    {{-- Accordion End --}}

    {{-- Let’s Build Success Together! --}}
    <div class="header">
        <h1 style="color: white">Let’s Build Success Together!</h1>
        <p>We are ready to be your trusted partner in welding equipment and industrial solutions. Whether you are
            working on a large-scale industrial project or need reliable tools for your business, <strong>PT. PERINTIS
                SUKSES SEJAHTERA</strong> is here to help.</p>
    </div><br>
    {{-- Let’s Build Success Together! End --}}

    {{-- Visi, Misi Motto --}}
    <div class="content_card">
        <div class="card">
            <h3>
                Vision
            </h3>
            <p>"To be the leading and most trusted distributor company, recognized as the partner of choice by
                prioritizing customer satisfaction."</p>
        </div>
        <div class="card">
            <h3>
                Mission
            </h3>
            <p>{{ $value->mission }}</p>
        </div>
        <div class="card">
            <h3>
                Motto
            </h3>
            <p>{{ $value->motto }}</p>
        </div>
    </div><br>
    {{-- Visi, Misi Motto End --}}

    {{-- Client  --}}
    <div class="container-fluid my-5">
        <div class="we-provide-brands text-center">
            <h2 class="title">Client</h2>
        </div>

        <!-- Carousel -->
        <div id="brandCarouselClient" class="carousel slide mt-4 carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center gap-3">
                        <img src="apex-1.0.0/img/fact-1.jpg" class="img-fluid" alt="Brand 1">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 2">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 3">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 4">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 5">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center gap-3">
                        <img src="apex-1.0.0/img/fact-4.jpg" class="img-fluid" alt="Brand 6">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 7">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 8">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 9">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 10">
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#brandCarouselClient"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#brandCarouselClient"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
        </div>
    </div>
    {{-- Client End  --}}

    {{-- Project  --}}
    <div class="container-fluid my-5">
        <div class="we-provide-brands text-center">
            <h2 class="title">Projects</h2>
        </div>

        <!-- Carousel -->
        <div id="brandCarouselProject" class="carousel slide mt-4 carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center gap-3">
                        <img src="apex-1.0.0/img/fact-1.jpg" class="img-fluid" alt="Brand 1">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 2">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 3">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center gap-3">
                        <img src="apex-1.0.0/img/fact-4.jpg" class="img-fluid" alt="Brand 6">
                        <img src="apex-1.0.0/img/fact-3.jpg" class="img-fluid" alt="Brand 7">
                        <img src="apex-1.0.0/img/fact-2.jpg" class="img-fluid" alt="Brand 8">
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#brandCarouselProject"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#brandCarouselProject"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
        </div>

        <div class="brand-section text-center mt-5">
            <p style="color: black">Find more about our another brand</p>
            @foreach ($brand as $value)
                <div class="brand-logos d-flex justify-content-center gap-3">
                    <img src="{{ asset('uploads/' . $value->logo_picture) }}" alt="Isotech" class="brand-logo">
                    {{-- <img src="apex-1.0.0/img/fact-2.jpg" alt="M" class="brand-logo">
                <img src="apex-1.0.0/img/fact-3.jpg" alt="Nishida" class="brand-logo">
                <img src="apex-1.0.0/img/fact-4.jpg" alt="Master" class="brand-logo"> --}}
                </div>
            @endforeach
        </div>
    </div>
    {{-- Project  End --}}

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
    <script>
        function showContent(id, element) {
            document.querySelectorAll(".content").forEach(el => el.classList.remove("active"));
            document.getElementById(id).classList.add("active");

            document.querySelectorAll(".accordion-nav button").forEach(btn => btn.classList.remove("active"));
            element.classList.add("active");
        }
    </script>
</body>


</html>
