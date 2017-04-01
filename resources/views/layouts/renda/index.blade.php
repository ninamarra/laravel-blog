@include('layouts.renda.include.header')

@include('layouts.renda.include.navbar')

<div class="container">
  @include('layouts.renda.components.heading')
  <section>
    <div class="row">
      @if(config('blog.layout.right-sidebar', true) == true)
      <div class="col-md-8">
        @section('posts')
          @yield('content')
        @show
      </div>

      <div class="col-md-4 sidebar-gutter">
        @include('layouts.renda.include.sidebar')
      </div>

      @else
      <div class="col-md-4 sidebar-gutter">
        @include('layouts.renda.include.sidebar')
      </div>

      <div class="col-md-8">
        @section('posts')
          @yield('content')
        @show
      </div>

      @endif
</div>

@include('layouts.renda.include.footer')
