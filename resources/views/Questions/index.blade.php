@extends('Layouts.layout')
@section('title')
    Questions
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
    
<nav class="navbar navbar-expand-lg navbar-light bg-light " >
    <div  class="collapse navbar-collapse">
   
        <ul class="navbar-nav">
            <li class="nav-itm"> <a class="navbar-brand" ><h4>Questions</h4></a></li>
            <li class="nav-itm"> <a class="nav-link" href="{{route('questions.create')}}">Create</a></li>
        </ul>
    </div>  
</nav>
<div class="card-body">
<table class="table table-bordered table-stiped">
    <thead>
        <tr>
            <th>Lesson Name</th>
            <th>Question Text</th>
            <th>Operations</th>  
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $value)
            <td>{{$value->lesson->title}}</td>
            <td>{{$value->question_text}}</td>
            <td>
                <a href="{{ route('questions.edit', $value->id) }}" class="btn btn-warning btn-sm  ">Edit</a>
                <a href="{{ route('questions.show', $value->id) }}" class="btn btn-warning btn-sm ">Details</a>
                 <form id="deleteForm-{{$value->id}}" action="{{ route('questions.destroy', $value->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button"  onclick="confirmDelete({{ $value->id }})" class="btn btn-danger btn-sm ">Delete</button>
                </form> 
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
{{$questions->links()}}
</div> 
</div>
</div>
</div>
</div>
</div>
@endsection