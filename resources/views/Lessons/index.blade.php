@extends('Layouts.layout')
@section('title')
    Lessons
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
         @session('status')
         <div class="alert alert-success">
            {{session('status')}}
        </div> 
     @endsession
            <div class="card">
                <div class="card-header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div  class="collapse navbar-collapse">
   
        <ul class="navbar-nav">
            <li class="nav-itm"> <a class="navbar-brand"><h4>Lessons</h4></a></li>
            <li class="nav-itm"> <a class="nav-link" href="{{route('lessons.create')}}">Create</a></li>
            {{-- <li class="nav-itm"> <a class="nav-link" {{--href="/createlevels"}}>Update</a></li>
            <li class="nav-itm"> <a class="nav-link" {{--href="/createlevels"}}>Delete</a></li> --}}
        </ul>
    </div>
</nav>   
</nav>
<div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            {{-- <th>Lesson ID</th>
            <th>Level ID</th> --}}
            <th>Level Name</th>
            <th>Lesson Title</th>
            <th>Lesson Content</th>
            {{-- <th>Lesson CreatedOnDate</th> --}}
            {{-- <th>Lesson Updated At</th> --}}
            <th>Operations</th>
            
        </tr>
    </thead>
        @foreach($lessons as $id=>$value)
            <tr>
            {{-- <td>{{ $value->id }}</td>
            <td>{{ $value->level_id }}</td> --}}
            <td>{{$value->level->level_name}}</td>
            <td>{{$value->title}}</td>
            <td>{{$value->content}}</td>
             {{-- <td>{{$value->created_at}}</td> --}}
             {{-- <td>{{$value->updated_at}}</td> --}}
             <td>
                <a href="{{ route('lessons.edit', $value->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('lessons.show', $value->id) }}" class="btn btn-warning btn-sm">Details</a>
                <form id="deleteForm-{{ $value->id }}" action="{{ route('lessons.destroy', $value->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
{{$lessons -> links()}}
</div>
</div>
</div>
</div>
</div>
</div>

@endsection