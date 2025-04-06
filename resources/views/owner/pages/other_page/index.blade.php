@extends('owner.layouts.app')

@section('title', 'Other Pages')

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
                <h1>Other Pages</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Other Pages</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4"
                                            role="tab" aria-controls="home" aria-selected="true">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                                            role="tab" aria-controls="profile" aria-selected="false">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-8">
                                <div class="tab-content no-padding" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                        aria-labelledby="home-tab4">
                                        <div>
                                            @if ($errors->any())
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li class="text-danger">{{ $error }}</li>
                                                    @endforeach
                                                </ul>

                                            @endif
                                        </div>
                                        <form action="{{ route('owner.other-page.aboutus') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="" class="form-label">Overview</label>
                                                <textarea class="form-control" data-height="150" name="overview">{{ $company->overview }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">History</label>
                                                <textarea class="form-control" data-height="150" name="history">{{ $company->history }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Growth</label>
                                                <textarea class="form-control" data-height="150" name="growth">{{ $company->growth }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">industries</label>
                                                <textarea class="form-control" data-height="150" name="industries">{{ $company->industries }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Commitment</label>
                                                <textarea class="form-control" data-height="150" name="commitment">{{ $company->commitment }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Vision</label>
                                                <textarea class="form-control" data-height="150" name="vision">{{ $company->vision }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Mission</label>
                                                <textarea class="form-control" data-height="150" name="mission">{{ $company->mission }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Motto</label>
                                                <textarea class="form-control" data-height="150" name="motto">{{ $company->motto }}</textarea>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile4" role="tabpanel"
                                        aria-labelledby="profile-tab4">
                                        Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac
                                        efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo
                                        rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra
                                        consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus
                                        massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget
                                        scelerisque tellus pharetra a.
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
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-setting-detail.js') }}"></script>
@endpush
