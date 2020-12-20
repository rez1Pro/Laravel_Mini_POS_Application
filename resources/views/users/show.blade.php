@extends('layouts.main')
@section('page-title', 'Users | Welcome To Admin Control Panel')

@section('main_content')
    <!-- Page Heading -->
    <div class="container-4">
        <a href="{{ route('users.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> New payment
        </a>
        <a href="{{ route('users.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> New Sale
        </a>
        <a href="{{ route('users.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> New
            Purchase </a>
        <a href="{{ route('users.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i> New Receipt
        </a>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-info">
        <i class="fa fa-arrow-left"></i> Back</a>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-0"></div>
            <div class="container col-md-8">
                <div class="card border-dark mb-3">
                    <div class="card-header text-success text-center">
                        <h3>{{ $user->name }}'s Information : </h3>
                    </div>
                    <div class="card-body text-dark">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">Group :</th>
                                <td>{{ $user->group->title }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Name : </th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Email :</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Phone :</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Address :</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
