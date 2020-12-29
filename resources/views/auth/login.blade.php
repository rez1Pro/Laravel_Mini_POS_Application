@extends('layouts.auth.auth')
@section('content')
    <div class="container">
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <div class="user">
                                            {!! Form::open(['route' => 'login.confirm', 'method' => 'post']) !!}
                                            <div class="form-group">
                                                {{ Form::email('email', null, ['class' => 'form-control form-control-user', 'id' => 'exampleInputEmail', 'aria-describedby' => 'emailHelp', 'placeholder' => 'Enter Email Address...']) }}
                                                @foreach ($errors->get('email') as $error)
                                                    <span class="text-danger font-italic">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                {{ Form::password('password', ['class' => 'form-control form-control-user', 'id' => 'exampleInputPassword', 'placeholder' => 'Enter Password']) }}
                                                @foreach ($errors->get('password') as $error)
                                                    <span class="text-danger font-italic">{{ $error }}</span>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" name="remember" class="custom-control-input"
                                                        id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            {{ Form::submit('Login', ['class' => 'btn btn-primary btn-user btn-block']) }}
                                            </a>
                                            <hr>
                                            <a href="{{ route('login.google') }}" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="{{ route('login.facebook') }}"
                                                class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a>
                                            </a>
                                            <a href="{{ route('login.github') }}"
                                                class="btn btn-success btn-user btn-block">
                                                <i class="fab fa-github fa-fw"></i> Login with Github
                                            </a>
                                            {!! Form::close() !!}
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('login.forget-password') }}">Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
