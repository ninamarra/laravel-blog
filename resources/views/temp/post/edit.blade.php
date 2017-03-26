@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Update post</div>
                <div class="panel-body">
                    {!! Form::model($post, [
                        'method' => 'PATCH',
                        'route' => ['post.update', $post->id]
                    ]) !!}
                        @include('temp.post.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
