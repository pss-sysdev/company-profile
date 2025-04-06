@extends('frontend.layouts.app')

@section('content')
    <!-- Our Brands -->
    <div class="container-fluid my-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h2 class="title">Product Detail</h2>
        </div>
    </div>
    <!-- Our Brands End -->

    {{-- Welding Machine Section  --}}
    <div class="container-fluid my-5">
        <section class="product-details space">
            <div class="container">
                <div class="row gx-60">
                    <div class="col-lg-6">
                        <div class="product-big-img">
                            <div class="img">
                                <img src="{{ asset('uploads/' . $product->main_picture_url) }}" alt="Product Image" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-about">
                            <p class="price">Rp. {{ number_format($product->price, 2) }}</p>
                            <h2 class="product-title">{{ $product->name }}</h2>
                            <p class="text">
                                Syndicate customized growth strategies prospective human capital
                                leverage other's optimal e-markets without transparent catalysts
                                for change. Credibly coordinate highly efficient methods of
                                empowerment cross unit solutions.
                            </p>
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary">Shopee</button>
                                <button type="button" class="btn btn-secondary">Tokopedia</button>
                                <button type="button" class="btn btn-secondary">WhatsApp</button>
                                <button type="button" class="btn btn-secondary">Email</button>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav product-tab-style1" id="productTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description"
                            role="tab" aria-controls="description" aria-selected="false">description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="info-tab" data-bs-toggle="tab" href="#add_info" role="tab"
                            aria-controls="add_info" aria-selected="false">Additional Information</a>
                    </li>
                </ul>
                <div class="tab-content" id="productTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" id="add_info" role="tabpanel">
                        <table class="woocommerce-table">
                            <tbody>
                                <tr>
                                    <th>Brand</th>
                                    <td>Jakuna</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td>Yellow</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>400 gm</td>
                                </tr>
                                <tr>
                                    <th>Battery</th>
                                    <td>Lithium</td>
                                </tr>
                                <tr>
                                    <th>Material</th>
                                    <td>Wood</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="space-top theme-red">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Related Products</h2>
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
                                            <a href="shop-details.html">{{ $product->name }}</a>
                                        </h4>
                                        <span class="price">Rp. {{ number_format($product->price, 2) }}</span>
                                        <a class="as-btn style3"
                                            href="{{ route('product.detail', ['slug' => $product->slug]) }}"> Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- STEEL BEVEL & PRESSURE PAINT End --}}
@endsection


@push('js_stack')
    <script>
        $(function() {
            "use strict";

            $(".as-carousel").each(function() {
                var asSlide = $(this);

                // Collect Data
                function d(data) {
                    return asSlide.data(data);
                }

                // Custom Arrow Button
                var prevButton =
                    '<button type="button" class="slick-prev"><i class="fa-solid fa-arrow-right"></i></button>',
                    nextButton =
                    '<button type="button" class="slick-next"><i class="fa-solid fa-arrow-right"></i></button>';

                // Function For Custom Arrow Btn
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

                // Check for arrow wrapper
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
                                slidesToShow: d("xl-slide-show") ?
                                    d("xl-slide-show") : d("slide-show"),
                                centerMode: d("xl-center-mode") ? true : false,
                                centerPadding: "0",
                            },
                        },
                        {
                            breakpoint: 1400,
                            settings: {
                                arrows: d("ml-arrows") ? true : false,
                                dots: d("ml-dots") ? true : false,
                                slidesToShow: d("ml-slide-show") ?
                                    d("ml-slide-show") : d("slide-show"),
                                centerMode: d("ml-center-mode") ? true : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 1200,
                            settings: {
                                arrows: d("lg-arrows") ? true : false,
                                dots: d("lg-dots") ? true : false,
                                slidesToShow: d("lg-slide-show") ?
                                    d("lg-slide-show") : d("slide-show"),
                                centerMode: d("lg-center-mode") ?
                                    d("lg-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                arrows: d("md-arrows") ? true : false,
                                dots: d("md-dots") ? true : false,
                                slidesToShow: d("md-slide-show") ?
                                    d("md-slide-show") : 1,
                                centerMode: d("md-center-mode") ?
                                    d("md-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                arrows: d("sm-arrows") ? true : false,
                                dots: d("sm-dots") ? true : false,
                                slidesToShow: d("sm-slide-show") ?
                                    d("sm-slide-show") : 1,
                                centerMode: d("sm-center-mode") ?
                                    d("sm-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        {
                            breakpoint: 576,
                            settings: {
                                arrows: d("xs-arrows") ? true : false,
                                dots: d("xs-dots") ? true : false,
                                slidesToShow: d("xs-slide-show") ?
                                    d("xs-slide-show") : 1,
                                centerMode: d("xs-center-mode") ?
                                    d("xs-center-mode") : false,
                                centerPadding: 0,
                            },
                        },
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
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
