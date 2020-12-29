@extends('layouts.main')
@section('page-title', 'Group | Welcome to Admin Control Panel')

@section('modal-btn')
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#One"><span><i
                class="fa fa-plus"></i>Add New</span>
    </button>
@endsection
@section('target-id', 'One')
@section('modal-title', 'Create A New User Group')
@section('modal-content')
    <div>
        <form action="{{ route('group') }}" method="POST">
            @csrf
            <label for="group">Type Your Group Name:</label>
            <input type="text" id="group" placeholder="Group Name"
                class="form-control {{ $errors->get('title') ? 'is-invalid' : '' }}" name="title">
            @foreach ($errors->get('title') as $error)
                <span class="text-danger font-italic">{{ $error }}</span>
            @endforeach
            <br>
            <input type="submit" value="Save Now" class="form-control alert-info">
        </form>
    </div>
@stop

@section('main_content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users Group</h1>


    <!------ Message View ----->
    @if (session('success_message'))
        <center class="alert alert-success">{{ session('success_message') }}</center>
    @elseif(session('delete_message'))
        <center class="alert alert-danger">{{ session('delete_message') }}</center>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users Group</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL NO.</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $group)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $group->title }}</td>
                                <td>
                                    <form id="delete-form-{{ $group->id }}"
                                        action="{{ route('group.destroy', ['id' => $group->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return false" data-id="delete-form-{{ $group->id }}" id="delete"
                                            class="form-control btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop
