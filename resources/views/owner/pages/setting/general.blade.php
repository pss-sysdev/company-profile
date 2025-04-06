@extends('owner.layouts.app')

@section('title', 'General')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Settings</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('owner.setting-general.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tab__logo_favicon" data-toggle="tab"
                                                href="#item__logo_favicon" role="tab" aria-controls="item__logo_favicon"
                                                aria-selected="true">Logo and Favicon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tab__404" data-toggle="tab" href="#item__404"
                                                role="tab" aria-controls="item__404" aria-selected="false">Contact
                                                Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tab__social_media" data-toggle="tab"
                                                href="#item__social_media" role="tab" aria-controls="item__social_media"
                                                aria-selected="false">Social Media</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="item__logo_favicon" role="tabpanel"
                                            aria-labelledby="tab__logo_favicon">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="w_50_p">
                                                        Existing Logo
                                                    </td>
                                                    <td>
                                                        Change Logo
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center bg_eeeeee">
                                                        <img src="{{ asset('uploads/' . $setting->logo) }}" alt=""
                                                            class="w_200">
                                                    </td>
                                                    <td>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="logo"
                                                                name="logo">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                            <table class="table table-bordered">
                                                <tr>
                                                    <td class="w_50_p">
                                                        Existing Favicon
                                                    </td>
                                                    <td>
                                                        Existing Favicon
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center bg_eeeeee">
                                                        <img src="{{ asset('uploads/' . $setting->favicon) }}" alt=""
                                                            class="w_200">
                                                    </td>
                                                    <td>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="favicon"
                                                                name="favicon">
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="item__404" role="tabpanel"
                                            aria-labelledby="tab__404">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Existing Photo</label>
                                                        <div>
                                                            {{-- <img src="{{ asset('uploads/' . $setting->image_404) }}"
                                                                alt="" class="w_200"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Change Photo</label>
                                                        <div>
                                                            <input type="file" name="image_404" class="custom-file-input"
                                                                id="logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="item__social_media" role="tabpanel"
                                            aria-labelledby="tab__social_media">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 mb-3">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Facebook</label>
                                                        <input type="text" name="facebook" class="form-control"
                                                            value="{{ $setting->facebook }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 mb-3">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Twitter</label>
                                                        <input type="text" name="twitter" class="form-control"
                                                            value="{{ $setting->twitter }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 mb-3">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Instagram</label>
                                                        <input type="text" name="instagram" class="form-control"
                                                            value="{{ $setting->instagram }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12 mb-3">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">YouTube</label>
                                                        <input type="text" name="youtube" class="form-control"
                                                            value="{{ $setting->youtube }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block mb_50 btn-common">Update</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-setting-detail.js') }}"></script>
@endpush
