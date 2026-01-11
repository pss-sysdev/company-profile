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
                            <aside class="row brand-sidebar-area">
                                @foreach ($brands as $brand)
                                    <a class="col-xl-12 col-lg-12 col-sm-2 col-3 filter-btn" href="javascript:void(0);"
                                        data-type="brand" data-id="{{ $brand->id }}" style="margin-bottom: 8px;">
                                        <div class="wrapper-item filter-brand {{ in_array($brand->id, request()->input('brand', [])) ? 'active' : '' }}"
                                            style="box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.1);">
                                            <img src="{{ asset('uploads/' . $brand->logo_picture) }}"
                                                alt="{{ $brand->name }}" class="brand-logo">
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
                                    object-fit: contain;
                                    border-radius: 8px;
                                    max-height: 83px;
                                    width: 100%;
                                    aspect-ratio: 9 / 5;
                                }

                                @media (max-width: 991px) {
                                    .brand-sidebar-area {
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
                    <div class="widget widget_categories">
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


    {{-- STEEL BEVEL & PRESSURE PAINT End --}}
@endsection
