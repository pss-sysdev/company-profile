@extends('owner.layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Clients</h1>
                <div class="section-header-button">
                    <a href="{{ route('owner.client.index.create') }}" class="btn btn-primary">Add New</a>
                </div>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Clients</a></div>
                    <div class="breadcrumb-item">All Clients</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">List Clients</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Clients</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-category">
                                        <thead>
                                            <tr>
                                                <th>Name Client</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>{{ $client->client_name }}</td>
                                                    <td>
                                                        <div class="photo-container-small">
                                                            @if ($client->client_logo == null)
                                                                <img src="{{ asset('uploads/no_photo.png') }}"
                                                                    alt="">
                                                            @else
                                                                <a href="{{ asset('uploads/' . $client->client_logo) }}"
                                                                    class="magnific"><img
                                                                        src="{{ asset('uploads/' . $client->client_logo) }}"
                                                                        alt=""></a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('owner.client.index.edit', $client->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('owner.client.index.destroy', $client->id) }}"
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
