@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('slideshow.store') }}" method="POST" enctype="multipart/form-data">@csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item">
                                    <a href="#en" class="nav-link active" data-toggle="tab">English</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kh" class="nav-link" data-toggle="tab">ខ្មែរ</a>
                                </li>
                            </ul>
                            <div class="card-header">
                                <div class="d-flex">
                                    <h3 class="card-title flex-grow-1">Create Slide Show</h3>
                                    <a class="btn btn-primary" href="{{ url('slideshow') }}"><i
                                            class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="tab-content">
                                        <div id="en" class="tab-pane fade show active">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="title_en" class="form-label">Title</label>
                                                    <input name="title_en" id="title_en" type="text"
                                                        class="@error('title_en') is-invalid @enderror form-control"
                                                        placeholder="Enter Title">
                                                    @error('title_en')
                                                        <div class="alert alert-danger">Please Input Title</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subtitle_en" class="form-label">Subtitle</label>
                                                    <input name="subtitle_en" id="subtitle_en" type="text"
                                                        class="@error('subtitle_en') is-invalid @enderror form-control"
                                                        placeholder="Enter Subtitle">
                                                    @error('subtitle_en')
                                                        <div class="alert alert-danger">Please Input Subtitle</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="text_en" class="form-label">Text</label>
                                                    <textarea name="text_en" id="text_en" class="@error('text_en') is-invalid @enderror form-control" rows="2"
                                                        placeholder="Enter Text ..."></textarea>
                                                    @error('text_en')
                                                        <div class="alert alert-danger">Please Input Text</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="link" class="form-label">Link</label>
                                                    <input name="link" id="link"
                                                        value="https://www.w3schools.com/tags/att_input_type_url.asp"
                                                        type="url"
                                                        class="@error('link') is-invalid @enderror form-control"
                                                        placeholder="Enter Link">
                                                    @error('link')
                                                        <div class="alert alert-danger">Please Input Text</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="img" class="form-label">Select Image For Slide
                                                        Show</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input name="img" id="imginput" type="file"
                                                                class="@error('img') is-invalid @enderror custom-file-input"
                                                                accept="image/*">
                                                            <label class="custom-file-label" id="imgname"
                                                                for="img">Please select a file</label>
                                                        </div>
                                                    </div>
                                                    @error('img')
                                                        <div class="alert alert-danger">Please Choose Image Follow Rule Size:
                                                            4096mb & File Image Only</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="enabled" value="0">
                                                    <input name="enabled" id="enabled" type="checkbox" value="1"
                                                        {{ old('enabled', 0) === 0 ? 'checked' : '' }}
                                                        data-bootstrap-switch>
                                                    <label for="enabled" class="text-danger ml-2">Default Enabled Slide
                                                        Show</label>
                                                    <div class="ml-auto pt-3">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-secondary">Clear</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kh" class="tab-pane fade show">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="title_kh" class="form-label">Title</label>
                                                    <input name="title_kh" id="title_kh" type="text"
                                                        class="@error('title_kh') is-invalid @enderror form-control"
                                                        placeholder="Enter Title">
                                                    @error('title_kh')
                                                        <div class="alert alert-danger">Please Input Title</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="subtitle_kh" class="form-label">Subtitle</label>
                                                    <input name="subtitle_kh" id="subtitle_kh" type="text"
                                                        class="@error('subtitle_kh') is-invalid @enderror form-control"
                                                        placeholder="Enter Subtitle">
                                                    @error('subtitle_kh')
                                                        <div class="alert alert-danger">Please Input Subtitle</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="text_kh" class="form-label">Text</label>
                                                    <textarea name="text_kh" id="text_kh" class="@error('text_kh') is-invalid @enderror form-control" rows="2"
                                                        placeholder="Enter Text ..."></textarea>
                                                    @error('text_kh')
                                                        <div class="alert alert-danger">Please Input Text</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img style="display: block;margin: auto;width: 50%;" id="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
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
