@extends('layouts.main')
@section('page-title')
    {{ $page_title }}
@stop

@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-md-0"></div>
            <div class="container col-md-8">
                <div class="card border-dark mb-3">
                    <div class="card-header text-success text-center">
                        <h3>{{ $page_title }}</h3>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="container col-sm-12">

                                @if ($mode == 'edit')
                                    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' =>
                                    'put']) !!}
                                @else
                                    {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
                                @endif

                                <div class="col-sm-12">
                                    <label for="title">Category <span class="text-danger">*</span> :</label>
                                    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Type A Category Name']) }}
                                    @foreach ($errors->get('title') as $error)
                                        <span class="text-danger font-italic">{{ $error }}</span>
                                    @endforeach

                                    <div class="float-right">
                                        {{ Form::submit($button, ['class' => 'form-control btn btn-success mt-3 mb-3']) }}
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endsection
