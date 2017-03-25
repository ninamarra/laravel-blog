@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <p class="text-uppercase">{{ $post->category->title }}</p>
                        <h2>
                            {{ $post->title }}
                            <br><small>
                                {{ $post->subtitle }}
                            </small>
                        </h2>
                    </div>
                    <p>Post by {{ $post->user->name }}</p>
                    <p>{!! nl2br(e($post->body)) !!}</p>
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        </div>
                        <div class="col-md-1">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['category.destroy', $post->id]
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-10">
                            <p class="pull-right">Created at <b>{{ $post->created_at->toFormattedDateString() }}</b></p>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
