@extends('frontend.layouts.app')

@section('content')

    <style>
        .card-body {
            padding: 0.25rem 0.55rem;
        }

        .vr {
            width: 1px;
            background-color: #cccccc98;
            height: auto;
            margin-top: 0 !important;
            padding: 0 !important;
            border-radius: 10px;
        }

    </style>
    <!-- Product Category -->
    <div class="container py-5">
        <div class="product-category">
            <div class="slogan-pss">
                <h3><i class="fa-solid fa-check text-red-500" style="color: red"></i> Sale</h3>
                <h3><i class="fa-solid fa-check text-red-500" style="color: red"></i> Repair</h3>
                <h3><i class="fa-solid fa-check text-red-500" style="color: red"></i> Rental</h3>
            </div><br><br>
            <h6 class="text-uppercase" style="color: black">Product Category</h6>
            <h2 class="title">We Provide Type of Product</h2>
        </div>
        <div class="product-list">
            @foreach ($productCategory as $value)
            <a class="product-item"
                data-id="{{ $value->id }}"
                data-name="{{ $value->name }}"
                href="{{ route('product', ['category[]' => $value->id]) }}"
                style="cursor: pointer;">

                    <img src="{{ asset('uploads/' . $value->picture_url) }}" alt="{{ $value->name }}">
                    <h5>{{ $value->name }}</h5>
            </a>
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

        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-3 row-cols-2 g-4 justify-content-center">
            @foreach ($product as $value)
                <a class="col mt-0" href="{{ route('product.detail', ['slug' => $value->slug_product]) }}">
                    <div class="card border-0 text-center" style="align-items: center;">
                        <img src="{{ asset('uploads/' . $value->main_picture_url_product) }}" class="card-img-top img-fluid"
                            alt="Product 1" style="width: 85%; aspect-ratio: 1 / 1;">
                        <div class="card-body">
                            <h6 class="fw-bold mb-0">{{ $value->name_product }}</h6>
                            <p class="text-muted mb-0">{{ $value->name_category }}</p>
                        </div>
                    </div>
                </a>
                @if (!$loop->last)
                    <div class="vr mx-2" style="height: auto;"></div>
                @endif
            @endforeach
        </div>
    </div>
    <!-- Top Selling Product End -->

    <!-- Find More About Our Brands -->
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
            width: 5px;
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
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="container-fluid my-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h2 class="title">Find More About Our Brands</h2>
        </div>

        <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 g-4 justify-content-center">
            @foreach ($categoryOnBrand as $value)
                <div class="col" style="justify-items: center;">
                    <a class="card border-0 text-center shadow-sm own-brand-card" href="{{ route('page', $value->url) }}">
                        <img src="{{ asset('uploads/' . $value->logo_picture) }}"
                            class="card-img-top img-fluid resized-img own-brand-img" alt="{{ $value->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Find More About Our Brands End -->

    <!-- We Provide Brands -->
    <!-- Carousel Wrapper -->
    <div class="container-fluid my-5">
        <div class="we-provide-brands text-center">
            <h6 class="text-uppercase">Brand</h6>
            <h2 class="title">We Provide Brands</h2>
        </div>

        <div class="carousel-wrapper" id="carouselWrapper">
            <div class="carousel-track" id="carouselTrack">
                @foreach ($brand as $item)
                    <div class="carousel-item">
                        <img src="{{ asset('uploads/' . $item->logo_picture) }}" alt="{{ $item->name }}">
                    </div>
                @endforeach
                @foreach ($brand as $item) {{-- duplicated for loop --}}
                    <div class="carousel-item">
                        <img src="{{ asset('uploads/' . $item->logo_picture) }}" alt="{{ $item->name }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        .carousel-wrapper {
            overflow: hidden;
            width: 100%;
            max-width: 1160px;
            margin: auto;
            position: relative;
            height: 100px;
        }

        .carousel-track {
            display: flex;
            flex-wrap: nowrap;
            will-change: transform;
            min-width: 200%; /* ✅ force to overflow beyond wrapper */
        }

        .carousel-item {
            flex: 0 0 auto;
            width: 160px;
            height: 80px;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-item img {
            max-height: 80px;
            max-width: 100%;
            object-fit: cover;
            user-drag: none;
            -webkit-user-drag: none;
            pointer-events: none;
        }
    </style>

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const track = document.getElementById('carouselTrack');
            const wrapper = document.getElementById('carouselWrapper');

            let position = 0;
            const speed = 0.6;
            let isDragging = false;
            let startX = 0;
            let currentX = 0;
            let velocity = 0;
            let animationFrame;

            const itemWidth = 180; // 160 + margin
            const totalItems = track.children.length;
            const loopPoint = itemWidth * totalItems / 2;

            // Inside DOMContentLoaded
            const originalItems = track.innerHTML;
            track.innerHTML += originalItems; // duplicate once on client


            function animate() {
                if (!isDragging) {
                    position -= speed;
                    if (position <= -loopPoint) position = 0;
                    if (position > 0) position = -loopPoint;
                }

                track.style.transform = `translateX(${position}px)`;
                animationFrame = requestAnimationFrame(animate);
            }

            animate();

            wrapper.addEventListener('mousedown', (e) => {
                isDragging = true;
                cancelAnimationFrame(animationFrame);
                startX = e.pageX - position;
            });

            wrapper.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                currentX = e.pageX;
                position = currentX - startX;
                track.style.transform = `translateX(${position}px)`;
            });

            wrapper.addEventListener('mouseup', (e) => {
                isDragging = false;
                velocity = (e.pageX - currentX) * 0.8;
                momentum();
            });

            wrapper.addEventListener('mouseleave', () => {
                if (isDragging) {
                    isDragging = false;
                    momentum();
                }
            });

            wrapper.addEventListener('touchstart', (e) => {
                isDragging = true;
                cancelAnimationFrame(animationFrame);
                startX = e.touches[0].pageX - position;
            });

            wrapper.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                currentX = e.touches[0].pageX;
                position = currentX - startX;
                track.style.transform = `translateX(${position}px)`;
            });

            wrapper.addEventListener('touchend', () => {
                isDragging = false;
                momentum();
            });

            function momentum() {
                velocity *= 0.95;
                position += velocity;

                if (position <= -loopPoint) position = 0;
                if (position > 0) position = -loopPoint;

                track.style.transform = `translateX(${position}px)`;

                if (Math.abs(velocity) > 0.1) {
                    requestAnimationFrame(momentum);
                } else {
                    animate();
                }
            }
        });
    </script>










    <!-- Button Explore -->
    <div class="text-center mt-4">
        <a href="{{ route('brand') }}" class="explore">Explore Brands</a>
    </div>
    </div>
    <!-- We Provide Brands End -->
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carousel = new bootstrap.Carousel(document.getElementById('brandCarousel'), {
            interval: 2000,
            ride: 'carousel'
        });
    });
</script>
