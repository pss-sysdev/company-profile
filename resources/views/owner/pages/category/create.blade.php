@extends('owner.layouts.app')

@section('title', 'Create New Category')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ URL::previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create New Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Categories</a></div>
                    <div class="breadcrumb-item">Create New Category</div>
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
                                <form action="{{ route('owner.category.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Category Code *</label>
                                        <input type="text" class="form-control" name="category_code"
                                            id="category_code" value="{{ old('category_code') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Sub Category Name *</label>
                                        <input type="text" class="form-control" name="sub_category_name"
                                            id="sub_category_name" value="{{ old('sub_category_name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Is Discontinue ?</label>
                                        <select class="form-control selectric" id="is_discontinue" name="is_discontinue">
                                            <option value="1" @selected(old('is_discontinue') == 1)>YES</option>
                                            <option value="0" @selected(old('is_discontinue') == 0)>NO</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Picture Url *</label>
                                        <div><input type="file" name="picture_url" id="picture_url"></div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Create Category</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
