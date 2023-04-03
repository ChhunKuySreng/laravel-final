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
                                <a class="btn btn-primary" href="{{ route('category.create') }}">Add Slide Show</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="category" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category ID</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $category->cat_id }}</td>
                                            <td>{{ $category->cat_name }}</td>
                                            <td>{{ $category->cat_description }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"><i
                                                        class="fas fa-pen-to-square mx-1"></i></a>
                                                <a href="{{ url('delete-category/' . $category->id) }}"
                                                    class="text-danger mx-1"
                                                    onclick="return confirm('Are you sure delete this record id #{{ $category->id }}?')"><i
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
@section('head')
@endsection
@section('script')
    <script>
        $(function() {
            $('#category').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                select: true,
            });
        });
    </script>
@endsection
