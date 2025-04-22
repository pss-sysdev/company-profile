@extends('owner.layouts.app')

@section('title', 'Edit Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">Edit Product</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="details-tab" data-toggle="tab"
                                                    href="#details" role="tab" aria-controls="details"
                                                    aria-selected="true">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="addtional-information-tab" data-toggle="tab"
                                                    href="#addtional-information" role="tab"
                                                    aria-controls="addtional-information" aria-selected="false">Addtional
                                                    Information</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="external-link-tab" data-toggle="tab"
                                                    href="#external-link" role="tab" aria-controls="external-link"
                                                    aria-selected="false">External
                                                    Link</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-8">
                                        <div class="tab-content" id="myTabContent">
                                            <form action="{{ route('owner.product.update', ['id' => $product->id]) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf

                                                <div class="tab-content no-padding">

                                                    <div class="tab-pane show active" id="details" role="tabpanel"
                                                        aria-labelledby="detail-tab">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Name *</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" value="{{ $product->name }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Slug *</label>
                                                            <input type="text" class="form-control" name="slug"
                                                                id="slug" value="{{ $product->slug }}">

                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Category
                                                                        *</label>
                                                                    <select class="form-control selectric" id="id_category"
                                                                        name="id_category">
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}"
                                                                                @selected($category->id == $product->id_category)>
                                                                                {{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Brand *</label>
                                                                    <select class="form-control selectric" id="id_brand"
                                                                        name="id_brand">
                                                                        @foreach ($brands as $brand)
                                                                            <option value="{{ $brand->id }}"
                                                                                @selected($brand->id == $product->id_brand)>
                                                                                {{ $brand->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Description *</label>
                                                            <textarea class="summernote-simple" id="description" name="description">
                                                                {{ $product->description }}
                                                            </textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Price *</label>
                                                            <input type="text" class="form-control" name="price"
                                                                id="price" value="{{ $product->price }}">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Sku Code *</label>
                                                            <input type="text" class="form-control" name="sku_code"
                                                                id="sku_code" value="{{ $product->sku_code }}">
                                                        </div>

                                                        <div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label">Main Picture
                                                                    Url <span class="text-muted">(Recommended size: 450×450 px)</span></label>  
                                                                <div class="photo-container">
                                                                    @if ($product->main_picture_url == null)
                                                                        <img src="{{ asset('uploads/no_photo.png') }}"
                                                                            alt="">
                                                                    @else
                                                                        <a href="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                                            class="magnific"><img
                                                                                src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                                                alt=""></a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div><input type="file" name="main_picture_url"></div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Is Top
                                                                        Product
                                                                        ?</label>
                                                                    <select class="form-control selectric"
                                                                        id="is_top_product" name="is_top_product">
                                                                        <option value="1"
                                                                            @selected($product->is_top_product == 1)>YES
                                                                        </option>
                                                                        <option value="0"
                                                                            @selected($product->is_top_product == 0)>NO
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Is
                                                                        Discontinue
                                                                        ?</label>
                                                                    <select class="form-control selectric"
                                                                        id="is_discontinue" name="is_discontinue">
                                                                        <option value="1"
                                                                            @selected($product->is_discontinue == 1)>YES
                                                                        </option>
                                                                        <option value="0"
                                                                            @selected($product->is_discontinue == 0)>NO
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Is Rental
                                                                        ?</label>
                                                                    <select class="form-control selectric" id="is_rental"
                                                                        name="is_rental">
                                                                        <option value="1"
                                                                            @selected($product->is_rental == 1)>YES
                                                                        </option>
                                                                        <option value="0"
                                                                            @selected($product->is_rental == 0)>NO
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Rental Price
                                                                        *</label>
                                                                    <input type="text" class="form-control"
                                                                        name="rental_price" id="rental_price"
                                                                        value="{{ $product->rental_price }}">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Is Indent
                                                                        ?</label>
                                                                    <select class="form-control selectric" id="is_indent"
                                                                        name="is_indent">
                                                                        <option value="1"
                                                                            @selected($product->is_indent == 1)>YES
                                                                        </option>
                                                                        <option value="0"
                                                                            @selected($product->is_indent == 0)>NO
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane fade" id="addtional-information" role="tabpanel"
                                                        aria-labelledby="addtional-information-tab">
                                                        <div id="repeaterContainer">

                                                            @foreach ($product->spec as $item)
                                                                <div class="repeater-item">
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-6">

                                                                            <label for=""
                                                                                class="form-label">Title</label>
                                                                            <input type="text" class="form-control"
                                                                                name="addtional_information__title[]"
                                                                                value="{{ $item->title }}">

                                                                        </div>

                                                                        <div class="col-md-5">

                                                                            <label for=""
                                                                                class="form-label">Data</label>
                                                                            <input type="text" class="form-control"
                                                                                name="addtional_information__data[]"
                                                                                value="{{ $item->data }}">

                                                                        </div>

                                                                        <div class="col-md-1 d-flex align-items-end">
                                                                            <button type="button"
                                                                                class="btn btn-danger remove-item">Remove</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <button class="btn btn-warning mb-5" type="button"
                                                            id="addItem">Add
                                                            Item Information</button>
                                                    </div>

                                                    <div class="tab-pane fade" id="external-link" role="tabpanel"
                                                        aria-labelledby="external-link-tab">
                                                        <div id="repeaterContainerExternalLink">
                                                            @foreach ($product->externalLink as $item)
                                                                <div class="repeater-item">
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-3">
                                                                            <input type="text" class="form-control"
                                                                                name="external-link-tab__title[]"
                                                                                placeholder="Title"
                                                                                value="{{ $item->link_name }}">

                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <input type="text" class="form-control"
                                                                                name="external-link-tab__link[]"
                                                                                placeholder="Link"
                                                                                value="{{ $item->link }}">
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <input type="text"
                                                                                class="form-control colorpickerinput"
                                                                                name="external-link-tab__color[]"
                                                                                placeholder="Color Button"
                                                                                value="{{ $item->hex_color }}">
                                                                        </div>

                                                                        <div class="col-md-3">
                                                                            <button type="button"
                                                                                class="btn btn-danger remove-item">Remove</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <button class="btn btn-warning mb-5" type="button"
                                                            id="addItemExternalLink">Add External Link</button>
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary" type="submit">Update Product</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <script>
        $(function() {
            $(".magnific").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true,
                },
            });

            $('#addItem').click(function() {
                var newItem = `
                    <div class="repeater-item">
                       <div class="row mb-2">
                                                            <div class="col-md-6">

                                                                <label for="" class="form-label">Title</label>
                                                                <input type="text" class="form-control"
                                                                    name="addtional_information__title[]">

                                                            </div>

                                                            <div class="col-md-5">

                                                                <label for="" class="form-label">Data</label>
                                                                <input type="text" class="form-control"
                                                                    name="addtional_information__data[]">

                                                            </div>

                                                            <div class="col-md-1 d-flex align-items-end">
                                                                <!-- Add flex utilities here -->
                                                                <button type="button"
                                                                    class="btn btn-danger remove-item">Remove</button>
                                                            </div>
                                                        </div>
                    </div>
                `;
                $('#repeaterContainer').append(newItem);
            });

            $('#addItemExternalLink').click(function() {
                var newItem = `
                 <div class="repeater-item">
                         <div class="row mb-2">
                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control"
                                                                        name="external-link-tab__title[]"
                                                                        placeholder="Title">

                                                                </div>

                                                                <div class="col-md-3">
                                                                    <input type="text" class="form-control"
                                                                        name="external-link-tab__link[]"
                                                                        placeholder="Link">
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <input type="text"
                                                                        class="form-control colorpickerinput"
                                                                        name="external-link-tab__color[]"
                                                                        placeholder="Color Button">
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <button type="button"
                                                                        class="btn btn-danger remove-item">Remove</button>
                                                                </div>
                                                            </div>
                                                             </div>
                `;
                $('#repeaterContainerExternalLink').append(newItem);

                $(".colorpickerinput").colorpicker({
                    format: "hex",
                    component: ".input-group-append",
                });
            });

            function toggleRentalPrice() {
                if ($('#is_rental').val() === '1') {
                    $('#rental_price').closest('.mb-3').show();
                } else {
                    $('#rental_price').closest('.mb-3').hide();
                }
            }

            toggleRentalPrice();

            $('#is_rental').change(toggleRentalPrice);

            $(".colorpickerinput").colorpicker({
                format: "hex",
                component: ".input-group-append",
            });
        })

        $(document).on('click', '.remove-item', function() {
            $(this).closest('.repeater-item').remove();
        });
    </script>
@endpush
