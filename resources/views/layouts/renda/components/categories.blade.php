<!-- sidebar-widget -->
<div class="sidebar-widget">
  <h3 class="sidebar-title">{{ $title }}</h3>
  <div class="widget-container">
    <ul class="text-capitalize">
      @foreach($categories as $comp_category)
        <li style="list-style-type:none"><a href="#">{{ $comp_category->title }}</a></li>
      @endforeach
    </ul>
  </div>
</div>
