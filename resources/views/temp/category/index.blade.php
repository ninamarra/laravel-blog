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

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Parent</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cat)

                                   <tr>
                                       <th scope="row">{{ $cat->id }}</th>
                                       <td>{{ $cat->title }}</td>
                                       <td>{{ $cat->category_id or '-' }}</td>
                                       <td><a href="{{ route('category.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a></td>
                                       <td>
                                           {!! Form::open([
                                               'method' => 'DELETE',
                                               'route' => ['category.destroy', $cat->id]
                                           ]) !!}
                                           {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                           {!! Form::close() !!}
                                       </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <h3>Add Category</h3>
                    <hr>

                    {!! Form::open(['route' => 'category.store']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title *', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label for="">Parent Category</label>
                            <select class="form-control" name="category_id">
                                <option>Chose one</option>
                                @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {!! Form::submit('Add', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
