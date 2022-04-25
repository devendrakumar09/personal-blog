@extends('Admin.Layout.app')
@section('css-file')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />    
@endsection
@section('main')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Articals</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.artical.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
        <a href="{{ route('admin.artical.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Show All</a>
      </div>      
    </div>
  </div>

  <form action="{{ route('admin.artical.update') }}" method="post">      
    @csrf
    @method('PUT');
  <div class="container col-sm-12 5">
    <div class="row align-items-center g-lg-5 py-5">      
        <div class="col-lg-7 text-center text-lg-start">
          <div class=" mb-3">
            <label for="category" class="fw-bolder">Category</label>
            @if (isset($categories) && $categories->count() > 0)
              <select name="category" id="category" class="form-control @error('title') is-invalid @enderror">
                <option value="" selected>Select</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}" @if($cat->id == $data->cat_id) {{ 'selected' }} @endif >{{$cat->title}}</option>
                @endforeach
              </select>
            @endif
            @error('category')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
            
          </div>

          <div class=" mb-3">
            <label for="title" class="fw-bolder">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{ $data->title }}">            
            @error('title')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

          </div>
          <div class=" mb-3">
            <label for="description" class="fw-bolder">Description</label>
            <textarea cols="10" rows="5" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ $data->description }}</textarea>                        
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror            
          </div>

          <div class=" mb-3">
            <label for="tags" class="fw-bolder">Select Tags</label>
            @if (isset($tags) && $tags->count() > 0)              
              <select name="tags[]" id="tags" class="form-control js-example-basic-multiple @error('tags') is-invalid @enderror " multiple>                
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}" >{{$tag->title}}</option>
                @endforeach
              </select>
            @endif
            @error('tags')
                <div class="text-danger small">{{ $message }}</div>
            @enderror            
          </div>

        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <div class="card mb-2" style="width: 18rem; height:16rem; overflow:hidden">
            <img src="{{asset('img/img-preview.jpg')}}" class="card-img-top" alt="..." style="width: 100%; height:100%;" accept="image/*" id="output" >            
          </div>
          <div class="">
            <input type="file" name="image" id="image" class="form-control" style="width: 18rem; overflow:hidden" onchange="loadFile(event)">            
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-sm-11 text-end">
          @if (Session::has('success'))          
            <span class="text-success small ">{{ Session::get('success') }} <i class="fa fa-check"></i></span>
          @endif
          @if (Session::has('fail'))
          
            <span class="text-danger small ">{{ Session::get('fail') }} <i class="fa fa-times"></i></span>
          @endif

          <button type="reset" class="btn btn-lg btn-warning">Reset</button>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-lg btn-success" type="submit">Save</button>
        </div>
    
    </div>
  </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>


@endsection