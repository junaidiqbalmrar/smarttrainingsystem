
@extends('Layouts.layout')
@section('title')
    Levels
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
            <li class="nav-itm"> <a class="navbar-brand"><h3>Levels</h3></a></li>
            <li class="nav-itm"> <a class="nav-link" href="{{route('levels.create')}}">Create</a></li>
        </ul>
        </div>
         </nav>   

</nav>

<div class="card-body">
 
<table class="table table-stiped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        @foreach($levels as $level)
        <tr>
            <td>{{ $level->id }}</td>
            <td>{{ $level->level_name }}</td>
             <td>
                <a href="{{route('levels.edit', $level->id )}}" class="btn btn-warning btn-sm ">Edit</a>
                <a href="{{ route('levels.show', $level->id) }}" class="btn btn-warning btn-sm ">Details</a>
                <form id="deleteForm-{{ $level->id }}" action="{{ route('levels.destroy', $level->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $level->id }})" class="btn btn-danger btn-sm ">Delete</button>
                </form>
                
            </td> 
        </tr>
        @endforeach
    </tbody>

</table>
{{$levels -> links()}}
</div> 
</div>
</div>
</div>
</div>
</div>

@endsection