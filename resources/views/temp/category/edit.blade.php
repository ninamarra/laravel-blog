@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        @include('components.sidebar')

        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>

                <div class="panel-body">

                    @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    <hr>
                    <h3>Edit Category</h3>
                    <hr>

                    {!! Form::model($category, [
                        'method' => 'PATCH',
                        'route' => ['category.update', $category->id]
                    ]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title *', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select class="form-control" name="category_id">
                                <option>Chose one</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
