@extends('owner.layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Quotations</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Quotation</a></div>
                    <div class="breadcrumb-item">All Quotation</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">List Quotation</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Quotation</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-category">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($qutations as $qutation)
                                                <tr>
                                                    <td>{{ $qutation->name }}</td>
                                                    <td>{{ $qutation->company_name }}</td>
                                                    <td>{{ $qutation->email }}</td>
                                                    <td>{{ $qutation->phone_number }}</td>
                                                    <td>
                                                        <a href="{{ route('owner.quotation.edit', $qutation->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('owner.quotation.destroy', $qutation->id) }}"
                                                            class="btn btn-danger btn-sm"
                                                            onClick="return confirm('{{ __('Are you sure?') }}')"><i
                                                                class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
