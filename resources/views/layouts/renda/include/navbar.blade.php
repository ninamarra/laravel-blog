<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">

      <ul class="nav navbar-nav">
        @foreach(config('pages', []) as $c_page)
          <li><a href="{{ route($c_page['link'] )}}">{{ $c_page['title'] }}</a></li>
        @endforeach
      </ul>

      @if(config('blog.social-footer', false))
      <ul class="nav navbar-nav navbar-right">
         @foreach(config('blog.social', []) as $c_n)
          <li><a href="{{ $c_n['link'] }}" target="_blank"><i class="fa fa-{{ $c_n['network'] }}"></i></a></li>
         @endforeach
         @if(!\Auth::guest())
         <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                 Olá, {{ Auth::user()->name }} <span class="caret"></span>
             </a>

             <ul class="dropdown-menu" role="menu">
               <li><a href="#">Painel <i class="fa fa-tachometer pull-right" aria-hidden="true"></i></a></li>
               <li>
                 <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout <i class="fa fa-sign-out pull-right" aria-hidden="true"></i>
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   {{ csrf_field() }}
                 </form>
               </li>
             </ul>
         </li>
         @endif
      </ul>
      @endif

    </div>
    <!--/.nav-collapse -->
  </div>
</nav>
