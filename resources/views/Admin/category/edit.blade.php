@extends('Admin.Layout.app')
@section('css-file')
    
@endsection
@section('main')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Add New</a>
        <a href="{{ route('admin.category.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Show All</a>
      </div>      
    </div>
  </div>


  <div class="container col-sm-12 5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Edit Category</h1>       

        <p class="col-lg-10 ">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('admin.category.update',$data->id) }}" method="POST">
            @csrf
            @method('PUT')
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" value="{{ $data->title }}">
            <label for="title">Title</label>
            @error('title')
                <div class="text-danger small">{{ $message }}</div>
            @enderror

          </div>
          <div class="form-floating mb-3">
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" value="{{ $data->description }}">
            <label for="description">Description</label>
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
          </div>          
          <button class="w-100 btn btn-lg btn-success" type="submit">Update</button>
          @if (Session::has('success'))
            <hr>
            <span class="text-success small ">{{ Session::get('success') }} <i class="fa fa-check"></i></span>
          @endif

          @if (Session::has('fail'))
            <hr>
            <span class="text-danger small ">{{ Session::get('fail') }} <i class="fa fa-times"></i></span>
          @endif
        </form>
      </div>
    </div>
  </div>
@endsection