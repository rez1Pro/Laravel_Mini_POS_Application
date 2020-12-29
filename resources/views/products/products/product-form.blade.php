@extends('layouts.main')
@section('page-title')
    {{ $page_title }}
@stop

@section('main_content')


    <div class="form-group">
        <div class="col-md-0"></div>
        <div class="container col-md-10">
            <div class="card border-dark mb-3">
                <div class="card-header text-success text-center">
                    <h3>{{ $page_title }}</h3>
                </div>

                <div class=" container col-md-11">

                    @if ($mode == 'edit')
                        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) !!}
                    @else
                        {!! Form::open(['route' => 'products.store', 'method' => 'post']) !!}
                    @endif

                    <div class="form-group col-md-12 mb-3">
                        <label for="title">Title <span class="text-danger">*</span> :</label>
                        {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Products Title']) }}
                        @foreach ($errors->get('title') as $error)
                            <span class="text-danger font-italic">{{ $error }}</span>
                        @endforeach
                    </div>

                    <div class="form-group col-md-12 mb-3">
                        <label for="description">Description <span class="text-danger">*</span> :</label>
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Describe about your Products']) }}
                        @foreach ($errors->get('description') as $error)
                            <span class="text-danger font-italic">{{ $error }}</span>
                        @endforeach
                    </div>

                    <div class="form-group col-md-12 mb-3">
                        <label for="category">Select A Category<span class="text-danger">*</span> :</label>
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category']) }}
                        @foreach ($errors->get('category') as $error)
                            <span class="text-danger font-italic">{{ $error }}</span>
                        @endforeach
                    </div>

                    <div class="form-row">
                        <div class=" form-group col-md-6 mb-3">
                            <label for="cost_price">Cost price <span class="text-danger">*</span> :</label>
                            {{ Form::text('cost_price', null, ['class' => 'form-control', 'id' => 'cost_price', 'placeholder' => 'Cost Price']) }}
                            @foreach ($errors->get('cost_price') as $error)
                                <span class="text-danger font-italic">{{ $error }}</span>
                            @endforeach
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="price">Sale Price <span class="text-danger">*</span> :</label>
                            {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Regular Price']) }}
                            @foreach ($errors->get('price') as $error)
                                <span class="text-danger font-italic">{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="float-right">
                        {{ Form::submit($button, ['class' => 'form-control btn btn-success mt-3 mb-3']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    @endsection
