<!-- sidebar-widget -->
<div class="sidebar-widget">
  <h3 class="sidebar-title">{{ $title }}</h3>
  <div class="widget-container">
    @for ($i = 0; $i < 3; $i++)
      @if(isset($comp_posts[$i]))
        <article class="widget-post">
          <div class="post-image">
            <a href="{{ route('post.show', $comp_posts[$i]->id) }}"><img src="{{ asset('post/images/90x60-1.jpg') }}" alt=""></a>
          </div>
          <div class="post-body">
            <h2><a href="{{ route('post.show', $comp_posts[$i]->id) }}">{{ $comp_posts[$i]->title }}</a></h2>
            <div class="post-meta">
              <span><i class="fa fa-clock-o"></i> {{ $comp_posts[$i]->created_at->toFormattedDateString() }}</span>
              <span><a href="/post/{{ $comp_posts[$i]->id }}#comments"><i class="fa fa-comment-o"></i> {{ $comp_posts[$i]->comments_count or 0}}</a></span>
            </div>
          </div>
        </article>
      @endif
    @endfor
  </div>
</div>
