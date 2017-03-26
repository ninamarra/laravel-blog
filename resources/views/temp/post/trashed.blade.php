@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @include('components.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{ route('post.create') }}" class="btn btn-success">New</a>
                    @foreach ($posts as $p)
                    <hr>
                    <div class="text-center">
                        <p class="text-uppercase">
                        @foreach($p->categories as $c)
                            {{ $c->title }}
                        @endforeach
                        </p>
                        <h2>
                            <p>{{ $p->title }}</p>
                            <br><small>
                                {{ $p->subtitle }}
                            </small>
                        </h2>
                    </div>
                    <p>{!! nl2br(e($p->body)) !!}</p>
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{ route('post.restore', $p->id) }}" class="btn btn-sm btn-info">Restore</a>
                        </div>
                        <div class="col-md-1">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['post.delete', $p->id]
                            ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-10">
                            <p class="pull-right">Created at <b>{{ $p->created_at->toFormattedDateString() }}</b></p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
