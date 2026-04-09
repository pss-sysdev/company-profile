@extends('frontend.layouts.app')

@section('content')
    <div class="pss-homepage">
        <style>
            :root {
                --pss-accent: #ff4d1a; /* red !important */
                --pss-text: #111111;
                --pss-muted: #666666;
                --pss-border: #d9d9d9;
            }

            .pss-homepage {
                font-family: Arial, sans-serif;
                color: var(--pss-text);
            }

            .pss-homepage .card-body {
                padding: 0.25rem 0.55rem;
            }

            .pss-homepage .truncate-multiline {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .pss-homepage .button-container {
                text-align: center;
            }

            /* Shared section heading */
            .pss-homepage .pss-section-heading {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                gap: 10px;
                margin-bottom: 42px;
            }

            .pss-homepage .pss-section-kicker {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
                font-size: 12px;
                font-weight: 700;
                letter-spacing: 0.14em;
                text-transform: uppercase;
                color: var(--pss-muted);
                margin: 0;
            }

            .pss-homepage .pss-section-kicker::before,
            .pss-homepage .pss-section-kicker::after {
                content: "";
                width: 28px;
                height: 2px;
                background: var(--pss-accent);
                flex: 0 0 auto;
            }

            .pss-homepage .pss-section-title {
                width: 100%;
                display: block;
                margin: 0;
                font-size: clamp(22px, 2.6vw, 32px);
                line-height: 1.15;
                font-weight: 800;
                text-transform: uppercase;
                color: var(--pss-text);
            }

            .pss-homepage .pss-section-title::after {
                content: "";
                display: block;
                width: min(100%, 520px);
                height: 4px;
                background: var(--pss-accent);
                margin: 12px auto 0;
            }

            /* Banner */
            .pss-homepage .banner-wrapper {
                position: relative;
                overflow: hidden;
            }

            .pss-homepage .banner-img {
                z-index: 0;
                width: 100%;
                height: auto;
                object-fit: cover;
            }

            .pss-homepage .banner-content {
                position: relative;
                z-index: 1;
            }

            .pss-homepage .slogan-pss h3 {
                font-size: 24px;
                font-weight: 800;
                line-height: 1.25;
                margin-bottom: 12px;
            }

            .pss-homepage .slogan-pss a {
                color: #111111 !important;
                text-decoration: none;
            }

            .pss-homepage .slogan-pss a:hover {
                color: var(--pss-accent) !important;
            }

            /* Product and card text */
            .pss-homepage .product-item,
            .pss-homepage .product-item:hover,
            .pss-homepage .product-card,
            .pss-homepage .product-card:hover {
                text-decoration: none;
                color: var(--pss-text);
            }

            .pss-homepage .product-item h6,
            .pss-homepage .card-body h6 {
                font-size: 15px;
                font-weight: 700;
                line-height: 1.4;
                color: #111111 !important;
                margin: 2px 2px 4px 2px;
            }

            .pss-homepage .product-item p,
            .pss-homepage .card-body p {
                font-size: 14px;
                line-height: 1.5;
                color: var(--pss-muted) !important;
            }

            .pss-homepage .product-item p {
                margin: 0;
                font-weight: 500;
                line-height: 1.3;
            }

            /* Buttons */
            .pss-homepage .explore {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 210px;
                padding: 13px 20px;
                border-radius: 4px;
                text-decoration: none;
                font-size: 14px;
                font-weight: 700;
                letter-spacing: 0.02em;
                background: var(--pss-accent);
                color: #ffffff;
                border: 1px solid var(--pss-accent);
                transition: all 0.2s ease;
            }

            .pss-homepage .explore:hover {
                background: #e64516;
                border-color: #e64516;
                color: #ffffff;
            }

            /* Top selling product grid */
            .pss-homepage .grid-wrapper {
                display: flex;
                justify-content: center;
                padding: 1rem;
            }

            .pss-homepage .fixed-grid {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                padding: 1rem;
                gap: 0;
            }

            .pss-homepage .fixed-grid-item {
                position: relative;
                padding: 1rem;
                background-color: #ffffff;
                text-align: center;
                box-sizing: border-box;
                width: 50%;
            }

            @media (min-width: 768px) {
                .pss-homepage .fixed-grid-item {
                    width: 33.3333%;
                }
            }

            @media (min-width: 992px) {
                .pss-homepage .fixed-grid-item {
                    width: 20%;
                }
            }

            .pss-homepage .fixed-grid-item::after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 1px;
                height: 95%;
                background-color: #cccccc;
            }

            @media (min-width: 992px) {
                .pss-homepage .fixed-grid-item:nth-child(5n)::after {
                    content: none;
                }
            }

            @media (min-width: 768px) and (max-width: 991.98px) {
                .pss-homepage .fixed-grid-item:nth-child(3n)::after {
                    content: none;
                }
            }

            @media (max-width: 767.98px) {
                .pss-homepage .fixed-grid-item:nth-child(2n)::after {
                    content: none;
                }
            }

            .pss-homepage .fixed-grid-item:last-of-type::after {
                content: none !important;
            }

            .pss-homepage .card.border-0.text-center {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            /* Brand cards */
            .pss-homepage .own-brand-card {
                aspect-ratio: 285 / 118;
                width: 100%;
                max-width: 254px;
                border-radius: 10px;
                overflow: hidden;
            }

            .pss-homepage .own-brand-img {
                object-fit: contain;
                width: 100%;
                height: auto;
                aspect-ratio: 285 / 118;
            }

            @media (max-width: 1024px) {
                .pss-homepage .own-brand-card {
                    width: 21%;
                }
            }

            @media (max-width: 768px) {
                .pss-homepage .own-brand-card {
                    width: 21%;
                }
            }

            @media (max-width: 576px) {
                .pss-homepage .own-brand-card {
                    width: 45%;
                }
            }

            @media (max-width: 375px) {
                .pss-homepage .own-brand-card {
                    width: 45%;
                }
            }

            /* Brand carousel */
            .pss-homepage .carousel-wrapper {
                overflow: hidden;
                width: 100%;
                max-width: 1160px;
                margin: auto;
                position: relative;
                height: 100px;
            }

            .pss-homepage .carousel-track {
                display: flex;
                flex-wrap: nowrap;
                will-change: transform;
                min-width: 200%;
            }

            .pss-homepage .carousel-item {
                flex: 0 0 auto;
                width: 160px;
                height: 80px;
                margin: 0 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 8px;
            }

            .pss-homepage .carousel-item img {
                max-height: 80px;
                max-width: 100%;
                object-fit: contain;
                user-drag: none;
                -webkit-user-drag: none;
                pointer-events: none;
            }

            @media (max-width: 567px) {
                .pss-homepage .card-body h6 {
                    font-size: 12px;
                }

                .pss-homepage .card-body p {
                    font-size: 12px;
                }
            }

            @media (max-width: 768px) {
                .pss-homepage .pss-section-title {
                    font-size: 24px;
                }

                .pss-homepage .slogan-pss h3 {
                    font-size: 18px;
                }

                .pss-homepage .pss-section-title::after {
                    width: min(100%, 280px);
                }
            }
        </style>

        <div class="banner-wrapper position-relative w-100">
            <picture>
                <source media="(max-width: 700px)" srcset="{{ asset('img/mobile-pss-banner.webp') }}">

                <img
                    src="{{ asset('img/desktop-pss-banner.webp') }}"
                    alt="Banner"
                    class="img-fluid w-100 banner-img position-absolute top-0 start-0"
                >
            </picture>

            <div class="container pt-5 position-relative banner-content">
                <div class="product-category">
                    <div class="slogan-pss">
                        <h3>
                            <i class="fa-solid fa-check" style="color:red"></i>
                            <a href="{{ route('about_us') }}#sale">Sale</a>
                        </h3>
                        <h3>
                            <i class="fa-solid fa-check" style="color:red"></i>
                            <a href="{{ route('about_us') }}#repair">Repair</a>
                        </h3>
                        <h3>
                            <i class="fa-solid fa-check" style="color:red"></i>
                            <a href="{{ route('about_us') }}#rental">Rental</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function syncBannerHeight() {
                const img = document.querySelector('.banner-wrapper .banner-img');
                const wrapper = document.querySelector('.banner-wrapper');
                if (!img || !wrapper) return;

                wrapper.style.height = img.getBoundingClientRect().height + 'px';
            }

            window.addEventListener('load', syncBannerHeight);
            window.addEventListener('resize', syncBannerHeight);

            document.addEventListener('DOMContentLoaded', () => {
                const img = document.querySelector('.banner-wrapper .banner-img');
                if (img) img.addEventListener('load', syncBannerHeight);
            });
        </script>

        <!-- Product Category -->
        <div class="container py-5">
            <div class="pss-section-heading">
                <div class="pss-section-kicker">Product Category</div>
                <h3 class="pss-section-title">We Provide Type of Product</h3>
            </div>

            <div class="product-list">
                @foreach ($productCategory as $value)
                    <a class="product-item" data-id="{{ $value->id }}" data-name="{{ $value->name }}"
                        href="{{ route('product', ['category[]' => $value->id]) }}"
                        style="cursor: pointer; justify-items: center; place-items: center;">
                        <div class="image-wrapper">
                            <img src="{{ asset('uploads/' . $value->picture_url) }}" alt="{{ $value->name }}">
                        </div>
                        <h6>{{ $value->name }}</h6>
                        <p class="truncate-multiline">
                            {{ collect($productSubCat[$value->id] ?? [])->pluck('name')->implode(', ') }}
                        </p>
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
        @if(isset($product) && $product->isNotEmpty())
            <div class="container my-5">
                <div class="pss-section-heading">
                    <div class="pss-section-kicker">Top Selling Product</div>
                    <h3 class="pss-section-title">Our High Demand Products</h3>
                </div>

                <div class="fixed-grid justify-content-centers">
                    @foreach ($product as $value)
                        <a class="product-card text-decoration-none fixed-grid-item"
                            href="{{ route('product.detail', ['slug' => $value->slug_product]) }}">
                            <div class="card border-0 text-center">
                                <img src="{{ asset('uploads/' . $value->main_picture_url_product) }}"
                                    class="card-img-top img-fluid" alt="{{ $value->name_product }}"
                                    style="width: 85%; aspect-ratio: 1 / 1;">
                                <div class="card-body">
                                    <h6 class="fw-bold mb-0">{{ $value->name_product }}</h6>
                                    <p class="text-muted mb-0">{{ $value->name_category }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        <!-- Top Selling Product End -->

        <!-- Find More About Our Brands -->
        <div class="container-fluid my-5" style="justify-items: center;">
            <div class="pss-section-heading">
                <div class="pss-section-kicker">Our Brands</div>
                <h3 class="pss-section-title">Find More About Our Brands</h3>
            </div>

            <div class="product-list">
                @foreach ($categoryOnBrand as $value)
                    <a class="card border-0 text-center own-brand-card" href="{{ route('page', $value->url) }}"
                        style="justify-self: center; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('uploads/' . $value->logo_picture) }}"
                            class="card-img-top img-fluid resized-img own-brand-img" alt="{{ $value->name }}">
                    </a>
                @endforeach
            </div>
        </div>
        <!-- Find More About Our Brands End -->

        <!-- We Provide Brands -->
        <div class="container-fluid my-5">
            <div class="pss-section-heading">
                <div class="pss-section-kicker">Brand</div>
                <h3 class="pss-section-title">We Provide Brands</h3>
            </div>

            <div class="carousel-wrapper" id="carouselWrapper">
                <div class="carousel-track" id="carouselTrack">
                    @foreach ($brand as $item)
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/' . $item->logo_picture) }}" alt="{{ $item->name }}">
                        </div>
                    @endforeach

                    @foreach ($brand as $item)
                        <div class="carousel-item">
                            <img src="{{ asset('uploads/' . $item->logo_picture) }}" alt="{{ $item->name }}">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('brand') }}" class="explore">Explore Brands</a>
            </div>
        </div>
        <!-- We Provide Brands End -->

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.getElementById('carouselTrack');
                const wrapper = document.getElementById('carouselWrapper');

                if (!track || !wrapper) return;

                let position = 0;
                const speed = 0.6;
                let isDragging = false;
                let startX = 0;
                let currentX = 0;
                let velocity = 0;
                let animationFrame;

                const itemWidth = 180;
                const totalItems = track.children.length;
                const loopPoint = itemWidth * totalItems / 2;

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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const applyEdgeBasedBgColor = (imgSelector, parentSelector) => {
                    const images = document.querySelectorAll(imgSelector);

                    images.forEach((img) => {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        img.addEventListener('load', () => {
                            canvas.width = img.naturalWidth;
                            canvas.height = img.naturalHeight;
                            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                            let chosenPixel = null;

                            for (let y = 0; y < canvas.height; y += 5) {
                                const [r, g, b, a] = ctx.getImageData(1, y, 1, 1).data;

                                if (a > 0) {
                                    chosenPixel = { r, g, b, a };
                                    break;
                                }
                            }

                            const target = img.closest(parentSelector);
                            if (!chosenPixel || !target) {
                                target.style.backgroundColor = '#ffffff';
                                return;
                            }

                            const { r, g, b, a } = chosenPixel;

                            if (a < 255) {
                                const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                                target.style.backgroundColor = brightness > 128 ? 'black' : 'white';
                            } else {
                                target.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
                            }
                        });

                        if (img.complete) {
                            img.dispatchEvent(new Event('load'));
                        }
                    });
                };

                applyEdgeBasedBgColor('.carousel-item img', '.carousel-item');
                applyEdgeBasedBgColor('.own-brand-img', '.own-brand-card');
            });
        </script>
    </div>
@endsection