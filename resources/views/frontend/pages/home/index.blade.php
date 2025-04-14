@extends('frontend.layouts.app')

@section('content')
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
                <div class="product-item">
                    <img src="{{ asset('uploads/' . $value->picture_url) }}" alt="{{ $value->name }}">
                    <h5>{{ $value->name }}</h5>
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
            @foreach ($categoryOnBrand as $value)
                <div class="col">
                    <div class="card border-0 text-center shadow-sm p-3">
                        <a href="{{ route('page', $value->url) }}">
                            <img src="{{ asset('uploads/' . $value->logo_picture) }}"
                                class="card-img-top img-fluid resized-img" alt="{{ $value->name }}">
                        </a>
                    </div>
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
