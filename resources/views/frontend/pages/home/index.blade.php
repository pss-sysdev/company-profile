@extends('frontend.layouts.app')

@section('content')
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
            @foreach ($productCategory as $value)
                <div class="product-item">
                    <img src="{{ asset('uploads/' . $value->picture_url) }}" alt="Air Compressor">
                    <h5>Air Compressor</h5>
                </div>
            @endforeach
        </div>
        <br>
        <div class="button-container">
            <a href="{{ route('product') }}" class="explore">Explore Products</a>
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
            @foreach ($product as $value)
                <div class="col">
                    <div class="card border-0 text-center">
                        <img src="{{ asset('uploads/' . $value->main_picture_url_product) }}" class="card-img-top img-fluid"
                            alt="Product 1">
                        <div class="card-body">
                            <h6 class="fw-bold">{{ $value->name_product }}</h6>
                            <p class="text-muted">{{ $value->name_category }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
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
            @foreach ($brand as $value)
                <div class="col">
                    <div class="card border-0 text-center shadow-sm p-3">
                        <img src="{{ asset('uploads/' . $value->logo_picture) }}" class="card-img-top img-fluid"
                            alt="{{ $value->name }}">
                    </div>
                </div>
            @endforeach
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
        {{-- <div id="brandCarousel" class="carousel slide mt-4 carousel-container" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($brand as $value)
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center gap-3">
                            <img src="{{ asset('uploads/' . $value->logo_picture) }}" class="img-fluid" alt="Brand 1">
                        </div>
                    </div>
                @endforeach
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
            <button class="carousel-control-prev" type="button" data-bs-target="#brandCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#brandCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
        </div> --}}

        <div id="brandCarousel" class="carousel slide mt-4 carousel-container" data-bs-ride="carousel"
            data-bs-interval="3000">
            <div class="carousel-inner">
                @foreach ($brand->chunk(5) as $index => $brandChunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="d-flex justify-content-center gap-3">
                            @foreach ($brandChunk as $brand)
                                <img src="{{ asset('uploads/' . $brand->logo_picture) }}" class="img-fluid brand-logo"
                                    alt="{{ $brand->name }}">
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#brandCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#brandCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
            </button>
        </div>

        <!-- Button Explore -->
        <div class="text-center mt-4">
            <a href="{{ route('brand') }}" class="explore">Explore Brands</a>
        </div>
    </div>
    <!-- We Provide Brands End -->
@endsection
