@extends('Layouts.layout')
@section('title')
Lessons 
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
                {{-- <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Edit Lesson</h4></a></li> --}}
            </ul>
            </div>
            <a href="{{ route('lessons.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body">
    @foreach ($lesson as $key => $id )
        
   
 <form action="{{route('lessons.update', $id->id )}}" method="POST">
        @csrf
        @method('PUT')
        {{-- <div class="mb-3">
            <label>ID</label><br>
            <input type="text" name="les_id" class="form-control" value="{{$id->id}}">
           </div> --}}
        <div class="mb-3">
            <label>Level ID</label><br>
            <input type="text" name="levelid" class="form-control" value="{{$id->level_id}}">
           </div>
       <div class="mb-3">
           <label>Title</label><br>
           <input type="text" name="les_title" class="form-control" value="{{$id->title}}">
       </div>
       <div class="mb-3">
        <label>Content</label><br>
        <input type="text" name="les_content" class="form-control" value="{{$id->content}}">
    </div>
       <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
       </div>
     
      @endforeach
  
    </form>
</nav>
</div>  
</div>
</div>
</div>
</div>
</div>


@endsection