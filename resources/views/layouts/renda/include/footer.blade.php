<footer class="footer">

@if(config('blog.social-footer', false))
<div class="footer-socials">
    @foreach(config('blog.social', []) as $c_n)
      <a href="{{ $c_n['link'] }}" target="_blank"><i class="fa fa-{{ $c_n['network'] }}"></i></a>
    @endforeach
</div>
@endif

  <div class="footer-bottom">
    <i class="fa fa-copyright"></i> Copyright 2017. All rights reserved.<br>
    Theme made by <a href="http://www.moozthemes.com">MOOZ Themes</a>
  </div>
</footer>

<!-- Bootstrap core JavaScript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="post/js/bootstrap.min.js"></script>
<script src="post/js/jquery.bxslider.js"></script>
<script src="post/js/mooz.scripts.min.js"></script>
</body>
</html>
