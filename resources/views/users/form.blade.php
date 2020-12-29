@extends('layouts.main')
@section('page-title')
    {{ $page_title }}
@stop

@section('main_content')
    <div class="container">
        <div class="row border">
            <div class="container col-sm-8">
                <h1 class="text-success text-center">{{ $headline }}</h1>

                @if ($mode == 'edit')
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                @else
                    {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}
                @endif
                <div class="col-sm-10">
                    <label for="group">Select A Group<span class="text-danger">*</span> :</label>
                    {{ Form::select('group_id', $groups, null, ['class' => 'form-control', 'id' => 'group']) }}
                    @foreach ($errors->get('group') as $error)
                        <span class="text-danger font-italic">{{ $error }}</span>
                    @endforeach
                </div>

                <div class="col-sm-10">
                    <label for="name">Full Name <span class="text-danger">*</span> :</label>
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Type Your Full-Name']) }}
                    @foreach ($errors->get('name') as $error)
                        <span class="text-danger font-italic">{{ $error }}</span>
                    @endforeach
                </div>

                <div class="col-sm-10">
                    <label for="email">Email<span class="text-danger">*</span> :</label>
                    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'example@example.com']) }}
                    @foreach ($errors->get('email') as $error)
                        <span class="text-danger font-italic">{{ $error }}</span>
                    @endforeach
                </div>

                <div class="col-sm-10">
                    <label for="phone">Phone<span class="text-danger">*</span> :</label>
                    {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '+880**********']) }}
                    @foreach ($errors->get('phone') as $error)
                        <span class="text-danger font-italic">{{ $error }}</span>
                    @endforeach
                </div>

                <div class="col-sm-10">
                    <label for="address">Address<span class="text-danger">*</span> :</label>
                    {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Type Your Full-address']) }}
                    @foreach ($errors->get('address') as $error)
                        <span class="text-danger font-italic">{{ $error }}</span>
                    @endforeach
                </div>

                <div class="col-sm-10">
                    {{ Form::submit($button, ['class' => 'form-control btn btn-success mt-3 mb-3']) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
