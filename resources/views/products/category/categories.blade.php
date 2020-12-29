@extends('layouts.main')
@section('page-title', 'Categories | Welcome To Mini Point Of Sale')

@section('main_content')
    <!-- Page Heading -->
    <div class="container">
        <a href="{{ route('categories.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add
            New</a>
        <h1 class="h3 mb-2 text-gray-800">Categories List</h1>
    </div>

    <!-- DataTales Example -->
    @if (session('success_message'))
        <center class="alert alert-success">{{ session('success_message') }}</center>
    @elseif(session('delete_message'))
        <center class="alert alert-danger">{{ session('delete_message') }}</center>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" style="font-size:15px">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">SL NO.</th>
                            <th>Name</th>
                            <th style="width:20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <form id="delete-form-{{ $category->id }}"
                                            action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                                class="form-control btn-circle btn-success"><i class="fa fa-edit"></i>
                                            </a>

                                            <button onclick="return false" data-id="delete-form-{{ $category->id }}" id="delete"
                                                class="form-control btn-circle btn-danger"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @stop
