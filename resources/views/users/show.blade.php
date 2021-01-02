@extends('layouts.main')
@section('page-title', 'Users | Welcome To Admin Control Panel')

@section('main_content')
    <!-- Page Heading -->
    <div class="container">
        <a href="{{ route('users.index') }}" class="float-left btn btn-sm btn-info">
            <i class="fa fa-arrow-left"></i> Back</a>
        <div class="float-right">
        @section('modal-btn')
            <a class="btn btn-sm btn-success float-right ml-1" data-toggle="modal" data-target="#payment"><i
                    class="fa fa-plus"></i>
                New
                payment
            </a>
        @stop
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> New Sale
        </a>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> New
            Purchase </a>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> New Receipt
        </a>
    </div>
    <br>
    <br>
    <h2 class="text-success text-center font-italic"><span class="text-info">{{ $user->group->title }} </span>:
        {{ $user->name }}
    </h2>
    <hr>
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills shadow" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-user-info-tab" data-toggle="pill" href="#v-pills-user-info"
                    role="tab" aria-controls="v-pills-user-info" aria-selected="true">User-Info</a>

                <a class="nav-link" id="v-pills-sales-tab" data-toggle="pill" href="#v-pills-sales" role="tab"
                    aria-controls="v-pills-sales" aria-selected="false">Sales</a>

                <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase" role="tab"
                    aria-controls="v-pills-purchase" aria-selected="false">Purchases</a>

                <a class="nav-link" id="v-pills-payments-tab" data-toggle="pill" href="#v-pills-payments" role="tab"
                    aria-controls="v-pills-payments" aria-selected="false">Payments</a>

                <a class="nav-link" id="v-pills-reciepts-tab" data-toggle="pill" href="#v-pills-reciepts" role="tab"
                    aria-controls="v-pills-reciepts" aria-selected="false">Reciepts</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">

                <div class="tab-pane fade show active" id="v-pills-user-info" role="tabpanel"
                    aria-labelledby="v-pills-user-info-tab">
                    @include('users.partials._user-info')
                </div>

                <div class="tab-pane fade" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab">
                    @include('users.partials._sales')</div>

                <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">
                    @include('users.partials._purchase')</div>

                <div class="tab-pane fade" id="v-pills-payments" role="tabpanel" aria-labelledby="v-pills-payments-tab">
                    @include('users.partials._payments')</div>

                <div class="tab-pane fade" id="v-pills-reciepts" role="tabpanel" aria-labelledby="v-pills-reciepts-tab">
                    @include('users.partials._receipts')</div>
            </div>
        </div>
    </div>
</div>
@stop
