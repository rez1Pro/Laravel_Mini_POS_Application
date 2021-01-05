@extends('layouts.main')
@section('page-title', 'Users | Welcome To Admin Control Panel')
@section('main_content')
    <!-- Page Heading -->
    <div class="container">
        <a href="{{ route('users.index') }}" class="float-left btn btn-sm btn-info">
            <i class="fa fa-arrow-left"></i> Back</a>

        <div class="container">
            <div class="float-right">
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#purchase"><i
                        class="fa fa-plus"></i>
                    New
                    Purchase
                </button>

                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#sale"><i class="fa fa-plus"></i>
                    New Sale
                </button>

                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#receipt"><i class="fa fa-plus"></i>
                    New
                    Receipt
                </button>

                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#payment"><i class="fa fa-plus"></i>
                    New
                    payment
                </button>
            </div>
        </div>
        <br>
        <br>
        <h2 class="text-success text-center font-italic"><span class="text-info">{{ optional($user->group)->title }}
            </span>:
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
                        aria-controls="v-pills-reciepts" aria-selected="false">Receipts</a>
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
                        @include('users.partials._payments')
                    </div>

                    <div class="tab-pane fade" id="v-pills-reciepts" role="tabpanel" aria-labelledby="v-pills-reciepts-tab">
                        @include('users.partials._receipts')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modals are include here --}}
    {{-- Payment Modal --}}
    <x-modal id="payment" title="Add New Payment">
        <x-form.form action="{{ route('payments.create') }}" userId="{{ $user->id }}" adminId="{{ Auth::user()->id }}">
        </x-form.form>
    </x-modal>
    {{-- Receipt Modal --}}
    <x-modal id="receipt" title="Add New Receipts">
        <x-form.form action="{{ route('receipts.store') }}" userId="{{ $user->id }}" adminId="{{ Auth::user()->id }}">
        </x-form.form>
    </x-modal>
    {{-- Sale Modal --}}
    <x-modal id="sale" title="Add New Sale">
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <label for="date">Date </label>
            <input type="date" id="date" placeholder="date" class="form-control" name="date" required>
            <br>
            <label for="challan_no">Challan-No </label>
            <input type="number" id="challan_no" placeholder="Challan No." class="form-control" name="challan_no" required>
            <br>
            <div class="form-group">
                <label for="note">Note </label>
                <textarea class="form-control" name="note" id="note" rows="3"
                    placeholder="Write a short note ......."></textarea>
            </div>
            <input type="hidden" value="{{ $user->id }}" name="user_id">
            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
            <br>
            <input type="submit" value="Pay Now" class="form-control alert-info">
        </form>
    </x-modal>
@stop
