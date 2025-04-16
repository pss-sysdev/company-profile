@extends('owner.layouts.app')

@section('title', 'Create New Project')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Project</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Projects</a></div>
                    <div class="breadcrumb-item">Create New Project</div>
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
                                <form action="{{ route('owner.project.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Title *</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ old('title') }}">
                                    </div>

                                    <div class="mb-3">
                                        <div class="photo-container">
                                            <img id="imagePreview" class="preview" src="" alt="Image Preview"
                                                style="display:none;">
                                        </div>


                                        <label for="" class="form-label">Picture *</label>
                                        <div><input type="file" name="picture" id="picture"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <textarea class="form-control" data-height="150" name="description" id="description">{{ old('description') }}</textarea>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Create Project</button>
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
    <script>
        document.getElementById('picture').addEventListener('change', previewImage);

        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
                preview.src = '';
            }
        }

        function removeImage() {
            const preview = document.getElementById('imagePreview');
            preview.style.display = 'none';
            preview.src = '';
            document.getElementById('imageInput').value = ''; // Clear the input field
        }
    </script>
@endpush
