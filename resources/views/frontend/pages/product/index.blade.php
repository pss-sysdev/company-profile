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

        .title-product{
            display: inline-block;
            border-left: 3px solid red;
            padding-left: 5px;
        }
    </style>
    <!-- Our Brands -->
    <div class="container-fluid my-5">
        <div class="find-more-about-our-brands"
            style="display: flex; flex-direction: column; justify-content: center; align-items: start; text-align: start;">
            <h2 class="title-product"> Product Page</h2>
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
                        <h3 class="mb-0">
                            @if ($selected_cat->isNotEmpty())
                                @foreach ($selected_cat as $sc)
                                    {{ $loop->last ? $sc->name : $sc->name . ', ' }}
                                @endforeach
                            @else
                                All Product
                            @endif
                        </h3>
                        <h5 class="mb-0">Brand Includes</h5>
                    </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="row">
                        <div class="col-xl-1 col-lg-2 col-sm-12">
                            <aside class="row brand-sidebar-area">
                                @foreach ($brands as $brand)
                                    <a class="col-xl-12 col-lg-12 col-sm-2 col-3 filter-btn" href="javascript:void(0);"
                                        data-type="brand"
                                        data-id="{{ $brand->id }}"
                                        style="margin-bottom: 8px;">
                                        <div class="wrapper-item shadow-sm filter-brand {{ in_array($brand->id, request()->input('brand', [])) ? 'active' : '' }}">
                                            <img src="{{ asset('uploads/' . $brand->logo_picture) }}" alt="{{ $brand->name }}">
                                        </div>
                                    </a>
                                @endforeach
                            </aside>
                            <style>
                                .wrapper-item {
                                    border-radius: 8px;
                                    overflow: hidden;
                                    width: 100%;
                                }

                                .wrapper-item img {
                                    object-fit: cover;
                                    border-radius: 8px;
                                    max-height: 83px;
                                    width: 100%;
                                    aspect-ratio: 9 / 5;
                                }

                                @media (max-width: 991px) {
                                    .brand-sidebar-area{
                                        padding-top: 30px;
                                        padding-bottom: 30px;
                                    }
                                    .wrapper-item {
                                        max-height: 52px;
                                    }
                                }

                            </style>
                        </div>
                        <div class="col-xl-11 col-lg-10 col-sm-12">
                            <div class="tab-pane fade active show" id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">
                                <div class="row gy-25">
                                    @foreach ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-sm-4">
                                            <div class="as-product">
                                                <div class="product-img">
                                                    <img src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                        alt="product image" />
                                                </div>
                                                <div class="product-content">
                                                    <p class="meta"></p>
                                                    <h4 class="product-title h5">
                                                        <a href="shop-details.html">{{ $product->name }}</a>
                                                    </h4>
                                                    <span class="price">Rp. {{ number_format($product->price, 2) }}</span>
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
                        <input type="text" id="filterInput" name="filter" placeholder="Enter Keyword" value="{{ request('filter') }}" />
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    </div>
                    <div class="widget widget_categories">
                        <h4 class="widget_title">Categories 
                            <button id="resetFilterBtn" style="font-size: 12px;" class="btn btn-sm btn-link text-primary"
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Reset Filter">
                                    <i class="fas fa-sync-alt"></i>
                            </button>
                        </h4>
                        <ul>
                            @foreach ($categories as $category)
                                <li>
                                    <a class="filter-btn filter-cat {{ in_array($category->id, request()->input('category', [])) ? 'active' : '' }}" href="javascript:void(0);" data-type="category"
                                        data-id="{{ $category->id }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

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
                                        <span class="price">Rp. {{ number_format($product->price, 2) }}</span>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </div>

    <script>
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
        document.getElementById('filterSearchForm').addEventListener('submit', function (e) {
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

        document.getElementById('resetFilterBtn').addEventListener('click', function () {
            const url = new URL(window.location.href);
            const path = url.pathname; // Keep /product
            window.location.href = path; // Redirect to /product without filters
        });
    </script>

    {{-- STEEL BEVEL & PRESSURE PAINT End --}}
@endsection


{{-- @push('modal')
    <div id="QuickView" class="white-popup mfp-hide">
        <div class="container bg-white position-relative">
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        <div class="img">
                            <img src="assets/img/product/product_1_1.png" alt="Product Image" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <p class="price">$125.00</p>
                        <h2 class="product-title">Brembo Disc Brake S2</h2>
                        <div class="product-rating">
                            <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                <span style="width: 100%">Rated <strong class="rating">5.00</strong> out of 5 based
                                    on <span class="rating">1</span> customer rating</span>
                            </div>
                            <a href="shop-details.html" class="woocommerce-review-link">(<span class="count">2</span>
                                customer reviews)</a>
                        </div>
                        <p class="text">
                            Syndicate customized growth strategies prospective human capital
                            leverage other's optimal e-markets without transparent catalysts
                            for change.
                        </p>
                        <div class="checklist">
                            <ul>
                                <li>
                                    <i class="far fa-circle-check"></i> Lifetime structural, one
                                    year face finish warranty
                                </li>
                                <li>
                                    <i class="far fa-circle-check"></i>Mapped from “Center Caps”
                                    under ” tment” tab
                                </li>
                            </ul>
                        </div>
                        <div class="actions">
                            <div class="quantity">
                                <input type="number" class="qty-input" step="1" min="1" max="100"
                                    name="quantity" value="1" title="Qty" />
                                <button class="quantity-plus qty-btn">
                                    <i class="far fa-chevron-up"></i>
                                </button>
                                <button class="quantity-minus qty-btn">
                                    <i class="far fa-chevron-down"></i>
                                </button>
                            </div>
                            <button class="as-btn">Add to Cart</button>
                        </div>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">wheel-fits-chevy-camaro</span></span>
                            <span class="posted_in">Category:
                                <a href="shop.html" rel="tag">Tires & Wheels</a></span>
                            <span>Tags: <a href="shop.html">automotive parts</a><a href="shop.html">wheels</a></span>
                        </div>
                    </div>
                    <button title="Close (Esc)" type="button" class="mfp-close">
                        ×
                    </button>
                </div>
            </div>
        </div>
    </div>
@endpush --}}
