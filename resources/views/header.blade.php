  
<div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="link-secondary" href="{{ route('about') }}">ABOUT</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="/">Personal Blog</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">          
          @if (Route::has('login'))              
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
          @endif
          
        </div>
      </div>
    </header>
    @if (isset($tags) && $tags->count() > 0)
      <div class="nav-scroller py-1 mb-2">      
        <nav class="nav d-flex justify-content-between">
          @foreach ($tags as $tag )
            <a class="p-2 link-secondary" href="{{ route('tag',$tag->slug) }}">{{ucfirst($tag->title)}}</a>  
          @endforeach
        </nav>
      </div>
    @else      
    @endif
  </div>