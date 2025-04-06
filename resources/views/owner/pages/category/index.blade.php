@extends('owner.layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Category</h1>
                <div class="section-header-button">
                    <a href="{{ route('owner.category.create') }}" class="btn btn-primary">Add New</a>
                </div>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Category</a></div>
                    <div class="breadcrumb-item">All Category</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">List Category</h2>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-category">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category Code</th>
                                                <th>Sub Category Name</th>
                                                <th>Picture Url</th>
                                                <th>Is Discontinue</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->category_code }}</td>
                                                    <td>{{ $category->sub_category_name }}</td>
                                                    <td>
                                                        <div class="photo-container-small">
                                                            @if ($category->picture_url == null)
                                                                <img src="{{ asset('uploads/no_photo.png') }}"
                                                                    alt="">
                                                            @else
                                                                <a href="{{ asset('uploads/' . $category->picture_url) }}"
                                                                    class="magnific"><img
                                                                        src="{{ asset('uploads/' . $category->picture_url) }}"
                                                                        alt=""></a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $category->is_discontinue }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('owner.category.edit', $category->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('owner.category.destroy', $category->id) }}"
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

@push('scripts')
    <!-- JS Libraies -->
    <script>
        $(function() {
            $("#table-category").dataTable({});
            $(".magnific").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true,
                },
            });
        })
    </script>
    <!-- Page Specific JS File -->
@endpush
