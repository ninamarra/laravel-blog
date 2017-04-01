<!-- sidebar-widget -->
<div class="sidebar-widget">
  <h3 class="sidebar-title">{{ $title }}</h3>
  <div class="widget-container widget-about">
    <a href="#"><img src="{{ asset('post/images/author.jpg') }}" alt="{{ $name }}"></a>
    <h4>{{ $name }}</h4>
    <p>{{ $slot }}</p>
  </div>
</div>
