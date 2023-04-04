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
                                <h3 class="card-title flex-grow-1">Product List</h3>
                                <a class="btn btn-primary" href="{{ route('product.create') }}">Add Product</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Product Size</th>
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                        <th>Product Barcode</th>
                                        <th>Sub Category</th>
                                        <th>Product Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $product->prod_name }}</td>
                                            <td>{{ $product->prod_description }}</td>
                                            <td>{{ $product->prod_size }}</td>
                                            <td>{{ $product->prod_qty }}</td>
                                            <td>${{ $product->prod_price }}</td>
                                            <td>
                                                <img src="data::image/png;base64,{{ DNS1D::getBarcodePNG($product->prod_barcode, 'C39') }}"
                                                    height="60" width="180" />
                                            </td>
                                            @foreach ($subcategories as $subcategory)
                                                @if ($subcategory->id == $product->sub_cat_id)
                                                    <td>{{ $subcategory->sub_cat_name }}</td>
                                                @endif
                                            @endforeach
                                            <td style="width: 5%"><img class="img-fluid img-thumbnail"
                                                    src="/imageproduct/{{ $product->img }}" alt="{{ $product->img }}">
                                            </td>
                                            <td style="width: 10%">
                                                <a href="{{ route('product.edit', $product->id) }}">
                                                    <i class="fas fa-pen-to-square mx-1"></i>
                                                </a>

                                                <a
                                                    href="{{ route('product.custom', ['id' => $product->id, 'command' => 'prod_status']) }}">
                                                    <i
                                                        class="fas {{ $product->prod_status == 1 ? ' fa-eye ' : ' fa-eye-slash ' }} mx-1"></i>
                                                </a>

                                                <a href="{{ url('delete-product/' . $product->id) }}"
                                                    class="text-danger mx-1"
                                                    onclick="return confirm('Are you sure delete this record id #{{ $product->id }}?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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
            $('#product').DataTable({
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
