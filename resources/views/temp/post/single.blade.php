@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <p class="text-uppercase">
                            @foreach($post->categories as $c)
                                {{ $c->title }}
                            @endforeach
                        </p>
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
                                'route' => ['post.destroy', $post->id]
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-10">
                            <p class="pull-right">Created at <b>{{ $post->created_at->toFormattedDateString() }}</b></p>
                        </div>
                    </div>
                    <hr>

                    <h3>Leave a comment</h3>

                    {!! Form::open(['route' => ['comment.store', $post->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('site', 'Site', ['class' => 'control-label']) !!}
                        {!! Form::text('site', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email *', ['class' => 'control-label']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Comment *', ['class' => 'control-label']) !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Save comment', ['class' => 'btn btn-primary pull-right', 'required' => 'required']) !!}

                    {!! Form::close() !!}

                    <div class="row" id="comments">
                        <br>
                        @foreach($post->comments as $c)
                        <div class="col-sm-12 media">
                            <div class="media-body">
                            <h4 class="media-heading">{{ $c->name }}</h4>
                            {{ $c->body }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
