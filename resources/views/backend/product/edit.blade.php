@extends('layouts.backend.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Edit Product</h3>
                                <a class="btn btn-primary" href="{{ url('product') }}"><i class="fas fa-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="prod_name" class="form-label">Product Name</label>
                                            <input value="{{ $product->prod_name }}" name="prod_name" id="prod_name"
                                                type="text" class="@error('prod_name') is-invalid @enderror form-control"
                                                placeholder="Enter Product Name">
                                            @error('prod_name')
                                                <div class="alert alert-danger">Please Input Product Name</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_description" class="form-label">Product Description</label>
                                            <input value="{{ $product->prod_description }}" name="prod_description"
                                                id="prod_description" type="text"
                                                class="@error('prod_description') is-invalid @enderror form-control"
                                                placeholder="Enter Product Description">
                                            @error('prod_description')
                                                <div class="alert alert-danger">Please Input Product Description</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_size" class="form-label">Product Size</label>
                                            <input value="{{ $product->prod_size }}" name="prod_size" id="prod_size"
                                                type="text" class="@error('prod_size') is-invalid @enderror form-control"
                                                placeholder="Enter Product Size">
                                            @error('prod_size')
                                                <div class="alert alert-danger">Please Input Product Size</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="prod_qty" class="form-label">Product Quantity</label>
                                            <input value="{{ $product->prod_qty }}" name="prod_qty" id="prod_qty"
                                                type="text" class="@error('prod_qty') is-invalid @enderror form-control"
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
                                                <input value="{{ $product->prod_price }}" name="prod_price" id="prod_price"
                                                    type="text"
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
                                            <label for="sub_cat_id" class="form-label">Product Sub Category</label>
                                            <select name="sub_cat_id" id="sub_cat_id"
                                                class="@error('sub_cat_id') is-invalid @enderror custom-select rounded-1">
                                                <option selected="true" disabled="disabled">Select Sub Category</option>
                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ $product->sub_cat_id == $subcategory->id ? 'selected' : '' }}>
                                                        {{ $subcategory->sub_cat_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sub_cat_id')
                                                <div class="alert alert-danger">Please Choose Sub Category</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="formImage" class="form-label">Select Image For Product</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="img" id="imginput" type="file"
                                                        class="@error('img') is-invalid @enderror custom-file-input"
                                                        accept="image/png, image/jpeg">
                                                    <label class="custom-file-label" id="imgname"
                                                        for="img">{{ $product->img }}</label>
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
                                                {{ $product->prod_status || old('prod_status', 0) === 1 ? 'checked' : '' }}
                                                data-bootstrap-switch>
                                            <samp for="prod_status" class="align-middle text-danger ml-2">Default Status
                                                Enable Product</samp>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Clear</button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <img style="display: block;margin: auto;width: 50%;" id="img"
                                            src="/imageproduct/{{ $product->img }}" alt="{{ $product->img }}">
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
@section('script')
    <script>
        imginput.onchange = evt => {
            const [file] = imginput.files
            if (file) {
                img.src = URL.createObjectURL(file);
            } else {
                img.src = "";
            }
        }

        let file = document.getElementById("imginput");
        let message = document.getElementById("imgname");
        file.addEventListener("input", () => {
            if (file.files.length) {
                let fileName = file.files[0].name;
                message.innerHTML = `${fileName}`;
            } else {
                message.innerHTML = "Please select a file";
            }
        });
    </script>
@endsection
