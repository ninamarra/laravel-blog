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

                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Leave a comment
                            </div>
                            <div class="panel-body">
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
                            </div>
                        </div>
                    </div>

                    <div class="row" id="comments">
                        @foreach($post->comments as $c)
                            <div class="col-xs-10 col-xs-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <p>"{{ $c->body }}"</p>
                                        <p>by <b>{{ $c->name or 'anon' }}</b></p>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                @if($c->approved == true)
                                                    <button class="btn btn-sm btn-success" disabled>Approved</button>
                                                @else
                                                    <a href="{{ route('comment.approve', $c->id) }}" class="btn btn-sm btn-info">Approve</a>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['comment.destroy', $post->id]
                                                ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-sm-8 text-right">{{ $c->created_at->toFormattedDateString() }}</div>
                                        </div>
                                    </div>
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
