<aside>

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
    About me
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
