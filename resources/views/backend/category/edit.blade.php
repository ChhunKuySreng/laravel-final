@extends('layouts.backend.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Add Category</h3>
                                <a class="btn btn-primary" href="{{ url('category') }}"><i class="fas fa-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.update', $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cat_name" class="form-label">Category Name</label>
                                            <input value="{{ $category->cat_name }}" name="cat_name" id="cat_name"
                                                type="text" class="@error('cat_name') is-invalid @enderror form-control"
                                                placeholder="Enter Category Name">
                                            @error('cat_name')
                                                <div class="alert alert-danger">Please Input Category Name</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cat_description" class="form-label">Category Description
                                                (Optional)</label>
                                            <input value="{{ $category->cat_description }}" name="cat_description"
                                                id="cat_description" type="text"
                                                class="@error('cat_description') is-invalid @enderror form-control"
                                                placeholder="Enter Category Description">
                                            @error('cat_description')
                                                <div class="alert alert-danger">Please Input Category Description</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="ml-auto pt-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
