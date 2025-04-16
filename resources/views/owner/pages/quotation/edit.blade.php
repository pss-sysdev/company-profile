@extends('owner.layouts.app')

@section('title', 'Update Quotation')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Update Quotation</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Quotation</a></div>
                    <div class="breadcrumb-item">Update Quotation</div>
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
                                <form action="{{ route('owner.quotation.update', ['id' => $quotation->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $quotation->name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Name Company</label>
                                        <input type="text" class="form-control" name="company_name" id="company_name"
                                            value="{{ $quotation->company_name }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">industry</label>
                                        <input type="text" class="form-control" name="industry" id="industry"
                                            value="{{ $quotation->industry }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ $quotation->email }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            value="{{ $quotation->phone_number }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Message</label>
                                        <textarea class="form-control" data-height="150" name="message" id="message">{{ $quotation->message }}</textarea>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Update Quotation</button>
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
    <script></script>
@endpush
