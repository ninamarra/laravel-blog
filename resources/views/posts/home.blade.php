@extends('layouts.renda.index')

@section('posts')

@foreach ($posts as $p)
<article class="blog-post">
  <div class="blog-post-image">
    <a href="{{ route('post.show', $p->id) }}"><img src="{{ asset('post/images/750x500-1.jpg') }}" alt=""></a>
  </div>
  <div class="blog-post-body">
    <div class="post-meta text-uppercase">
      @foreach($p->categories as $c)
        <span><a href="#">{{ $c->title }}</a></span>
      @endforeach
    </div>
    <h2><a href="{{ route('post.show', $p->id) }}">{{ $p->title }}</a><br><small>{{ $p->subtitle }}</small></h2>
    <div class="post-meta">
      <span>by <a href="#">{{ $p->user->name }}</a></span>/
      <span><i class="fa fa-clock-o"></i>{{ $p->created_at->toFormattedDateString() }}</span>/
      <span><i class="fa fa-comment-o"></i> <a href="/post/{{ $p->id }}#comments">{{ $p->comments_count }}</a></span>
    </div>
    <p>{!! nl2br(e(str_limit($p->body, $limit = 300, $end = '...'))) !!}</p>
    <div class="read-more"><a href="{{ route('post.show', $p->id) }}">{{ config('blog.read-more', 'Continue Reading') }}</a></div>
  </div>
</article>
@endforeach

@endsection