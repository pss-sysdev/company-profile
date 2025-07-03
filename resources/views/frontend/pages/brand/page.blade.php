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

    <!-- Template Stylesheet -->
    <link href="{{ asset('apex-1.0.0/css/style.css') }}" rel="stylesheet" />
    <style>
        .brand-section {
            margin-top: 40px;
        }

        .brand-logos {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand-logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand-logo {
            width: 120px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.05);
        }

        p {
            color: black;
        }

        .container-fluid img {
            border-radius: 10px;
            object-fit: cover;
        }

        .rectangular-image {
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-section {
            margin-top: 50px;
            text-align: center;
        }

        .product-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .product-card {
            width: 14.667%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 100px;
            object-fit: contain;
        }

        .product-info {
            padding: 15px;
            background-color: #fff;
        }

        .product-info h5 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .request-btn {
            background-color: #e52a2a;
            color: #fff;
            padding: 7px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-size: 10.5px;
            transition: background-color 0.3s ease;
        }

        .request-btn:hover {
            background-color: #bf2525;
        }

        .explore-link {
            margin-top: 30px;
            display: inline-block;
            background-color: #e52a2a;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .explore-link:hover {
            background-color: #bf2525;
        }

        .banner-pss-standar {
            max-width: 1000px;
            max-height: 170px;
            height: auto;
            aspect-ratio: 100 / 17;
        }

        @media (max-width: 1200px) {
            .heading-product-pss {
                font-size: 0.8rem;
            }

            .banner-pss-standar {
                max-width: 100%;
            }
        }

        @media (max-width: 992px) {
            .product-card {
                width: 24.445%;
            }
        }

        @media (max-width: 768px) {
            .product-card {
                width: 27.778%;
            }
        }

        @media (max-width: 576px) {
            .product-card {
                width: 44.445%;
            }
        }
    </style>
</head>

<body>
    @include('components_frontend.header')

    {{-- Find more about our another brand --}}
    @if (!$listBrand->isEmpty())
        <div class="brand-section text-center mt-5">
            <p>Find more about our other brands</p>
            <div class="brand-logos d-flex justify-content-center gap-4">
                @foreach ($listBrand as $value)
                    <div class="brand-logo-container">
                        <a
                            href="{{ $value->url === request()->segment(2) ? '#' : route('page', ['slug' => $value->url]) }}">
                            <img src="{{ asset('uploads/' . $value->logo_picture) }}" alt="{{ $value->name }}"
                                class="brand-logo">
                        </a>
                    </div>
                @endforeach
            </div>
        </div><br>
    @else
        <div class="brand-section text-center mt-5"></div>
        <br>
    @endif

    {{-- Find more about our another brand --}}

    <div class="container-fluid">
        <div class="row">
            @foreach ($brand as $value)
                <div class="col-12 p-0">
                    <center>
                        <img src="{{ asset('uploads/' . $value->banner_picture) }}" alt="Your Image Description"
                            class="img-fluid rectangular-image banner-pss-standar" style="" />
                        <br><br>
                    </center>
                </div>
                <div class="col-12">
                    <h1>{{ $value->title }}</h1>
                    {!! $value->description !!}
                </div>
                <!-- <div class="col-12">
                    <h5>Our Catalogue</h5>
                    <p class="text-justify">
                        - <a href="{{ asset('path/to/your/pdf/filename.pdf') }}" download>Download Full Catalogue
                            PDF</a>
                        <br>
                    </p>
                </div> -->
                <div class="col-12">
                    <h5>{{ $value->title }}'s Category </h5>
                    @foreach ($brandCategoryDistinct as $distinct)
                        <p class="text-justify">
                            <a
                                href="{{ route('product', ['category[]' => $distinct->group_id, 'brand[]' => $distinct->id]) }}">{{ $distinct->group_name }}</a>
                        </p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <div class="product-section">
        <div class="product-grid">
            @foreach ($listProduct as $value)
                <div class="product-card"
                    onclick="window.location='{{ route('product.detail', ['slug' => $value->slug]) }}'"
                    style="cursor: pointer;">
                    <img src="{{ asset('uploads/' . $value->main_picture_url) }}" alt="{{ $value->product_name }}"
                        class="product-image">
                    <div class="product-info">
                        <h6 class="heading-product-pss">{{ $value->product_name }}</h6>
                        <a href="#" class="request-btn swal-request"
                            data-link="{{ route('contact_us') }}?product_id={{ $value->product_id }}#service-wrapper"
                            data-name="{{ $value->product_name }}">
                            Request Quotation
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Explore Link -->
        <a href="{{ route('product', ['brand[]' => $brand->first()->b_id]) }}" class="explore-link">Explore
            {{ $brand->first()->title }} Product</a>
        <br><br>
    </div>

    <!-- Your other content sections -->

    @include('components_frontend.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('apex-1.0.0/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('apex-1.0.0/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('apex-1.0.0/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('apex-1.0.0/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('library/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('library/slick/slick.min.js') }}"></script>
    <!-- Tambahkan ini di bagian <head> atau sebelum penutup </body> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('apex-1.0.0/js/main.js') }}"></script>
    <script src="{{ asset('js/custom-frontend.js') }}"></script>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const requestButtons = document.querySelectorAll('.swal-request');

        requestButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const link = this.dataset.link;
                const productName = this.dataset.name;

                Swal.fire({
                    title: 'Are you sure?',
                    text: `You want request this item?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                    }
                });
            });
        });
    });
</script>
