@extends('layouts.backend.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Add User</h3>
                                <a class="btn btn-primary" href="{{ url('user') }}"><i class="fas fa-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <input name="name" id="name" type="text"
                                                class="@error('name') is-invalid @enderror form-control"
                                                placeholder="Enter Name">
                                            @error('name')
                                                <div class="alert alert-danger">Please Input Name</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" id="email" type="text"
                                                class="@error('email') is-invalid @enderror form-control"
                                                placeholder="Enter Email">
                                            @error('email')
                                                <div class="alert alert-danger">Please Input Email</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" id="password" type="password"
                                                class="@error('password') is-invalid @enderror form-control"
                                                placeholder="Enter Password">
                                            @error('password')
                                                <div class="alert alert-danger">Please Input Password</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="img" class="form-label">Select Image For User</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="img" id="img" type="file"
                                                        class="@error('img') is-invalid @enderror custom-file-input"
                                                        accept="image/png, image/jpeg">
                                                    <label class="custom-file-label" for="img">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @error('img')
                                                <div class="alert alert-danger">Please Choose Image Follow Rule Size:
                                                    4096mb & File Image Only</div>
                                            @enderror
                                        </div>
                                        <div class="ml-auto pt-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
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
