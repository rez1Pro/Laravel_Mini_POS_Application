@extends('layouts.auth.auth')
@section('content')
    <div class="container col-md-6 mt-5 border">
        <!--Section: Block Content-->
        <section class="mb-5 text-center">

            <h1>Set a new password</h1>

            <form action="{{ route('reset.confirm') }}" method="POST">
                @csrf

                <div>
                    <label for="newPass">Verification Code</label>
                    <input type="number" id="newPass" name="code"
                        class="form-control @error('code') is-invalid @enderror  @error('code') is-invalid @enderror ">
                    @error('code')
                        <span class="text-danger font-italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="newPass">New password</label>
                    <input type="password" id="newPass" name="password"
                        class="form-control @error('password') is-invalid @enderror ">
                    @error('password')
                        <span class="text-danger font-italic">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="newPassConfirm">Confirm password</label>
                    <input type="password" id="newPassConfirm" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror ">
                    @error('password_confirmation')
                        <span class="text-danger font-italic">{{ $message }}</span>
                    @enderror
                </div><br>
                <button type="submit" class="btn btn-primary mb-4">Reset Now</button>
            </form>

        </section>
        <!--Section: Block Content-->
    </div>
@stop
