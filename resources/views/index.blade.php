@extends('app')
@section('main')
  


  <div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom">
        Articals
      </h3>

      <div class="row">
        @if (isset($articals) && $articals->count() > 0)
          @foreach ($articals as $artical)
            <div class="col-md-6 ">
              <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 " style="background-image: url({{ Storage::disk('local')->url($artical->image_path)}});" >
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">                  
                  <h4 class="pt-5 mt-5 mb-4 fw-bold"><a href="{{route('blog-details',$artical->slug)}}" class="text-white">{{ucfirst($artical->title)}}</a></h4>
                  
                  <ul class="d-flex list-unstyled mt-auto">                    
                    <li class="d-flex align-items-center me-3">                      
                      <small>{{$artical->getcategory->title}}</small>
                    </li>
                    <li class="d-flex align-items-center">
                      <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                      <small>{{$artical->created_at->format('M d')}}</small>
                    </li>
                  </ul>
                </div>
              </div>              
            </div>              
          @endforeach
          
        @endif        
      </div>

      <nav class="blog-pagination mt-5" aria-label="Pagination">
        {{$articals->links()}}
      </nav>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="fst-italic">About</h4>
          <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Categories</h4>
          <ol class="list-unstyled mb-0">
            @if (isset($categories) && $categories->count() > 0)
              @foreach ($categories as $cat)
                <li><a href="{{route('categories',$cat->slug)}}">{{$cat->title}}</a></li>
              @endforeach              
            @else
            {{'No Data Found'}}
            @endif
          </ol>
        </div>       
      </div>
    </div>

@endsection