@extends('layouts.backend.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Add Sub Category</h3>
                                <a class="btn btn-primary" href="{{ url('subcategory') }}"><i class="fas fa-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sub_cat_name" class="form-label">Sub Category Name</label>
                                            <input name="sub_cat_name" id="sub_cat_name" type="text"
                                                class="@error('sub_cat_name') is-invalid @enderror form-control"
                                                placeholder="Enter Sub Category Name">
                                            @error('sub_cat_name')
                                                <div class="alert alert-danger">Please Input Sub Category Name</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cat_id" class="form-label">Category Name</label>
                                            <select name="cat_id" id="cat_id"
                                                class="@error('cat_id') is-invalid @enderror custom-select rounded-1">
                                                <option selected="true" disabled="disabled">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->cat_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cat_id')
                                                <div class="alert alert-danger">Please Choose SubCategory</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="sub_cat_description" class="form-label">Sub Category Description
                                                (Optional)</label>
                                            <input name="sub_cat_description" id="sub_cat_description" type="text"
                                                class="@error('sub_cat_description') is-invalid @enderror form-control"
                                                placeholder="Enter Sub Category Description">
                                            @error('sub_cat_description')
                                                <div class="alert alert-danger">Please Input Sub Category Description</div>
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
