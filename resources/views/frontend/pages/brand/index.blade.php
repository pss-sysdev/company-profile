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
    <link href="apex-1.0.0/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="apex-1.0.0/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="apex-1.0.0/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="apex-1.0.0/css/style.css" rel="stylesheet" />
    <style>
        .title {
            display: inline-block;
            border-bottom: 3px solid red;
            padding-bottom: 5px;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-line {
            width: 4px;
            height: 25px;
            background-color: red;
        }

        .section-title {
            margin: 0;
        }

        .custom-container {
            max-width: 85%;
            margin: 0 auto;
        }

        .own-brand-card{
            aspect-ratio: 285 / 118;
            width: 100%;
            max-width: 285px;
        }

        .own-brand-img{
            /* object-fit: contain; */
            object-fit: cover;
            width: 100%;
            height: auto;
            aspect-ratio: 285 / 118;
        }

        .own-brand-cat-img {
            /* object-fit: contain; */
            object-fit: cover;
            width: 100%;
            height: auto;
            aspect-ratio: 285 / 118;
        }
    </style>
</head>

<body>
    @include('components_frontend.header')

    <!-- Our Brands -->
    <div class="container-fluid my-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; margin-bottom: 24px;">
            <h3 class="title text-uppercase"> Our Brands</h3>
        </div>

        <div class="custom-container">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-4 justify-content-center">
                @foreach ($categoryOnBrand as $value)
                    <div class="col">
                        <div class="card border-0 text-center own-brand-card" style="box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);">
                            <a href="{{ route('page', $value->url) }}">
                                <img src="{{ asset('uploads/' . $value->logo_picture) }}" class="card-img-top img-fluid own-brand-img"
                                    alt="{{ $value->name }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Our Brands End -->

    {{-- Welding Machine Section  --}}
    @foreach ($brandCategory as $brandCategory)
        <div class="container-fluid ">
            <div class="section-header">
                <div class="section-line"></div>
                <h4 class="section-title text-uppercase">{{ $brandCategory->group_name }}</h4>
            </div>

            <div class="custom-container">
                <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-3 g-md-4 mt-3">
                    @foreach ($brand->where('group_id', $brandCategory->group_id) as $value)
                        <a class="col" href="{{ route('product', ['category[]' => $value->group_id, 'brand[]' => $value->id]) }}">
                            <div class="card border-0 text-center own-brand-card" style="box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('uploads/' . $value->logo_picture) }}"
                                    class="card-img-top img-fluid own-brand-cat-img" alt="{{ $value->name }}">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div><br>
    @endforeach
    {{-- Welding Machine Section End  --}}

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
