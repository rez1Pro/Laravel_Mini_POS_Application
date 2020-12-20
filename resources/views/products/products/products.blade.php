@extends('layouts.main')
@section('page-title', 'Products | Welcome To Mini Point Of Sale')

@section('main_content')
    <!-- Page Heading -->
    <div class="container">
        <a href="{{ route('products.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add New</a>
        <h1 class="h3 mb-2 text-gray-800">Products List</h1>
    </div>

    <!------ Message View ----->
    @if (session('success_message'))
        <center class="alert alert-success">{{ session('success_message') }}</center>
    @elseif(session('delete_message'))
        <center class="alert alert-danger">{{ session('delete_message') }}</center>
    @endif

    <!---- Data Table ---->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="font-size:15px">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Cost-Price</th>
                        <th>Price</th>
                        <th style="width:20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->cost_price }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('products.show', ['product' => $product->id]) }}"
                                            class="form-control btn-circle btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                        <a href="{{ route('products.edit', ['product' => $product->id]) }}"
                                            class="form-control btn-circle btn-success"><i class="fa fa-edit"></i>
                                        </a>

                                        <a onclick="return confirm('Are You Serious!')"
                                            href="{{ route('products.destroy', ['product' => $product->id]) }}"
                                            class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop
