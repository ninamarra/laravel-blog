<aside>
@if (\Auth::guest())
  <div class="sidebar-widget">
    <div class="widget-container">
      <a href="{{ route('login') }}">Login</a> / <a href="{{ route('register') }}">Register</a>
    </div>
  </div>
@endif

<form>
  <div class="form-group">
    <div class="input-group">
      <input type="text" class="form-control" id="exampleInputAmount" placeholder="Search" />
      <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
    </div>
  </div>
  <br>
</form>

@component('layouts.renda.components.simple-text')
  @slot('title')
    About me
  @endslot

  @slot('name')
    Author's name
  @endslot

  While everyone’s eyes are glued to the runway, it’s hard to ignore that there are major fashion moments on the front row too.
@endcomponent

@component('layouts.renda.components.post-list', ['comp_posts' => $posts])
  @slot('title')
    Recent
  @endslot

  @slot('name')
    Author's name
  @endslot

  While everyone’s eyes are glued to the runway, it’s hard to ignore that there are major fashion moments on the front row too.
@endcomponent

@component('layouts.renda.components.categories', ['categories' => $categories])
  @slot('title')
    Categories
  @endslot
@endcomponent

@component('layouts.renda.components.social', ['networks' => config('blog.social', [])])
  @slot('title')
    Social
  @endslot
@endcomponent

</aside>
