@extends('owner.layouts.app')

@section('title', 'Brand')

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
                    <a href="{{ route('owner.brand') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Brand</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Brands</a></div>
                    <div class="breadcrumb-item">Create New Brand</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Create New Brand</h2>
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
                                <form action="{{ route('owner.brand.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Slug Url <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="url" id="url"
                                                    value="{{ old('url') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Brand Ownership <span class="text-danger">*</span></label>
                                        <select class="form-control selectric" id="is_own" name="is_own">
                                            <option value="0">Distributor</option>
                                            <option value="1">Owned</option>
                                        </select>
                                    </div>

                                    <div id="owned-fields" style="display: none;">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="summernote" id="description" name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-4">

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Logo <span class="text-danger">*</span> 
                                                    <span class="text-warning">(Recommended size: 285×118 px)</span>
                                                </label>
                                                <div><input type="file" name="logo_picture" id="logo_picture"></div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Logo 2 *</label>
                                                <div><input type="file" name="logo_picture2" id="logo_picture2"></div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Banner Picture <span class="text-warning">(Recommended size: 1000×170 px)</span></label>
                                                <div><input type="file" name="banner_picture" id="banner_picture"></div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Background Logo Picture</label>
                                                <div><input type="file" name="bg_logo_picture" id="bg_logo_picture">
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                    <button class="btn btn-primary" type="submit">Create Brand</button>
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

        $(document).ready(function () {
            function toggleOwnedFields() {
                const ownership = $('#is_own').val();
                const ownedFields = $('#owned-fields');

                if (ownership === '1') {
                    ownedFields.show();
                } else {
                    ownedFields.hide();
                }
            }

            // Init Selectric
            $('#is_own').selectric({
                onChange: function () {
                    toggleOwnedFields();
                }
            });

            // Initial check
            toggleOwnedFields();
        });
    </script>

@endpush
