@extends('frontend.layouts.app')

@section('content')

    <style>
        :root {
            --pss-accent: #ff4d1a;
            --pss-accent-dark: #e64516;
            --pss-text: #111111;
            --pss-muted: #666666;
            --pss-border: #e7e7e7;
            --pss-surface: #ffffff;
            --pss-soft: #f7f7f7;
            --pss-shadow: 0 10px 28px rgba(17, 17, 17, 0.05);
        }

        .product-page-shell {
            max-width: 1560px;
            margin: 0 auto;
            padding-left: 18px;
            padding-right: 18px;
            font-family: Arial, sans-serif;
            color: var(--pss-text);
        }

        .product-page-header {
            padding-top: 40px;
            padding-bottom: 18px;
        }

        .product-page-wrap {
            padding-bottom: 40px;
        }

        .product-page-wrap .row {
            --bs-gutter-x: 1.35rem;
        }

        .title-product {
            display: inline-block;
            border-left: 4px solid var(--pss-accent);
            padding-left: 12px;
        }

        .title-product h3,
        .title-product h4,
        .title-product h6 {
            margin: 0;
            color: var(--pss-text);
            text-transform: uppercase;
        }

        .title-product h3 {
            font-size: clamp(28px, 2vw, 40px);
            font-weight: 800;
            line-height: 1.12;
        }

        .title-product h4 {
            font-size: clamp(26px, 1.8vw, 36px);
            font-weight: 800;
            line-height: 1.12;
        }

        .title-product h6 {
            margin-top: 6px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .product-page-summary {
            border-bottom: 1px solid #dddddd;
            padding-bottom: 18px;
            margin-bottom: 20px;
        }

        /* Sidebar */
        .sidebar-area .widget {
            background: var(--pss-surface);
            /* border: 1px solid var(--pss-border); */
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            border-radius: 14px;
            box-shadow: var(--pss-shadow);
            padding: 20px;
            margin-bottom: 18px;
        }

        .sidebar-area .widget_title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* gap: 12px; */
            line-height: 0.8em !important;
            font-size: 18px;
            font-weight: 800;
            color: var(--pss-text);
            margin-bottom: 18px;
            text-transform: uppercase;
        }

        #resetFilterBtn {
            padding: 0;
            border: 0;
            background: transparent;
            color: var(--pss-accent) !important;
            font-size: 12px !important;
            font-weight: 700;
            text-decoration: none;
            box-shadow: none !important;
            white-space: nowrap;
        }

        #resetFilterBtn:hover {
            color: var(--pss-accent-dark) !important;
        }

        .search-form {
            display: flex;
            align-items: stretch;
            border: 1px solid var(--pss-border);
            border-radius: 8px;
            overflow: hidden;
            background: var(--pss-surface);
        }

        .search-form input {
            flex: 1;
            border: 0;
            padding: 13px 14px;
            font-size: 14px;
            color: var(--pss-text);
            background: transparent;
        }

        .search-form input:focus {
            outline: none;
            box-shadow: none;
        }

        .search-form button {
            width: 46px;
            border: 0;
            background: #3b3b3b;
            color: #ffffff;
            transition: background 0.2s ease;
        }

        .search-form button:hover {
            background: var(--pss-accent);
        }

        /* Category */
        .filter-cat {
            display: block;
            padding: 12px 14px;
            border-radius: 8px;
            background: var(--pss-soft);
            color: #4d4d4d;
            text-decoration: none;
            font-weight: 700;
            line-height: 1.35;
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        .filter-cat:hover {
            background: #fff3ee;
            color: var(--pss-accent);
            transform: translateY(-1px);
            text-decoration: none;
        }

        .filter-cat.active {
            background: var(--pss-accent);
            color: #ffffff !important;
            box-shadow: 0 8px 18px rgba(255, 77, 26, 0.18);
        }

        /* Scrollbox for categories */
        .scrollbox {
            position: relative;
        }

        .scrollbox-inner {
            max-height: 520px;
            overflow-y: auto;
            scroll-behavior: smooth;
        }

        .scrollbox-btn {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: rgba(17,17,17,0.68);
            color: #fff;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .scrollbox-btn.up { top: 6px; }
        .scrollbox-btn.down { bottom: 6px; }

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

        .scrollbox::before {
            top: 0;
            background: linear-gradient(to bottom, rgba(255,255,255,1), rgba(255,255,255,0));
        }

        .scrollbox::after {
            bottom: 0;
            background: linear-gradient(to top, rgba(255,255,255,1), rgba(255,255,255,0));
        }

        .scrollbox.has-top-shadow::before {
            opacity: 1;
        }

        .scrollbox.has-bottom-shadow::after {
            opacity: 1;
        }

        /* Brand chooser */
        .brand-column-wrap {
            display: flex;
            justify-content: center;
        }

        .brand-box {
            position: relative;
            width: 100%;
            max-width: 82px;
            margin: 0 auto;
        }

        .brand-inner {
            scroll-behavior: smooth;
        }

        .brand-btn {
            position: absolute;
            z-index: 10;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 999px;
            background: rgba(17,17,17,0.68);
            color: #fff;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .brand-item {
            display: block;
            width: 100%;
            max-width: 82px;
            margin: 0 auto;
            text-decoration: none;
        }

        .filter-brand {
            position: relative;
            width: 100%;
            aspect-ratio: 285 / 118;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 7px 8px;
            background: #ffffff;
            border: 1px solid var(--pss-border);
            border-radius: 9px;
            box-shadow: 0 4px 12px rgba(17, 17, 17, 0.04);
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease, transform 0.2s ease;
            overflow: hidden;
        }

        .filter-brand:hover {
            transform: translateY(-1px);
            border-color: #ffd2c4;
        }

        .filter-brand.active {
            background: #fff7f4;
            border-color: rgba(255, 77, 26, 0.45);
            box-shadow:
                0 0 0 3px rgba(255, 77, 26, 0.10),
                0 8px 18px rgba(17, 17, 17, 0.05);
        }

        .filter-brand.active::after {
            content: "";
            position: absolute;
            inset: 0;
            border: 2px solid rgba(255, 77, 26, 0.18);
            border-radius: 9px;
            pointer-events: none;
        }

        .brand-logo {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            display: block;
        }

        @media (min-width: 992px) {
            .brand-inner {
                max-height: 700px;
                overflow-y: auto;
                overflow-x: hidden;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 8px;
                padding-right: 2px;
            }

            .brand-btn.up {
                top: 6px;
                left: 50%;
                transform: translateX(-50%);
            }

            .brand-btn.down {
                bottom: 6px;
                left: 50%;
                transform: translateX(-50%);
            }

            .brand-btn.left,
            .brand-btn.right {
                display: none !important;
            }

            .brand-box::before,
            .brand-box::after {
                content: "";
                position: absolute;
                left: 0;
                right: 0;
                height: 28px;
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

            .brand-box.has-top-shadow::before {
                opacity: 1;
            }

            .brand-box.has-bottom-shadow::after {
                opacity: 1;
            }
        }

        /* Product cards */
        .as-product {
            background: #ffffff;
            /* border: 1px solid var(--pss-border); */
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            border-radius: 14px;
            box-shadow: var(--pss-shadow);
            overflow: hidden;
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .as-product:hover {
            transform: translateY(-2px);
            border-color: #ffd2c4;
            box-shadow: 0 14px 30px rgba(17, 17, 17, 0.07);
        }

        .product-brand-logo {
            max-height: 26px;
            width: auto;
            object-fit: contain;
            display: block;
            margin: 16px 16px 0 auto;
        }

        .product-img {
            padding: 10px 18px 0;
        }

        .product-img img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: contain;
        }

        .product-content {
            padding: 10px 18px 22px;
            text-align: center;
        }

        .product-title {
            margin-bottom: 10px;
        }

        .product-title a {
            color: var(--pss-text);
            font-size: 17px;
            font-weight: 800;
            line-height: 1.35;
            text-decoration: none;
        }

        .product-title a:hover {
            color: var(--pss-accent);
        }

        .price {
            display: block;
            margin-bottom: 16px;
            color: #d61515;
            font-size: 15px;
            font-weight: 700;
        }

        .as-btn.style3 {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 150px;
            padding: 11px 18px;
            border-radius: 6px;
            border: 1px solid var(--pss-accent);
            background: var(--pss-accent);
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .as-btn.style3:hover {
            background: var(--pss-accent-dark);
            border-color: var(--pss-accent-dark);
            color: #ffffff;
        }

        /* Popular products */
        .widget_top_rated_products .recent-post-title a {
            color: var(--pss-text);
            text-decoration: none;
            font-weight: 700;
        }

        .widget_top_rated_products .recent-post-title a:hover {
            color: var(--pss-accent);
        }

        .widget_top_rated_products .price {
            margin-bottom: 0;
            font-size: 14px;
        }

        /* Mobile / Tablet */
        @media (max-width: 991px) {
            .product-page-shell {
                padding-left: 14px;
                padding-right: 14px;
            }

            .brand-box {
                max-width: none;
                width: 100%;
            }

            .brand-inner {
                overflow-x: auto;
                overflow-y: hidden;
                display: grid;
                grid-auto-flow: column;
                grid-template-rows: repeat(2, auto);
                gap: 10px;
                padding: 10px 16px;
                -webkit-overflow-scrolling: touch;
            }

            .brand-item {
                width: 118px;
                min-width: 118px;
                max-width: 118px;
            }

            .brand-btn.left {
                left: 6px;
                top: 50%;
                transform: translateY(-50%);
            }

            .brand-btn.right {
                right: 6px;
                top: 50%;
                transform: translateY(-50%);
            }

            .brand-btn.up,
            .brand-btn.down {
                display: none !important;
            }

            .brand-box::before,
            .brand-box::after {
                display: none !important;
            }

            .sidebar-area {
                margin-top: 24px;
            }
        }

        @media (max-width: 575px) {
            .product-page-shell {
                padding-left: 16px;
                padding-right: 16px;
            }

            .title-product h3 {
                font-size: 22px;
            }

            .title-product h4 {
                font-size: 19px;
            }

            .title-product h6 {
                font-size: 13px;
            }

            .sidebar-area .widget {
                padding: 16px;
                border-radius: 12px;
            }

            .sidebar-area .widget_title {
                font-size: 16px;
            }

            .brand-inner {
                padding: 10px 14px;
                gap: 8px;
            }

            .brand-item {
                width: 112px;
                min-width: 112px;
                max-width: 112px;
            }

            .filter-brand {
                padding: 8px 9px;
                border-radius: 8px;
            }

            .as-btn.style3 {
                min-width: 138px;
            }
        }
    </style>

    <div class="product-page-shell product-page-header">
        <div class="title-product">
            <h3>Product</h3>
        </div>
    </div>

    <div class="product-page-shell product-page-wrap">
        <div class="row flex-row-reverse">
            <div class="col-xl-10 col-lg-9 col-sm-12">
                <div class="product-page-summary">
                    <div class="title-product">
                        <h4>
                            @if ($selected_cat->isNotEmpty())
                                @foreach ($selected_cat as $sc)
                                    {{ $loop->last ? $sc->name : $sc->name . ', ' }}
                                @endforeach
                            @else
                                All Products
                            @endif
                        </h4>
                        <h6>Brand Includes</h6>
                    </div>
                </div>

                <div class="tab-content" id="nav-tabContent">
                    <div class="row align-items-start">
                        <div class="col-xl-1 col-lg-2 col-sm-12">
                            <div class="brand-column-wrap">
                                <div class="brand-box" data-brandbox>
                                    <button type="button" class="brand-btn up" data-up>
                                        <i class="fa-solid fa-chevron-up"></i>
                                    </button>

                                    <button type="button" class="brand-btn left" data-left>
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </button>

                                    <div class="brand-inner" data-inner>
                                        @foreach ($brands as $brand)
                                            <a class="filter-btn brand-item"
                                                href="javascript:void(0);"
                                                data-type="brand"
                                                data-id="{{ $brand->id }}">
                                                <div class="wrapper-item filter-brand {{ in_array($brand->id, request()->input('brand', [])) ? 'active' : '' }}">
                                                    <img src="{{ asset('uploads/' . $brand->logo_picture) }}"
                                                        alt="{{ $brand->name }}"
                                                        class="brand-logo">
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>

                                    <button type="button" class="brand-btn down" data-down>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </button>

                                    <button type="button" class="brand-btn right" data-right>
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-11 col-lg-10 col-sm-12">
                            <div class="tab-pane fade active show" id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">
                                <div class="row gy-4">
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-sm-6">
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

                    <div class="widget widget_categories">
                        <style>
                            .widget_title {
                                display: flex;
                                flex-direction: column; /* forces vertical layout */
                            }
                        </style>
                        <h5 class="widget_title">
                            <span>Categories</span>
                            <br>
                            <button id="resetFilterBtn"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Reset Filter">
                                <i class="fas fa-sync-alt"></i> Reset Filter
                            </button>
                        </h5>

                        <div class="scrollbox" data-scrollbox>
                            <button type="button" class="scrollbox-btn up" data-scroll-up>
                                <i class="fa-solid fa-chevron-up"></i>
                            </button>

                            <div class="scrollbox-inner" data-scroll-inner>
                                <ul class="mb-0">
                                    @foreach ($categories as $parent)
                                        <li class="mb-2">
                                            <a class="filter-btn filter-cat {{ in_array($parent->id, request()->input('category', [])) ? 'active' : '' }}"
                                                href="javascript:void(0);"
                                                data-type="category"
                                                data-id="{{ $parent->id }}">
                                                <strong>{{ $parent->name }}</strong>
                                            </a>

                                            @if ($parent->children->isNotEmpty())
                                                <ul class="mt-2 ps-3">
                                                    @foreach ($parent->children as $child)
                                                        <li class="mb-2">
                                                            <a class="filter-btn filter-cat {{ in_array($child->id, request()->input('category', [])) ? 'active' : '' }}"
                                                                href="javascript:void(0);"
                                                                data-type="category"
                                                                data-id="{{ $child->id }}">
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

                    @if(isset($productsTop) && $productsTop->isNotEmpty())
                        <div class="widget widget_top_rated_products">
                            <h4 class="widget_title">Popular Product</h4>
                            <ul class="product_list_widget">
                                @foreach ($productsTop as $product)
                                    <li class="recent-post">
                                        <div class="media-img">
                                            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                                <img src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                    alt="thumb"
                                                    width="70"
                                                    height="70" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="recent-post-title h5">
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

            function stepY() {
                return Math.max(120, inner.clientHeight * 0.6);
            }

            function stepX() {
                return Math.max(140, inner.clientWidth * 0.7);
            }

            function update() {
                box.classList.remove('has-top-shadow', 'has-bottom-shadow');

                if (!isMobile()) {
                    const max = inner.scrollHeight - inner.clientHeight;

                    if (max <= 2) {
                        btnUp.style.display = 'none';
                        btnDown.style.display = 'none';
                        btnLeft.style.display = 'none';
                        btnRight.style.display = 'none';
                        return;
                    }

                    const atTop = inner.scrollTop <= 2;
                    const atBottom = inner.scrollTop >= max - 2;

                    btnUp.style.display = atTop ? 'none' : 'flex';
                    btnDown.style.display = atBottom ? 'none' : 'flex';
                    btnLeft.style.display = 'none';
                    btnRight.style.display = 'none';

                    if (!atTop) box.classList.add('has-top-shadow');
                    if (!atBottom) box.classList.add('has-bottom-shadow');
                } else {
                    const max = inner.scrollWidth - inner.clientWidth;

                    if (max <= 2) {
                        btnLeft.style.display = 'none';
                        btnRight.style.display = 'none';
                        btnUp.style.display = 'none';
                        btnDown.style.display = 'none';
                        return;
                    }

                    const atLeft = inner.scrollLeft <= 2;
                    const atRight = inner.scrollLeft >= max - 2;

                    btnLeft.style.display = atLeft ? 'none' : 'flex';
                    btnRight.style.display = atRight ? 'none' : 'flex';
                    btnUp.style.display = 'none';
                    btnDown.style.display = 'none';
                }
            }

            btnUp?.addEventListener('click', () => {
                inner.scrollBy({ top: -stepY(), behavior: 'smooth' });
            });

            btnDown?.addEventListener('click', () => {
                inner.scrollBy({ top: stepY(), behavior: 'smooth' });
            });

            btnLeft?.addEventListener('click', () => {
                inner.scrollBy({ left: -stepX(), behavior: 'smooth' });
            });

            btnRight?.addEventListener('click', () => {
                inner.scrollBy({ left: stepX(), behavior: 'smooth' });
            });

            inner.addEventListener('scroll', update);
            window.addEventListener('resize', update);
            window.addEventListener('load', update);

            update();
        });

        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();

                const type = button.dataset.type;
                const id = button.dataset.id;

                const url = new URL(window.location.href);
                const params = url.searchParams;

                const currentBrand = params.get('brand[]');
                const currentCategory = params.get('category[]');

                const setSingleParam = (name, value) => {
                    params.delete(name);
                    if (value) {
                        params.append(name, value);
                    }
                };

                if (type === 'brand') {
                    const nextBrand = currentBrand === id ? null : id;

                    setSingleParam('brand[]', nextBrand);

                    if (currentCategory) {
                        setSingleParam('category[]', currentCategory);
                    } else {
                        params.delete('category[]');
                    }
                }

                if (type === 'category') {
                    const nextCategory = currentCategory === id ? null : id;

                    setSingleParam('category[]', nextCategory);
                    params.delete('brand[]');
                }

                const query = params.toString();
                window.location.href = query ? `${url.pathname}?${query}` : url.pathname;
            });
        });

        document.getElementById('filterSearchForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const url = new URL(window.location.href);
            const params = url.searchParams;
            const keyword = document.getElementById('filterInput').value;

            if (keyword) {
                params.set('filter', keyword);
            } else {
                params.delete('filter');
            }

            const query = params.toString();
            window.location.href = query ? `${url.pathname}?${query}` : url.pathname;
        });

        document.getElementById('resetFilterBtn').addEventListener('click', function() {
            const url = new URL(window.location.href);
            window.location.href = url.pathname;
        });

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

                    scrollbox.classList.remove('has-top-shadow', 'has-bottom-shadow');

                    if (maxScroll <= 2) {
                        btnUp.style.display = 'none';
                        btnDown.style.display = 'none';
                        return;
                    }

                    const atTop = inner.scrollTop <= 2;
                    const atBottom = inner.scrollTop >= maxScroll - 2;

                    btnUp.style.display = atTop ? 'none' : 'flex';
                    btnDown.style.display = atBottom ? 'none' : 'flex';

                    if (!atTop) scrollbox.classList.add('has-top-shadow');
                    if (!atBottom) scrollbox.classList.add('has-bottom-shadow');
                }

                btnUp.addEventListener('click', () => {
                    inner.scrollBy({ top: -step(), behavior: 'smooth' });
                });

                btnDown.addEventListener('click', () => {
                    inner.scrollBy({ top: step(), behavior: 'smooth' });
                });

                inner.addEventListener('scroll', updateButtons);
                updateButtons();
                window.addEventListener('load', updateButtons);
                window.addEventListener('resize', updateButtons);
            }

            document.querySelectorAll('[data-scrollbox]').forEach(setupScrollbox);
        });
    </script>
@endsection