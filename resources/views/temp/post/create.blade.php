@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">New post</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'post.store']) !!}
                        @include('temp.post.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
