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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .contact-section {
            max-width: 1000px;
            margin: auto;
        }

        .contact-description {
            font-size: 14px;
            color: #555;
            max-width: 800px;
            margin: auto;
            margin-bottom: 30px;
        }

        .contact-box {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            margin: auto;
            text-align: left;
        }

        .info-box {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .info-title {
            color: black;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .contact-box ul {
            padding-left: 0;
            list-style: none;
        }

        .contact-box ul li {
            color: #000;
            font-size: 14px;
            position: relative;
            padding-left: 20px;
            margin-bottom: 5px;
        }

        .contact-box ul li::before {
            content: "●";
            color: black;
            font-size: 10px;
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
        }

        .info-title::before {
            content: "";
            width: 3px;
            height: 20px;
            background: red;
            display: inline-block;
        }

        .info-content {
            font-size: 14px;
            color: #333;
        }

        .info-content ul {
            list-style: none;
            padding: 0;
        }

        .info-content ul li {
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .contact-box {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .contact-box {
                padding: 20px;
            }
        }

        .contact-us .card {
            border-radius: 10px;
            background: #fff;
        }

        .contact-us .fa-2x {
            color: #dc3545;
        }

        p {
            color: black !important;
        }

        .contact-box ul li {
            color: #000;
            font-size: 14px;
            position: relative;
            padding-left: 20px;
        }

        .contact-box ul li::before {
            content: "●";
            color: black;
            font-size: 10px;
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
        }

        .text-center {
            text-align: center;
            display: block;
            width: 100%;
        }

        .underline-title {
            font-size: 28px;
            font-weight: bold;
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
            text-align: center;
        }

        .underline-title::after {
            content: "";
            display: block;
            width: 40%;
            max-width: 160px;
            height: 3px;
            background: red;
            margin: 5px auto 0;
        }

        .quote-button {
            display: block;
            background: #4c32f4;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            text-align: center;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-info {
            background-color: #5a42f5;
            border: none;
        }

        .btn-info:hover {
            background-color: #4835d4;
        }

        @media (max-width: 768px) {
            .request-quotation-btn {
                padding: 12px 0;
                font-size: 16px;
            }
        }

        @media (min-width: 768px) {
            .request-quotation-btn {
                padding: 12px 40px;
                font-size: 18px;
            }
        }

        .service-wrapper {
            text-align: center;
        }

        .service-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 100%;
            margin: auto;
            padding-top: 10px;
        }

        .service-item {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #000;
        }

        .service-item i {
            font-size: 33px;
            color: red;
        }

        @media (max-width: 480px) {
            .service-container {
                gap: 15px;
            }
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

    <section class="contact-us py-5">
        <div class="container">
            {{-- <h2 class="text-center fw-bold">Contact Us</h2> --}}
            <h2 class="text-center fw-bold underline-title">Contact Us</h2>
            <p class="text-center">
                If you have any questions, feel free to reach out! You can contact us by email or give us a call during
                our business hours (Monday to Saturday, 8:00 AM – 5:30 PM). Alternatively, you can also fill the
                ‘Quotation’ form below to send us a message. Our friendly customer support team is always happy to help!
            </p>

            <div class="contact-box">
                <div class="info-box">
                    <div>
                        <div class="info-title"><i class="fas fa-phone-alt"></i> Business Line</div>
                        <div class="info-content">
                            <ul>
                                <li>+62 21 8839 4890</li>
                                <li>+62 21 8837 0217</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div>
                        <div class="info-title"><i class="fas fa-envelope"></i> Business Email</div>
                        <div class="info-content">
                            <ul>
                                <li>Email 1</li>
                                <li>Email 2</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div>
                        <div class="info-title"><i class="fab fa-whatsapp"></i> WhatsApp</div>
                        <div class="info-content">
                            <ul>
                                <li>+62 21 8839 4890</li>
                                <li>+62 21 8837 0217</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-box">
                    <div>
                        <div class="info-title"><i class="fas fa-map-marker-alt"></i> Location</div>
                        <div class="info-content">
                            <p>Ruko Sentra Niaga Kalimas<br>
                                Blok B/18B<br>
                                Jl. Inspeksi Kalimalang<br>
                                Setiadarma, Tambun Selatan<br>
                                Kabupaten Bekasi<br>
                                Jawa Barat 17510<br>
                                Indonesia</p>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="service-wrapper" id="service-wrapper">
                <p>We are here to help by providing</p>
                <div class="service-container">
                    <div class="service-item">
                        <i class="fa-solid fa-check"></i>
                        <h2>Sale</h2>
                    </div>
                    <div class="service-item">
                        <i class="fa-solid fa-check"></i>
                        <h2>Repair</h2>
                    </div>
                    <div class="service-item">
                        <i class="fa-solid fa-check"></i>
                        <h2>Rental</h2>
                    </div>
                </div>
            </div>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="border-start border-5 border-danger ps-4 mb-5">
                                <h6 class="text-body text-uppercase mb-2">Appointment / Quotation</h6>
                                <h6 class="display-6 mb-0">
                                    Please fill this if you are interested to have partnership and request quotation
                                </h6>
                            </div>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light" id="name"
                                                placeholder="Name" />
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light"
                                                id="your_category" placeholder="your_category" />
                                            <label for="your_category">Your Category (Buyer/seller)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light" id="request"
                                                placeholder="request" />
                                            <label for="e">Request appointment/quotation</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light"
                                                id="company_name" placeholder="company_name" />
                                            <label for="company_name">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light"
                                                id="industry" placeholder="industry" />
                                            <label for="industry">Industry</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light"
                                                maxlength="15" id="contact_number" placeholder="Contact Number"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                            <label for="contact_number">Contact Number</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0 bg-light"
                                                id="email_address" placeholder="email_address" />
                                            <label for="email_address">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0 bg-light"
                                                id="your_message" placeholder="your_message" />
                                            <label for="your_message">Your Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-info request-quotation-btn w-100 w-md-auto"
                                            type="submit" style="color: white">
                                            Request Quotation
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 450px">
                            <div class="position-relative h-100">
                                <iframe class="position-relative w-100 h-100"
                                    src="https://maps.google.com/maps?width=779&amp;height=450&amp;hl=en&amp;q=perintis sukses sejahtera&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                    frameborder="0" style="min-height: 450px; border: 0" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                        <div class="brand-section text-center mt-5">
                            <p>Find more about our another brand</p>
                            @foreach ($brand as $value)
                                <div class="brand-logos d-flex justify-content-center gap-3">
                                    <img src="{{ asset('uploads/' . $value->logo_picture) }}" alt="Isotech"
                                        class="brand-logo">
                                    {{-- <img src="apex-1.0.0/img/fact-2.jpg" alt="M" class="brand-logo">
                                <img src="apex-1.0.0/img/fact-3.jpg" alt="Nishida" class="brand-logo">
                                <img src="apex-1.0.0/img/fact-4.jpg" alt="Master" class="brand-logo"> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
