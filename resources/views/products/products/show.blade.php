@extends('layouts.main')
@section('page-title', 'Products | Welcome To Mini POS')

@section('main_content')
    <!-- Page Heading -->
    <div class="container-4">
        <a href="{{ route('products.index') }}" class="float-left btn btn-sm btn-info">
            <i class="fa fa-arrow-left"></i> Back</a>
        <div class="float-right">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                New
                payment
            </a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> New Sale
            </a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> New
                Purchase </a>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> New Receipt
            </a>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-md-0"></div>
            <div class="container col-md-10">
                <div class="card border-dark mb-3">
                    <div class="card-header text-success text-center">
                        <h3>Products Information : </h3>
                    </div>
                    <div class="card-body text-dark">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-right">Title :</th>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Description: </th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Category :</th>
                                <td>{{ $product->category->title }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Cost Price :</th>
                                <td>{{ $product->cost_price }}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Price :</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
