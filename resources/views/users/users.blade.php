@extends('layouts.main')
@section('page-title', 'Users | Welcome To Admin Control Panel')

@section('main_content')
    <!-- Page Heading -->
    <div class="container">
        <a href="{{ route('users.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add New</a>
        <h1 class="h3 mb-2 text-gray-800">Users List</h1>
    </div>

    <!------ Message View ----->
    @if (session('success_message'))
        <center class="alert alert-success">{{ session('success_message') }}</center>
    @elseif(session('delete_message'))
        <center class="alert alert-danger">{{ session('delete_message') }}</center>
    @endif

    <!---- Data Table ---->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="font-size:15px">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL NO.</th>
                        <th>Name</th>
                        <th>Group</th>
                        <th>Email</th>
                        <th>Phone/URL</th>
                        <th style="width:20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ optional($user->group)->title }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <form id="delete-form-{{ $user->id }}"
                                        action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="form-control btn-circle btn-info"><i class="fa fa-eye"></i>
                                        </a>

                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                            class="form-control btn-circle btn-success"><i class="fa fa-user-edit"></i>
                                        </a>

                                        <button onclick="return false" data-id="delete-form-{{ $user->id }}" id="delete"
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
