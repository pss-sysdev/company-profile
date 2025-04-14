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
                                <div>
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>

                                    @endif
                                </div>
                                <form action="{{ route('owner.product.update', ['id' => $product->id]) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $product->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Slug *</label>
                                        <input type="text" class="form-control" name="slug" id="slug" 
                                            value="{{ $product->slug }}">

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Category *</label>
                                                <select class="form-control selectric" id="id_category" name="id_category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" @selected($category->id == $product->id_category)>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Brand *</label>
                                                <select class="form-control selectric" id="id_brand" name="id_brand">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" @selected($brand->id == $product->id_brand)>
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
                                        <input type="text" class="form-control" name="price" id="price"
                                            value="{{ $product->price }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Sku Code *</label>
                                        <input type="text" class="form-control" name="sku_code" id="sku_code"
                                            value="{{ $product->sku_code }}">
                                    </div>

                                    <div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Main Picture Url</label>
                                            <div class="photo-container">
                                                @if ($product->main_picture_url == null)
                                                    <img src="{{ asset('uploads/no_photo.png') }}" alt="">
                                                @else
                                                    <a href="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                        class="magnific"><img
                                                            src="{{ asset('uploads/' . $product->main_picture_url) }}"
                                                            alt=""></a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Main Picture Url</label>
                                            <div><input type="file" name="main_picture_url"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Is Top Product ?</label>
                                                <select class="form-control selectric" id="is_top_product"
                                                    name="is_top_product">
                                                    <option value="1" @selected($product->is_top_product == 1)>YES</option>
                                                    <option value="0" @selected($product->is_top_product == 0)>NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Is Discontinue ?</label>
                                                <select class="form-control selectric" id="is_discontinue"
                                                    name="is_discontinue">
                                                    <option value="1" @selected($product->is_discontinue == 1)>YES</option>
                                                    <option value="0" @selected($product->is_discontinue == 0)>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Edit Product</button>
                                </form>
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
        })
    </script>
@endpush
