@extends('frontend.layouts.app')

@section('content')
    
    <style>
        .breadcrumb {
            background-color: transparent;
            font-size: 0.9rem;
            padding: 0;
            margin-bottom: 1rem;
        }

        .breadcrumb a {
            text-decoration: underline;
            color: #3B3BE7;
            transition: color 0.2s ease-in-out;
        }

        .breadcrumb a:hover {
            color: #dc3545;
        }

        .breadcrumb {
            --bs-breadcrumb-divider: '›';
        }

        .section-line {
            width: 4px;
            height: auto;
            background-color: red;
        }

        .badge-info {
            border-radius: 0.25rem;
            padding: 0.35em 0.65em;
        }

        .bg-warning {
            color: #222222;
        }

        .bg-info {
            color: #ffffff;
        }

        .product-gallery-main {
            border: 1px solid #e7e7e7;
            border-radius: 14px;
            overflow: hidden;
            background: #fff;
            margin-bottom: 14px;
        }

        .product-gallery-main img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: contain;
            display: block;
            background: #fff;
        }

        .product-gallery-thumbs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .product-gallery-thumb {
            border: 1px solid #e7e7e7;
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .product-gallery-thumb.active {
            border-color: #ff4d1a;
            box-shadow: 0 0 0 2px rgba(255, 77, 26, 0.15);
        }

        .product-gallery-thumb img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: contain;
            display: block;
            background: #fff;
        }

        @media (max-width: 575px) {
            .product-gallery-thumbs {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>

    <div class="container-fluid d-flex mt-4">
        <div class="section-line" style="margin-right: 0.5rem;"></div>
        <div aria-label="breadcrumb" class="m-0">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Product</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('product', ['category[]' => $product->id_category]) }}">
                        {{ $product->category_name ?? 'Category' }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $product->name }}
                </li>
            </ol>
        </div>
    </div>

    <div class="container-fluid mt-3 mb-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h3 class="title text-uppercase">Product Insights</h3>
        </div>
    </div>

    <div class="container-fluid">
        <section class="product-details">
            <div class="container">
                <div class="row gx-60">
                    <div class="col-lg-5">
                        <div class="product-gallery">
                            <div class="product-gallery-main">
                                <img id="mainProductImage"
                                    src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                    alt="{{ $product->name }}">
                            </div>

                            <div class="product-gallery-thumbs">
                                <div class="product-gallery-thumb active"
                                    data-image="{{ asset('uploads/' . $product->main_picture_url) }}">
                                    <img src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                        alt="{{ $product->name }}">
                                </div>

                                @foreach ($product->detailPictures as $picture)
                                    <div class="product-gallery-thumb"
                                        data-image="{{ asset('uploads/' . $picture->detail_picture_url) }}">
                                        <img src="{{ asset('uploads/' . $picture->detail_picture_url) }}"
                                            alt="Detail Picture">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="product-about position-relative">
                            <p class="price">
                                @if (empty($product->price) || $product->price == 0)
                                    Call
                                @else
                                    Rp. {{ number_format($product->price, 0, ',', '.') }}
                                @endif
                            </p>

                            <h2 class="product-title">{{ $product->name }}</h2>

                            @if ($product->is_rental == 1)
                                <span class="badge-info bg-info">This product can be rented</span>
                            @endif

                            @if ($product->is_indent == 1)
                                <span class="badge-info bg-warning">This product needs to be indented</span>
                            @endif

                            <div class="btn-group my-3" role="group" aria-label="Basic example">
                                @foreach ($product->externalLink as $item)
                                    <a href="{{ $item->link }}" target="_blank" class="btn btn-secondary"
                                        @style(['background-color:' . $item->hex_color, 'border-radius: 5px;color: white'])>
                                        {{ ucwords($item->link_name) }}
                                    </a>
                                @endforeach
                            </div>

                            <ul class="nav product-tab-style1" id="productTab" role="tablist">
                                @if (!empty($product->description) && $product->description != '')
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            href="#description" role="tab" aria-controls="description"
                                            aria-selected="false">description</a>
                                    </li>
                                @endif

                                @if (!empty($product->spec) && count($product->spec) > 0)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="info-tab" data-bs-toggle="tab" href="#add_info" role="tab"
                                            aria-controls="add_info" aria-selected="false">Specification</a>
                                    </li>
                                @endif
                            </ul>

                            <div class="tab-content" id="productTabContent">
                                @if (!empty($product->description) && $product->description != '')
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="sn-content">
                                            {!! $product->description !!}
                                        </div>
                                    </div>

                                    <style>
                                        .sn-content {
                                            overflow-x: auto;
                                            -webkit-overflow-scrolling: touch;
                                        }

                                        .sn-content table {
                                            width: 100% !important;
                                            max-width: 100% !important;
                                            table-layout: auto;
                                        }

                                        .sn-content th,
                                        .sn-content td {
                                            word-break: break-word;
                                            white-space: normal;
                                        }

                                        .sn-content img {
                                            max-width: 100%;
                                            height: auto;
                                        }

                                        .tab-pane {
                                            overflow: visible;
                                        }
                                    </style>

                                    @push('js_stack')
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function () {
                                                document.querySelectorAll('.sn-content table').forEach((table) => {
                                                    table.removeAttribute('width');
                                                    table.style.width = '100%';
                                                    table.style.maxWidth = '100%';
                                                });

                                                document.querySelectorAll('.sn-content td, .sn-content th').forEach((cell) => {
                                                    cell.removeAttribute('width');
                                                    cell.style.maxWidth = '100%';
                                                });
                                            });
                                        </script>
                                    @endpush
                                @endif

                                <div class="tab-pane fade" id="add_info" role="tabpanel">
                                    <table class="woocommerce-table">
                                        <tbody>
                                            @foreach ($product->spec as $item)
                                                <tr>
                                                    <th>{{ $item->title }}</th>
                                                    <td>{{ $item->data }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-top theme-red">
                    <div class="title-area text-center mb-3">
                        <h4 class="sec-title text-uppercase">Related Products</h4>
                    </div>

                    <div class="row as-carousel product-slider g-0" data-slide-show="4" data-lg-slide-show="3"
                        data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true"
                        data-xl-arrows="true" data-ml-arrows="true">

                        @foreach ($productsRelate as $product)
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="as-product">
                                    <div class="product-img">
                                        <img src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                            alt="product image" />
                                    </div>
                                    <div class="product-content">
                                        <h4 class="product-title h5">
                                            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h4>
                                        <span class="price">
                                            @if (empty($product->price) || $product->price == 0)
                                                Call
                                            @else
                                                Rp. {{ number_format($product->price, 0, ',', '.') }}
                                            @endif
                                        </span>
                                        <a class="as-btn style3"
                                            href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js_stack')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainImage = document.getElementById('mainProductImage');
            const thumbs = document.querySelectorAll('.product-gallery-thumb');

            thumbs.forEach((thumb) => {
                thumb.addEventListener('click', function () {
                    const image = this.getAttribute('data-image');

                    if (mainImage && image) {
                        mainImage.src = image;
                    }

                    thumbs.forEach((item) => item.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        $(function() {
            "use strict";

            $(".as-carousel").each(function() {
                var asSlide = $(this);

                function d(data) {
                    return asSlide.data(data);
                }

                var prevButton =
                    '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-right"></i></button>',
                    nextButton =
                    '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right"></i></button>';

                $("[data-slick-next]").each(function() {
                    $(this).on("click", function(e) {
                        e.preventDefault();
                        $($(this).data("slick-next")).slick("slickNext");
                    });
                });

                $("[data-slick-prev]").each(function() {
                    $(this).on("click", function(e) {
                        e.preventDefault();
                        $($(this).data("slick-prev")).slick("slickPrev");
                    });
                });

                if (d("arrows") == true) {
                    if (!asSlide.closest(".arrow-wrap").length) {
                        asSlide.closest(".container").parent().addClass("arrow-wrap");
                    }
                }

                asSlide.slick({
                    dots: d("dots") ? true : false,
                    fade: d("fade") ? true : false,
                    arrows: d("arrows") ? true : false,
                    speed: d("speed") ? d("speed") : 1000,
                    asNavFor: d("asnavfor") ? d("asnavfor") : false,
                    autoplay: d("autoplay") == false ? false : true,
                    infinite: d("infinite") == false ? false : true,
                    slidesToShow: d("slide-show") ? d("slide-show") : 1,
                    adaptiveHeight: d("adaptive-height") ? true : false,
                    centerMode: d("center-mode") ? true : false,
                    autoplaySpeed: d("autoplay-speed") ? d("autoplay-speed") : 8000,
                    centerPadding: d("center-padding") ? d("center-padding") : "0",
                    focusOnSelect: d("focuson-select") == false ? false : true,
                    pauseOnFocus: d("pauseon-focus") ? true : false,
                    pauseOnHover: d("pauseon-hover") ? true : false,
                    variableWidth: d("variable-width") ? true : false,
                    vertical: d("vertical") ? true : false,
                    verticalSwiping: d("vertical") ? true : false,
                    prevArrow: d("prev-arrow") ?
                        prevButton :
                        '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-left"></i></button>',
                    nextArrow: d("next-arrow") ?
                        nextButton :
                        '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right"></i></button>',
                    rtl: $("html").attr("dir") == "rtl" ? true : false,
                    responsive: [{
                            breakpoint: 1600,
                            settings: {
                                arrows: d("xl-arrows") ? true : false,
                                dots: d("xl-dots") ? true : false,
                                slidesToShow: d("xl-slide-show") ? d("xl-slide-show") : d("slide-show"),
                                centerMode: d("xl-center-mode") ? true : false,
                                centerPadding: "0",
                            },
                        },
                        {
                            breakpoint: 1400,
                            settings: {
                                arrows: d("ml-arrows") ? true : false,
                                dots: d("ml-dots") ? true : false,
                                slidesToShow: d("ml-slide-show") ? d("ml-slide-show") : d("slide-show"),
                                centerMode: d("ml-center-mode") ? true : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                arrows: d("lg-arrows") ? true : false,
                                dots: d("lg-dots") ? true : false,
                                slidesToShow: d("lg-slide-show") ? d("lg-slide-show") : d("slide-show"),
                                centerMode: d("lg-center-mode") ? d("lg-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                arrows: d("md-arrows") ? true : false,
                                dots: d("md-dots") ? true : false,
                                slidesToShow: d("md-slide-show") ? d("md-slide-show") : 1,
                                centerMode: d("md-center-mode") ? d("md-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                arrows: d("sm-arrows") ? true : false,
                                dots: d("sm-dots") ? true : false,
                                slidesToShow: d("sm-slide-show") ? d("sm-slide-show") : 1,
                                centerMode: d("sm-center-mode") ? d("sm-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                arrows: d("xs-arrows") ? true : false,
                                dots: d("xs-dots") ? true : false,
                                slidesToShow: d("xs-slide-show") ? d("xs-slide-show") : 1,
                                centerMode: d("xs-center-mode") ? d("xs-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                    ],
                });

                $('a[data-slide]').on("click", function(e) {
                    e.preventDefault();
                    var slideno = $(this).data('slide');
                    $('.as-carousel').slick('slickGoTo', slideno - 1);
                });
            });
        })
    </script>
@endpush