@extends('app')
@section('main')
  <div class="row g-5">
    <div class="col-md-8 mt-5">
      <article class="blog-post mt-5">
        <h2 class="blog-post-title">{{ucfirst($data->title)}}</h2>
        <p class="blog-post-meta">{{$data->created_at->format('M d Y')}} by <strong>{{'Admin'}}</strong></p>
        <p>{{ucfirst($data->description)}}</p>
        <p>
          @if ($data->getTags)
            @foreach ($data->getTags as $tag )
              <a class="btn btn-outline-secondary" href="{{ route('tag',$tag->slug) }}">{{ucfirst($tag->title)}}</a>  
            @endforeach
          @endif
        </p>
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