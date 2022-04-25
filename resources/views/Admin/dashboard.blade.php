@extends('Admin.Layout.app')
@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>        
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-10 mx-auto">
        <div class="row">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body bg-success text-white">          
                <div class="counter text-end">
                  <span>{{$articals->count()}}</span>
                </div>
                  <h5 class="fw-bolder">Articals</h5>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card bg-primary text-white">
              <div class="card-body ">          
                <div class="counter text-end">
                  <span>{{$categories->count()}}</span>
                </div>
                  <h5 class="fw-bolder">Categories</h5>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="card bg-info text-white">
              <div class="card-body ">          
                <div class="counter text-end">
                  <span>{{$tags->count()}}</span>
                </div>
                  <h5 class="fw-bolder">Tags</h5>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>
        
@endsection