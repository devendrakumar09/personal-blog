@extends('Admin.Layout.app')
@section('css-file')
    
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
  <div class="mt-2 mb-2">
    @if (Session::has('success'))
            <hr>
            <span class="text-success small ">{{ Session::get('success') }} <i class="fa fa-check"></i></span>
          @endif

    @if (Session::has('fail'))
            <hr>
            <span class="text-danger small ">{{ Session::get('fail') }} <i class="fa fa-times"></i></span>
    @endif
  </div>
  <div class="table-responsive ">
    <table class="table table-striped table-sm  border px-5">
      <thead>
        <tr>          
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Category</th>
          <th scope="col">Tags</th>
          <th scope="col">Date</th>          
          <th scope="col">Action</th>          
          
        </tr>
      </thead>
      <tbody>
        @if (isset($data) && $data->count() > 0)
        
          @foreach ($data as $artical)
            <tr>            
              <td>{{$artical->title}}</td>
              <td>{{$artical->description}}</td>
              <td>{{$artical->getCategory->title}}</td>
              <td>
                @if ($artical->getTags->count() > 0)
                    @foreach ($artical->getTags as $tag)
                        <span class="btn btn-outline-primary btn-sm small" style="font-size:10px;">{{$tag->title}}</span>
                    @endforeach
                @endif
              </td>
              <td>{{$artical->created_at->format('d M Y')}}</td>
              <td><a href="{{ route('admin.artical.edit',$artical->id) }}" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a></td>
              <td>                                
                
                <form action="{{ route('admin.artical.destroy',$artical->id) }}" method="post" >
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                </form>                
              </td>
              
            </tr>                    
          @endforeach          
          <tr class="">
            <td colspan="7" align="center ">
              <div class="p-3">{{$data->links()}}</div>
            </td>
          </tr>
        @else
          
        @endif
        

      </tbody>
    </table>
  </div>    
@endsection