@extends('layouts.backend.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Slideshow List</h3>
                                <a class="btn btn-primary" href="{{ route('slideshow.create') }}">Add Slide Show</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="slidershow" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title En</th>
                                        <th>Title Kh</th>
                                        <th>Subtitle En</th>
                                        <th>Subtitle Kh</th>
                                        <th>Text En</th>
                                        <th>Text Kh</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slideshows as $slideshow)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $slideshow->title_en }}</td>
                                            <td>{{ $slideshow->title_kh }}</td>
                                            <td>{{ $slideshow->subtitle_en }}</td>
                                            <td>{{ $slideshow->subtitle_kh }}</td>
                                            <td>{{ $slideshow->text_en }}</td>
                                            <td>{{ $slideshow->text_kh }}</td>
                                            <td><a href="{{ $slideshow->link }}">{{ $slideshow->link }}</a></td>
                                            <td style="width: 5%"><img class="img-fluid img-thumbnail"
                                                    src="/imageslideshow/{{ $slideshow->img }}"
                                                    alt="{{ $slideshow->img }}"></td>
                                            <td style="width: 10%">
                                                <a
                                                    href="{{ route('slideshow.custom', ['id' => $slideshow->id, 'command' => 'up', 'order' => $slideshow->order]) }}"><i
                                                        class="fas fa-arrow-up mx-1"></i></a>

                                                <a
                                                    href="{{ route('slideshow.custom', ['id' => $slideshow->id, 'command' => 'down', 'order' => $slideshow->order]) }}"><i
                                                        class="fas fa-arrow-down mx-1"></i></a>

                                                <a
                                                    href="{{ route('slideshow.custom', ['id' => $slideshow->id, 'command' => 'enabled', 'order' => 1]) }}"><i
                                                        class="fas {{ $slideshow->enabled == 1 ? ' fa-eye ' : ' fa-eye-slash ' }} mx-1"></i></a>

                                                <a href="{{ route('slideshow.edit', $slideshow->id) }}"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>

                                                <a href="{{ url('delete-slideshow/' . $slideshow->id) }}"
                                                    class="text-danger mx-1"
                                                    onclick="return confirm('Are you sure delete this record id #{{ $slideshow->id }}?')"><i
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
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            $('#slidershow').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
