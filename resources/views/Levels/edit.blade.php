@extends('Layouts.layout')
@section('title')
    Levels
@endsection

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div  class="collapse navbar-collapse">
       
            <ul class="navbar-nav">
                <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Edit Level</h4></a></li>
            </ul>
            </div>
            <a href="{{ route('levels.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body"> 
     @foreach ($level as $key => $id )
 <form action="{{route('levels.update',$id->id)}}" method="POST">
        @csrf
        @method('PUT')
      
            
        
        <div class="mb-3">
            <label>ID</label><br>
            <input type="text" name="l_id" class="form-control" value="{{$id->id}}">
           </div>
       <div class="mb-3">
           <label>Name</label><br>
           <input type="text" name="l_name" class="form-control" value="{{$id->level_name}}">
       </div>
       {{-- <div class="mb-3">
        <label>Created At</label><br>
        <input type="text" name="l_createdat" class="form-control" value="{{$id->created_at}}">
    </div> --}}
    {{-- <div class="mb-3">
        <label>Updated At</label><br>
        <input type="text" name="l_updatedat" class="form-control" value="{{$id->updated_at}}">
    </div> --}}
       <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
       </div>

   
    </form>     @endforeach
</div>
</div>
</div>
</div>
</div>
</div>


@endsection