@extends('owner.layouts.app')

@section('title', 'Product')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Product</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Products</a></div>
                    <div class="breadcrumb-item">Create New Product</div>
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
                                <form action="{{ route('owner.product.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Slug *</label>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{ old('slug') }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Category *</label>
                                                <select class="form-control selectric" id="id_category" name="id_category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Brand *</label>
                                                <select class="form-control selectric" id="id_brand" name="id_brand">
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Description *</label>
                                        <textarea class="summernote-simple" id="description" name="description"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Price *</label>
                                        <input type="text" class="form-control" name="price" id="price"
                                            value="{{ old('price') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Sku Code *</label>
                                        <input type="text" class="form-control" name="sku_code" id="sku_code"
                                            value="{{ old('sku_code') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Main Picture Url *</label>
                                        <div><input type="file" name="main_picture_url" id="main_picture_url"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Is Top Product ?</label>
                                                <select class="form-control selectric" id="is_discontinue"
                                                    name="is_discontinue">
                                                    <option value="1" @selected(old('is_top_product') == 1)>YES</option>
                                                    <option value="0" @selected(old('is_top_product') == 0)>NO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Is Discontinue ?</label>
                                                <select class="form-control selectric" id="is_discontinue"
                                                    name="is_discontinue">
                                                    <option value="1" @selected(old('is_discontinue') == 1)>YES</option>
                                                    <option value="0" @selected(old('is_discontinue') == 0)>NO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Create Product</button>
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

    <!-- Page Specific JS File -->
@endpush
