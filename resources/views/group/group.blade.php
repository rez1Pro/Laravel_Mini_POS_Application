@extends('layout.main')
@section('page-title', 'User Group page')

@section('modal-button', 'Add New Group')
@section('data-target', 'One')
@section('target-id', 'One')
@section('modal-title', 'Create A New User Group')
@section('modal-content')
    <div>
        <form action="{{ url('/group') }}" method="POST">
            @csrf
            <label for="group">Type Your Group Name:</label>
            <input type="text" id="group" placeholder="Group Name" class="form-control" name="title"> <br>
            <input type="submit" value="Save Now" class="form-control alert-info">
        </form>
    </div>
@stop

@section('main_content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Users Group</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    @if(session('message'))
    <center class="alert-success container col-6">{{ session('message')}}</center>
    @endif
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
                        <?php $i = 1;  ?>
                        @foreach($data as $value)
                        <tr>
                        <td>{{$i++}}</td>
                            <td>{{ $value->title }}</td>
                            <td>
                            <form action="{{ url('group/'.$value->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <input onclick="return confirm('Are You Serious!')" type="submit" value="Delete" class="form-control btn btn-danger">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @stop
