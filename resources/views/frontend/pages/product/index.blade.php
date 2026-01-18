@extends('frontend.layouts.app')

@section('content')

    <style>
        .filter-brand.active {
            outline: 3px solid #0066FF68;
        }

        .filter-cat.active {
            /* outline: 3px solid #0066FF68; */
            background-color: #3030D7;
            color: #ffffff;
        }

        .title-product {
            display: inline-block;
            border-left: 3px solid red;
            padding-left: 5px;
        }


        /* Generic scrollbox */
        .scrollbox {
            position: relative;
        }

        /* The actual scroll area */
        .scrollbox-inner {
            max-height: 520px;        /* adjust for categories */
            overflow-y: auto;
            /* padding-right: 6px; */    /*   space for scrollbar */
            scroll-behavior: smooth;
        }

        /* Brand column may need a different height */
        .brand-scroll .scrollbox-inner {
            max-height: 700px;        /* adjust for brand list */
        }

        /* Chevron buttons */
        .scrollbox-btn {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: rgba(0,0,0,0.55);
            color: #fff;
            display: none;            /* JS will toggle */
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .scrollbox-btn.up { top: 6px; }
        .scrollbox-btn.down { bottom: 6px; }

        /* Fade overlays (disabled by default) */
        .scrollbox::before,
        .scrollbox::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            height: 34px;
            z-index: 4;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        /* Top fade */
        .scrollbox::before {
            top: 0;
            background: linear-gradient(
                to bottom,
                rgba(255,255,255,1),
                rgba(255,255,255,0)
            );
        }

        /* Bottom fade */
        .scrollbox::after {
            bottom: 0;
            background: linear-gradient(
                to top,
                rgba(255,255,255,1),
                rgba(255,255,255,0)
            );
        }

        /* Enabled states */
        .scrollbox.has-top-shadow::before {
            opacity: 1;
        }

        .scrollbox.has-bottom-shadow::after {
            opacity: 1;
        }

        /* desktop behavior */
        .brand-scroll .scrollbox-inner {
            max-height: 700px;      /* whatever you want on desktop */
            overflow-y: auto;
        }

        /* ✅ on smaller screens, restore the original "grid blocks" */
        @media (max-width: 991px) {
            .brand-scroll .scrollbox-inner {
                max-height: none;
                overflow: visible;
                padding-right: 0;
            }

            .brand-scroll .scrollbox-btn {
                display: none !important;
            }

            .brand-scroll::before,
            .brand-scroll::after {
                opacity: 0 !important;  /* hide fade shadows */
            }
        }

    </style>

    <!-- Our Brands -->
    <div class="container-fluid my-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: start; text-align: start;">
            <!-- <h3 class="title-product text-uppercase"> Product Page</h3> -->
            <h3 class="title-product text-uppercase"> Product</h3>
        </div>
    </div>
    <!-- Our Brands End -->

    {{-- Welding Machine Section  --}}
    <div class="container-fluid my-5">
        <div class="row flex-row-reverse">
            <div class="col-xl-10 col-lg-9">
                <div class="find-more-about-our-brands"
                    style="display: flex; flex-direction: column; justify-content: center; align-items: start; text-align: start; border-bottom: 1px solid #e1e0e0; margin-bottom: 1rem;">
                    <div class="title-product mb-3">
                        <h4 class="mb-0 text-uppercase">
                            @if ($selected_cat->isNotEmpty())
                                @foreach ($selected_cat as $sc)
                                    {{ $loop->last ? $sc->name : $sc->name . ', ' }}
                                @endforeach
                            @else
                                All Products
                            @endif
                        </h4>
                        <h6 class="mb-0 text-uppercase">Brand Includes</h6>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="row">
                            <div class="col-xl-1 col-lg-2 col-sm-12">
                                <div class="brand-box" data-brandbox>

                                    <!-- Desktop chevrons (vertical) -->
                                    <button type="button" class="brand-btn up" data-up>
                                        <i class="fa-solid fa-chevron-up"></i>
                                    </button>

                                    <!-- Mobile chevrons (horizontal) -->
                                    <button type="button" class="brand-btn left" data-left>
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </button>

                                    <div class="brand-inner" data-inner>
                                        @foreach ($brands as $brand)
                                            <a class="filter-btn brand-item"
                                            href="javascript:void(0);"
                                            data-type="brand"
                                            data-id="{{ $brand->id }}">
                                                <div class="wrapper-item filter-brand {{ in_array($brand->id, request()->input('brand', [])) ? 'active' : '' }}"
                                                    style="box-shadow: 0px 0px 4px rgba(0,0,0,0.1);">
                                                    <img src="{{ asset('uploads/' . $brand->logo_picture) }}"
                                                        alt="{{ $brand->name }}"
                                                        class="brand-logo">
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>

                                    <!-- Desktop chevrons (vertical) -->
                                    <button type="button" class="brand-btn down" data-down>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>

                                    <!-- Mobile chevrons (horizontal) -->
                                    <button type="button" class="brand-btn right" data-right>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>

                                </div>
                            </div>

                        <style>
                            /* ===== Brand box base ===== */
                            .brand-box {
                                position: relative;
                            }

                            /* The scrolling container */
                            .brand-inner {
                                scroll-behavior: smooth;
                            }

                            /* Buttons (shared) */
                            .brand-btn {
                                position: absolute;
                                z-index: 10;
                                border: none;
                                width: 34px;
                                height: 34px;
                                border-radius: 999px;
                                background: rgba(0,0,0,0.55);
                                color: #fff;
                                display: none;              /* JS toggles */
                                align-items: center;
                                justify-content: center;
                                cursor: pointer;
                            }

                            /* Desktop: vertical scroll layout */
                            @media (min-width: 992px) {
                                .brand-inner {
                                    max-height: 700px;
                                    overflow-y: auto;
                                    overflow-x: hidden;
                                    display: flex;
                                    flex-direction: column;
                                    gap: 8px;
                                }

                                .brand-item { display: block; }

                                .brand-btn.up   { top: 6px; left: 50%; transform: translateX(-50%); }
                                .brand-btn.down { bottom: 6px; left: 50%; transform: translateX(-50%); }

                                /* hide horizontal buttons */
                                .brand-btn.left, .brand-btn.right { display: none !important; }

                                /* Desktop fade shadows */
                                .brand-box::before,
                                .brand-box::after {
                                    content: "";
                                    position: absolute;
                                    left: 0; right: 0;
                                    height: 34px;
                                    z-index: 9;
                                    pointer-events: none;
                                    opacity: 0;
                                    transition: opacity .2s ease;
                                }

                                .brand-box::before {
                                    top: 0;
                                    background: linear-gradient(to bottom, rgba(255,255,255,1), rgba(255,255,255,0));
                                }

                                .brand-box::after {
                                    bottom: 0;
                                    background: linear-gradient(to top, rgba(255,255,255,1), rgba(255,255,255,0));
                                }

                                .brand-box.has-top-shadow::before { opacity: 1; }
                                .brand-box.has-bottom-shadow::after { opacity: 1; }
                            }

                            /* Mobile/Tablet: 2-row horizontal scroller */
                            @media (max-width: 991px) {
                                .brand-inner {
                                    overflow-x: auto;
                                    overflow-y: hidden;

                                    display: grid;
                                    grid-auto-flow: column;     /* key: flow columns, not rows */
                                    grid-template-rows: repeat(2, auto); /* 2 lines only */
                                    gap: 10px;

                                    padding: 10px 40px;         /* space for left/right buttons */
                                    -webkit-overflow-scrolling: touch;
                                }

                                /* each item has a fixed width so it forms a nice horizontal list */
                                .brand-item {
                                    width: 160px;               /* adjust */
                                    display: block;
                                }

                                /* left/right buttons */
                                .brand-btn.left  { left: 6px; top: 50%; transform: translateY(-50%); }
                                .brand-btn.right { right: 6px; top: 50%; transform: translateY(-50%); }

                                /* hide vertical buttons + shadows */
                                .brand-btn.up, .brand-btn.down { display: none !important; }
                                .brand-box::before, .brand-box::after { display: none !important; }
                            }

                        </style>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                            const box = document.querySelector('[data-brandbox]');
                            if (!box) return;

                            const inner = box.querySelector('[data-inner]');
                            const btnUp = box.querySelector('[data-up]');
                            const btnDown = box.querySelector('[data-down]');
                            const btnLeft = box.querySelector('[data-left]');
                            const btnRight = box.querySelector('[data-right]');

                            function isMobile() {
                                return window.matchMedia('(max-width: 991px)').matches;
                            }

                            function stepY() { return Math.max(120, inner.clientHeight * 0.6); }
                            function stepX() { return Math.max(160, inner.clientWidth * 0.7); }

                            function update() {
                                // reset
                                box.classList.remove('has-top-shadow', 'has-bottom-shadow');

                                if (!isMobile()) {
                                // DESKTOP (vertical)
                                const max = inner.scrollHeight - inner.clientHeight;

                                if (max <= 2) {
                                    btnUp.style.display = 'none';
                                    btnDown.style.display = 'none';
                                    return;
                                }

                                const atTop = inner.scrollTop <= 2;
                                const atBottom = inner.scrollTop >= max - 2;

                                btnUp.style.display = atTop ? 'none' : 'flex';
                                btnDown.style.display = atBottom ? 'none' : 'flex';

                                if (!atTop) box.classList.add('has-top-shadow');
                                if (!atBottom) box.classList.add('has-bottom-shadow');

                                // ensure horizontal buttons hidden
                                btnLeft.style.display = 'none';
                                btnRight.style.display = 'none';

                                } else {
                                // MOBILE (horizontal)
                                const max = inner.scrollWidth - inner.clientWidth;

                                if (max <= 2) {
                                    btnLeft.style.display = 'none';
                                    btnRight.style.display = 'none';
                                    return;
                                }

                                const atLeft = inner.scrollLeft <= 2;
                                const atRight = inner.scrollLeft >= max - 2;

                                btnLeft.style.display = atLeft ? 'none' : 'flex';
                                btnRight.style.display = atRight ? 'none' : 'flex';

                                // ensure vertical buttons hidden
                                btnUp.style.display = 'none';
                                btnDown.style.display = 'none';
                                }
                            }

                            btnUp?.addEventListener('click', () => inner.scrollBy({ top: -stepY(), behavior: 'smooth' }));
                            btnDown?.addEventListener('click', () => inner.scrollBy({ top: stepY(), behavior: 'smooth' }));
                            btnLeft?.addEventListener('click', () => inner.scrollBy({ left: -stepX(), behavior: 'smooth' }));
                            btnRight?.addEventListener('click', () => inner.scrollBy({ left: stepX(), behavior: 'smooth' }));

                            inner.addEventListener('scroll', update);
                            window.addEventListener('resize', update);
                            window.addEventListener('load', update);

                            update();
                            });
                        </script>

                        <div class="col-xl-11 col-lg-10 col-sm-12">
                            <div class="tab-pane fade active show" id="tab-list" role="tabpanel"
                                aria-labelledby="tab-shop-list">
                                <div class="row gy-25">
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-sm-4">
                                            <div class="as-product"
                                                onclick="window.location='{{ route('product.detail', ['slug' => $product->slug]) }}'"
                                                style="cursor: pointer;">

                                                <img src="{{ asset('uploads/' . $product->brand->logo_picture) }}"
                                                    alt="{{ $product->brand->name ?? 'Brand Logo' }}"
                                                    class="product-brand-logo">

                                                <div class="product-img">
                                                    <img src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                        alt="product image" />
                                                </div>
                                                <div class="product-content">
                                                    <p class="meta"></p>
                                                    <h4 class="product-title h5">
                                                        <a
                                                            href="{{ route('product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                                    </h4>
                                                    <span class="price">
                                                        @if (empty($product->price) || $product->price == 0)
                                                            Call
                                                        @else
                                                            Rp. {{ number_format($product->price, 0, ',', '.') }}
                                                        @endif
                                                    </span>
                                                    <a class="as-btn style3"
                                                        href="{{ route('product.detail', ['slug' => $product->slug]) }}">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{ $products->links() }}

            </div>


            <div class="col-xl-2 col-lg-3">
                <aside class="sidebar-area">
                    <div class="widget widget_search">
                        <form class="search-form" id="filterSearchForm">
                            <input type="text" id="filterInput" name="filter" placeholder="Enter Keyword"
                                value="{{ request('filter') }}" />
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>

                    </div>

                    <!-- category start here-->
                    <div class="widget widget_categories">
                        <h5 class="widget_title text-uppercase">
                            Categories
                            <button id="resetFilterBtn" style="font-size: 12px;" class="btn btn-sm btn-link text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Filter">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </h5>

                        <div class="scrollbox" data-scrollbox>
                            <button type="button" class="scrollbox-btn up" data-scroll-up>
                                <i class="fa-solid fa-chevron-up"></i>
                            </button>
<!-- 
                            <div class="scrollbox-inner" data-scroll-inner>
                                <ul class="mb-0">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="filter-btn filter-cat {{ in_array($category->id, request()->input('category', [])) ? 'active' : '' }}"
                                                href="javascript:void(0);" data-type="category"
                                                data-id="{{ $category->id }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div> -->

                            <div class="scrollbox-inner" data-scroll-inner>
                                <ul class="mb-0">
                                    @foreach ($categories as $parent)
                                        <li class="mb-2">
                                            <a class="filter-btn filter-cat {{ in_array($parent->id, request()->input('category', [])) ? 'active' : '' }}"
                                            href="javascript:void(0);" data-type="category" data-id="{{ $parent->id }}">
                                                <strong>{{ $parent->name }}</strong>
                                            </a>

                                            @if ($parent->children->isNotEmpty())
                                                <ul class="mt-1 ps-3">
                                                    @foreach ($parent->children as $child)
                                                        <li>
                                                            <a class="filter-btn filter-cat {{ in_array($child->id, request()->input('category', [])) ? 'active' : '' }}"
                                                            href="javascript:void(0);" data-type="category" data-id="{{ $child->id }}">
                                                                {{ $child->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>


                            <button type="button" class="scrollbox-btn down" data-scroll-down>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>


                    <!-- <div class="widget widget_categories">
                        <h5 class="widget_title text-uppercase">Categories
                            <button id="resetFilterBtn" style="font-size: 12px;" class="btn btn-sm btn-link text-primary"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Filter">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </h5>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a class="filter-btn filter-cat {{ in_array($category->id, request()->input('category', [])) ? 'active' : '' }}"
                                        href="javascript:void(0);" data-type="category"
                                        data-id="{{ $category->id }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div> -->
                    {{-- @if(!empty($productsTop) && count($productsTop) > 0) --}}
                    @if(isset($productsTop) && $productsTop->isNotEmpty())
                        <div class="widget widget_top_rated_products">
                            <h4 class="widget_title">Popular Product</h4>
                            <ul class="product_list_widget">
                                @foreach ($productsTop as $product)
                                    <li class="recent-post">
                                        <div class="media-img">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('uploads/' . $product->main_picture_url) }}" alt="thumb"
                                                    width="70" height="70" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="recent-post-title h5">
                                                <a href="shop-details.html">{{ $product->name }}</a>
                                            </h4>
                                            <span class="price">
                                                @if (empty($product->price) || $product->price == 0)
                                                    Call
                                                @else
                                                    Rp. {{ number_format($product->price, 0, ',', '.') }}
                                                @endif
                                            </span>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </div>

    <script>
        // document.addEventListener("DOMContentLoaded", () => {
        //     const images = document.querySelectorAll('.brand-logo');

        //     images.forEach(img => {
        //         const wrapper = img.closest('.wrapper-item');
        //         const canvas = document.createElement('canvas');
        //         const ctx = canvas.getContext('2d');

        //         img.crossOrigin = "anonymous"; // just in case
        //         img.onload = function () {
        //             const width = img.naturalWidth;
        //             const height = img.naturalHeight;
        //             canvas.width = width;
        //             canvas.height = height;
        //             ctx.drawImage(img, 0, 0, width, height);

        //             const step = 5;
        //             const edgePixels = [];

        //             for (let x = 0; x < width; x += step) {
        //                 edgePixels.push(...ctx.getImageData(x, 0, 1, 1).data); // top
        //                 edgePixels.push(...ctx.getImageData(x, height - 1, 1, 1).data); // bottom
        //             }
        //             for (let y = 0; y < height; y += step) {
        //                 edgePixels.push(...ctx.getImageData(0, y, 1, 1).data); // left
        //                 edgePixels.push(...ctx.getImageData(width - 1, y, 1, 1).data); // right
        //             }

        //             let r = 0, g = 0, b = 0, count = 0;
        //             for (let i = 0; i < edgePixels.length; i += 4) {
        //                 r += edgePixels[i];
        //                 g += edgePixels[i + 1];
        //                 b += edgePixels[i + 2];
        //                 count++;
        //             }

        //             r = Math.round(r / count);
        //             g = Math.round(g / count);
        //             b = Math.round(b / count);

        //             const avgColor = `rgb(${r}, ${g}, ${b})`;
        //             wrapper.style.backgroundColor = avgColor;
        //         };
        //     });
        // });
        document.addEventListener('DOMContentLoaded', function() {
            const applyEdgeBasedBgColor = (imgSelector, wrapperSelector) => {
                const images = document.querySelectorAll(imgSelector);

                images.forEach((img) => {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    const applyColor = () => {
                        canvas.width = img.naturalWidth;
                        canvas.height = img.naturalHeight;

                        if (canvas.width === 0 || canvas.height === 0) return;

                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                        let chosenPixel = null;

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

                        const wrapper = img.closest(wrapperSelector);

                        if (!chosenPixel || !wrapper) {
                            wrapper.style.backgroundColor = '#ffffff';
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
                            wrapper.style.backgroundColor = brightness > 128 ? 'black' : 'white';
                        } else {
                            wrapper.style.backgroundColor = `rgb(${r}, ${g}, ${b})`;
                        }
                    };

                    if (img.complete && img.naturalWidth > 0) {
                        applyColor();
                    } else {
                        img.addEventListener('load', applyColor);
                    }
                });
            };

            applyEdgeBasedBgColor('.brand-logo', '.wrapper-item');
        });


        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', () => {
                const type = button.getAttribute('data-type'); // 'brand' or 'category'
                const id = button.getAttribute('data-id');

                const url = new URL(window.location.href);
                const params = url.searchParams;

                // Get all current values for this type
                let currentValues = params.getAll(`${type}[]`);

                if (currentValues.includes(id)) {
                    // Remove if already selected
                    currentValues = currentValues.filter(val => val !== id);
                } else {
                    // Add if not selected
                    currentValues.push(id);
                }

                // Clear and re-append updated values
                params.delete(`${type}[]`);
                currentValues.forEach(val => params.append(`${type}[]`, val));

                // Set the updated URL and reload
                window.location.href = `${url.pathname}?${params.toString()}`;
            });
        });

        // Handle filter by text input (search)
        document.getElementById('filterSearchForm').addEventListener('submit', function(e) {
            e.preventDefault(); // prevent form reload

            const url = new URL(window.location.href);
            const params = url.searchParams;

            const keyword = document.getElementById('filterInput').value;

            if (keyword) {
                params.set('filter', keyword);
            } else {
                params.delete('filter');
            }

            // Redirect with new params
            window.location.href = `${url.pathname}?${params.toString()}`;
        });

        document.getElementById('resetFilterBtn').addEventListener('click', function() {
            const url = new URL(window.location.href);
            const path = url.pathname; // Keep /product
            window.location.href = path; // Redirect to /product without filters
        });
        
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            function setupScrollbox(scrollbox) {
                if (window.matchMedia('(max-width: 991px)').matches) return;

                const inner = scrollbox.querySelector('[data-scroll-inner]');
                const btnUp = scrollbox.querySelector('[data-scroll-up]');
                const btnDown = scrollbox.querySelector('[data-scroll-down]');

                if (!inner || !btnUp || !btnDown) return;

                const step = () => Math.max(120, inner.clientHeight * 0.6);

                function updateButtons() {
            const maxScroll = inner.scrollHeight - inner.clientHeight;

            // Reset shadow states
            scrollbox.classList.remove('has-top-shadow', 'has-bottom-shadow');

            // If no overflow at all
            if (maxScroll <= 2) {
                btnUp.style.display = 'none';
                btnDown.style.display = 'none';
                return;
            }

            const atTop = inner.scrollTop <= 2;
            const atBottom = inner.scrollTop >= maxScroll - 2;

            // Chevron visibility
            btnUp.style.display = atTop ? 'none' : 'flex';
            btnDown.style.display = atBottom ? 'none' : 'flex';

            // Shadow visibility
            if (!atTop) {
                scrollbox.classList.add('has-top-shadow');
            }
            if (!atBottom) {
                scrollbox.classList.add('has-bottom-shadow');
            }
        }


        btnUp.addEventListener('click', () => {
            inner.scrollBy({ top: -step(), behavior: 'smooth' });
        });

        btnDown.addEventListener('click', () => {
            inner.scrollBy({ top: step(), behavior: 'smooth' });
        });

        inner.addEventListener('scroll', updateButtons);

        // Run once, and also after images load (brand logos can change height)
        updateButtons();
        window.addEventListener('load', updateButtons);
        window.addEventListener('resize', updateButtons);

        window.addEventListener('resize', () => {
  document.querySelectorAll('[data-scrollbox]').forEach(sb => {
    // simplest: refresh page logic-free
    // OR you can implement destroy/reinit, but this is enough for now:
  });
});
    }

    document.querySelectorAll('[data-scrollbox]').forEach(setupScrollbox);

    
});

</script>

    {{-- STEEL BEVEL & PRESSURE PAINT End --}}
@endsection
