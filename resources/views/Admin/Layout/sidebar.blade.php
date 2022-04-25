<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="min-height: 570px;">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.category.index')}}">
            <span data-feather="file"></span>
            Category
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.tag.index')}}">
            <span data-feather="shopping-cart"></span>
            Tags
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.artical.index')}}">
            <span data-feather="users"></span>
            Artical
          </a>
        </li>        
      </ul>      
    </div>
  </nav>