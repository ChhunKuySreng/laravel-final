@extends('layouts.backend.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="card-title flex-grow-1">Sub Category List</h3>
                                <a class="btn btn-primary" href="{{ route('subcategory.create') }}">Add Sub Category</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="subcategory" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub Category Name</th>
                                        <th>Category Name</th>
                                        <th>Sub Category Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $subcategory)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $subcategory->sub_cat_name }}</td>
                                            @foreach ($categories as $category)
                                                @if ($category->id == $subcategory->cat_id)
                                                    <td>{{ $category->cat_name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $subcategory->sub_cat_description }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $subcategory->id) }}"><i
                                                        class="fas fa-pen-to-square mx-1"></i></a>
                                                <a href="{{ url('delete-subcategory/' . $subcategory->id) }}"
                                                    class="text-danger mx-1"
                                                    onclick="return confirm('Are you sure delete this record id #{{ $subcategory->id }}?')"><i
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
            $('#subcategory').DataTable({
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
