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

        @media (max-width: 567px) {
            .card-body h6 {
                font-size: 12px;
            }

            .card-body p {
                font-size: 12px;
            }
        }

        .truncate-multiline {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* limit to 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <!-- Product Category -->
    <div class="container py-5">
        <div class="product-category">
            <div class="slogan-pss">
                <h3><i class="fa-solid fa-check text-red-500" style="color: red"></i> <a href="{{ route('about_us') }}#sale"
                        style="color: black">Sale</a></h3>
                <h3><i class="fa-solid fa-check text-red-500" style="color: red"></i> <a href="{{ route('about_us') }}#repair"
                        style="color: black">Repair</a></h3>
                <h3><i class="fa-solid fa-check text-red-500" style="color: red"></i> <a
                        href="{{ route('about_us') }}#rental" style="color: black">Rental</a></h3>
            </div><br><br>
            <h6 class="text-uppercase" style="color: black">Product Category</h6>
            <h3 class="title text-uppercase">We Provide Type of Product</h3>
        </div>
        <div class="product-list">
            @foreach ($productCategory as $value)
                <a class="product-item" data-id="{{ $value->id }}" data-name="{{ $value->name }}"
                    href="{{ route('product', ['category[]' => $value->id]) }}"
                    style="cursor: pointer;justify-items: center;place-items: center;">
                    <div class="image-wrapper">
                        <img src="{{ asset('uploads/' . $value->picture_url) }}" alt="{{ $value->name }}">
                    </div>
                    <h6 style="margin: 2px 2px 4px 2px;line-height: 1.3;">{{ $value->name }}</h6>
                    <p class="truncate-multiline" style="margin: 0;font-weight: 500;line-height: 1.3;">
                        <!-- @foreach ($productSubCat[$value->id] ?? [] as $subValue)
    {{ $subValue->name }}
    @endforeach -->
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
    <style>
        /* Flex wrapper to center the grid */
        .grid-wrapper {
            display: flex;
            justify-content: center;
            padding: 1rem;
        }

        /* The actual grid */
        .fixed-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 1rem;
            gap: 0;
        }


        .fixed-grid-item {
            position: relative;
            padding: 1rem;
            background-color: #fff;
            text-align: center;
            box-sizing: border-box;
            width: 50%;
            /* mobile: 2 columns */
        }

        @media (min-width: 768px) {
            .fixed-grid-item {
                width: 33.3333%;
                /* tablet: 3 columns */
            }
        }

        @media (min-width: 992px) {
            .fixed-grid-item {
                width: 20%;
                /* desktop: 5 columns */
            }
        }


        /* Vertical separator line */
        .fixed-grid-item::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 1px;
            height: 95%;
            background-color: #ccc;
        }

        /* Remove separator at end of each row */
        @media (min-width: 992px) {
            .fixed-grid-item:nth-child(5n)::after {
                content: none;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .fixed-grid-item:nth-child(3n)::after {
                content: none;
            }
        }

        @media (max-width: 767.98px) {
            .fixed-grid-item:nth-child(2n)::after {
                content: none;
            }
        }

        /* Hide separator on very last item */
        .fixed-grid-item:last-of-type::after {
            content: none !important;
        }

        /* Center content inside card */
        .card.border-0.text-center {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    </style>


    <div class="container my-5">
        <div class="top-selling-product text-center d-flex flex-column align-items-center">
            <h6 class="text-uppercase">Top Selling Product</h6>
            <h3 class="title text-uppercase">Our High Demand Products</h3>
        </div>
        <!--<br>-->

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

        .own-brand-card {
            aspect-ratio: 285 / 118;
            width: 100%;
            max-width: 254px;
        }

        .own-brand-img {
            /* object-fit: cover; */
            object-fit: contain;
            width: 100%;
            height: auto;
            aspect-ratio: 285 / 118;
        }
        @media (max-width: 1024px) {
            .own-brand-card {
                width: 21%;
            }
        }

        @media (max-width: 768px) {
            .own-brand-card {
                width: 21%;
            }
        }

        @media (max-width: 576px) {
            .own-brand-card {
                width: 45%;
            }
        }

        @media (max-width: 375px) {
            .own-brand-card {
                width: 45%;
            }
        }
    </style>
    <div class="container-fluid my-5" style="justify-items: center;">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
            <h3 class="title text-uppercase">Find More About Our Brands</h3>
        </div>

        <div class="product-list">
            @foreach ($categoryOnBrand as $value)
                <a class="card border-0 text-center own-brand-card" href="{{ route('page', $value->url) }}"
                        style="justify-self: center;box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('uploads/' . $value->logo_picture) }}"
                            class="card-img-top img-fluid resized-img own-brand-img" alt="{{ $value->name }}">
                    </a>


            @endforeach
        </div>
    </div>
    <!-- Find More About Our Brands End -->

    <!-- We Provide Brands -->
    <!-- Carousel Wrapper -->
    <div class="container-fluid my-5">
        <div class="we-provide-brands text-center">
            <h6 class="text-uppercase">Brand</h6>
            <h3 class="title text-uppercase">We Provide Brands</h3>
        </div>

        <div class="carousel-wrapper" id="carouselWrapper">
            <div class="carousel-track" id="carouselTrack">
                @foreach ($brand as $item)
                    <div class="carousel-item" style="border-radius: 8px;">
                        <img src="{{ asset('uploads/' . $item->logo_picture) }}" alt="{{ $item->name }}">
                    </div>
                @endforeach
                @foreach ($brand as $item)
                    {{-- duplicated for loop --}}
                    <div class="carousel-item" style="border-radius: 8px;">
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
            min-width: 200%;
            /* ✅ force to overflow beyond wrapper */
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
            object-fit: contain;
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

                        // Scan vertically on the left side every 5px
                        for (let y = 0; y < canvas.height; y += 5) {
                            const [r, g, b, a] = ctx.getImageData(1, y, 1, 1).data;

                            if (a > 0) {
                                chosenPixel = {
                                    r,
                                    g,
                                    b,
                                    a
                                };
                                break;
                            }
                        }

                        const target = img.closest(parentSelector);
                        if (!chosenPixel || !target) {
                            // target.style.backgroundColor = '#f0f0f0'; // fallback
                            target.style.backgroundColor = '#ffffff'; // fallback
                            return;
                        }

                        const {
                            r,
                            g,
                            b,
                            a
                        } = chosenPixel;

                        if (a < 255) {
                            const brightness = (r * 299 + g * 587 + b * 114) / 1000;
                            target.style.backgroundColor = brightness > 128 ? 'black' : 'white';
                        } else {
                            target.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
                        }
                    });
                });
            };

            // Apply to both sections
            applyEdgeBasedBgColor('.carousel-item img', '.carousel-item');
            applyEdgeBasedBgColor('.own-brand-img', '.own-brand-card');
        });
    </script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carousel = new bootstrap.Carousel(document.getElementById('brandCarousel'), {
            interval: 2000,
            ride: 'carousel'
        });
    });
</script>
