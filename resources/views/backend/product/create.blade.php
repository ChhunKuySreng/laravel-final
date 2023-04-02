@extends('layouts.backend.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Add Product</h3>
                                <a class="btn btn-primary" href="{{ url('product') }}"><i class="fas fa-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="prod_name" class="form-label">Product Name</label>
                                            <input name="prod_name" id="prod_name" type="text"
                                                class="@error('prod_name') is-invalid @enderror form-control"
                                                placeholder="Enter Product Name">
                                            @error('prod_name')
                                                <div class="alert alert-danger">Please Input Product Name</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_description" class="form-label">Product Description</label>
                                            <input name="prod_description" id="prod_description" type="text"
                                                class="@error('prod_description') is-invalid @enderror form-control"
                                                placeholder="Enter Product Description">
                                            @error('prod_description')
                                                <div class="alert alert-danger">Please Input Product Description</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_size" class="form-label">Product Size (Optional)</label>
                                            <input name="prod_size" id="prod_size" type="text"
                                                class="@error('prod_size') is-invalid @enderror form-control"
                                                placeholder="Enter Product Size">
                                            @error('prod_size')
                                                <div class="alert alert-danger">Please Input Product Size</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_qty" class="form-label">Product Quantity</label>
                                            <input name="prod_qty" id="prod_qty" type="text"
                                                class="@error('prod_qty') is-invalid @enderror form-control"
                                                placeholder="Enter Product Quantity">
                                            @error('prod_qty')
                                                <div class="alert alert-danger">Please Input Product Quantity</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_price" class="form-label">Product Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input name="prod_price" id="prod_price" type="text"
                                                    class="@error('prod_price') is-invalid @enderror form-control">
                                                <div class="input-group-append" placeholder="Enter Product Price">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                            @error('prod_price')
                                                <div class="alert alert-danger">Please Input Product Price</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cat_id" class="form-label">Product Category</label>
                                            <select name="cat_id" id="cat_id"
                                                class="@error('cat_id') is-invalid @enderror custom-select rounded-1">
                                                <option selected="true" disabled="disabled">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->cat_id }}">{{ $category->cat_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cat_id')
                                                <div class="alert alert-danger">Please Choose Category</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="formImage" class="form-label">Select Image For Product</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="@error('img') is-invalid @enderror custom-file-input"
                                                        name="img" id="InputImage" accept="image/png, image/jpeg">
                                                    <label class="custom-file-label" for="InputImage">Choose file</label>
                                                </div>
                                            </div>
                                            @error('img')
                                                <div class="alert alert-danger">Please Choose Image Follow Rule Size: 4096mb &
                                                    File Image Only</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="prod_status" value="0">
                                            <input type="checkbox" id="prod_status" name="prod_status" value="1"
                                                {{ old('prod_status', 0) === 0 ? 'checked' : '' }} data-bootstrap-switch>
                                            <samp for="prod_status" class="align-middle text-danger ml-2">Default Status
                                                Enable Product</samp>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Clear</button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img class=" w-100" id="preview-image-before-upload">
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
