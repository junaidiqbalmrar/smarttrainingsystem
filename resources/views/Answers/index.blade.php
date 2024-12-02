@extends('Layouts.layout')
@section('title')
    Answers
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-17">
            
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
            <li class="nav-itm"> <a class="navbar-brand"><h4>Answers</h4></a></li>
            <li class="nav-itm"> <a class="nav-link" href="{{route('answers.create')}}">Create</a></li>
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
            
           <th>Question Text</th> 
            <th>Answer Text</th>
            <th>Type</th>
            <th>Operations</th>
            
        </tr>
    </thead>
         @foreach($answers as $id=>$value)
            <tr>
            <td>{{ $value->question->question_text }}</td> 
            <td>{{$value->answer_text}}</td>
            @php
            if($value->is_correct=='1'){
                 $value->is_correct="Correct";
            }else{
                 $value->is_correct ="InCorrect";
            }
         @endphp
            <td>{{$value->is_correct}}</td>
             <td>
                <a href="{{ route('answers.edit', $value->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <a href="{{ route('answers.show', $value->id) }}" class="btn btn-warning btn-sm">Details</a>
                <form id="deleteForm-{{$value->id}}" action="{{ route('answers.destroy', $value->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td> 
        </tr>
        @endforeach 
    </tbody>
</table>
 {{$answers -> links()}}
</div>
</div>
</div>
</div>
</div>
</div>

@endsection