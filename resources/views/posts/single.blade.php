@extends('layouts.renda.index')

@section('posts')

<article class="blog-post">
	<div class="blog-post-body" style="padding:0">
		<div class="row">
			<div class="col-xs-12">
				@if(!\Auth::guest())
				<a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-warning pull-right" style="color:white;margin-left:0.5rem"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				{!! Form::open([
					'method' => 'DELETE',
					'route' => ['post.destroy', $post->id]
					]) !!}
				<button type="submit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times" aria-hidden="true"></i></button>
				{!! Form::close() !!}
				@endif
			</div>
		</div>
		<h2 style="padding:0 20px"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a><br><small>{{ $post->subtitle }}</small></h2>
		<div class="post-meta">
			<span>by <a href="#">{{ $post->user->name }}</a></span>/
			<span><i class="fa fa-clock-o"></i>{{ $post->created_at->toFormattedDateString() }}</span>/
			<span><i class="fa fa-comment-o"></i> <a href="#">343</a></span>/
			<span>
				@foreach($post->categories as $c)
				<a href="#">{{ $c->title }}</a>
				@endforeach
			</span>
		</div>
		<div class="blog-post-image">
			<img src="{{ asset('post/images/750x500-1.jpg') }}" alt="">
		</div>
		<br>
		<div class="blog-post-text">
			<p>{!! nl2br(e($post->body)) !!}</p>
		</div>
		<div class="row">
			<div class="col-sm-12">

			</div>
			<div class="col-sm-12">
				<div class="row" id="comments">
					@component('layouts.renda.components.comment-form', ['post' => $post])
				  		@slot('title')
							Leave a comment
					  	@endslot
					@endcomponent

					@component('layouts.renda.components.comments', ['comments' => $post->comments])
					@endcomponent
				</div>
			</div>
		</div>
	</div>
</article>
@endsection
