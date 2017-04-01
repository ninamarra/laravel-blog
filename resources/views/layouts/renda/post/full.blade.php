@extends('layouts.renda.index')

@section('content-container')

@foreach ($posts as $p)
<article class="blog-post">
  <div class="blog-post-image">
    <a href="post.html"><img src="images/750x500-1.jpg" alt=""></a>
  </div>
  <div class="blog-post-body">
    <h2><a href="post.html">Vintage-Inspired Finds for Your Home</a></h2>
    <div class="post-meta"><span>by <a href="#">Jamie Mooze</a></span>/<span><i class="fa fa-clock-o"></i>March 14, 2015</span>/<span><i class="fa fa-comment-o"></i> <a href="#">343</a></span></div>
    <p>ew months ago, we found ridiculously cheap plane tickets for Boston and off we went. It was our first visit to the city and, believe it or not, Stockholm in February was more pleasant than Boston in March. It probably has a lot to do with the fact that we arrived completely unprepared. That I, in my converse and thin jacket, did not end up with pneumonia is honestly not even fair.</p>
    <div class="read-more"><a href="#">Continue Reading</a></div>
  </div>
</article>
@endforeach

@endsection
