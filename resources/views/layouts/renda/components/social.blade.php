<!-- sidebar-widget -->
<div class="sidebar-widget">
  <h3 class="sidebar-title">{{ $title }}</h3>
  <div class="widget-container">
    <div class="widget-socials">
      @foreach($networks as $comp_n)
        <a href="{{ $comp_n['link'] }}"><i class="fa fa-{{ $comp_n['network'] }}"></i></a>
      @endforeach
    </div>
  </div>
</div>
