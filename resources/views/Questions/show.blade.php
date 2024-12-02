@extends('Layouts.layout')
@section('title')
Questions
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div  class="collapse navbar-collapse">
   @foreach ($question as $key)
        <ul class="navbar-nav">
            <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Question ID - {{$key->id}}</h4></a></li>
        </ul>
        </div>
        <a href="{{ route('questions.index') }}" class="btn btn-danger float-end">←</a></div>
         </nav>
<div class="card-body">
   
   <table class="table table-bordered">
    <tr>
        <td colspan="6" class="text-center"><strong>Question Details</strong></td>
    </tr>
    <tbody>
        <tr>
            {{-- <th>ID</th> --}}
            <th>Lesson Title</th>
            <th>Question Text</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <tr>
            {{-- <td >{{$key->id}}</td> --}}
            <td>{{$key->lesson->title}}</td>
            <td>{{$key->question_text}}</td>
            <td>{{$key->created_at}}</td>
            <td>{{$key->updated_at}}</td>
        </tr>
        @endforeach      
     </tbody>
</table>      
  
<table class="table table-bordered"> 
    <tr>
        <td colspan="6" class="text-center"><strong>Associated Answers</strong></td>
   </tr>
      <tbody> 
        <tr>
            <th>Q-ID</th>
            <th>ID</th>
            <th>Answer Text</th>
            <th>Type</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        @foreach($key->answers as $answer)
        @php
        if($answer->is_correct=='1'){
            $answer->is_correct="Correct";
        }else{
            $answer->is_correct ="InCorrect";
        }
    @endphp
        <tr>
            <td >{{$key->id}}</td>
            <td>{{$answer->id}}</td>
            <td>{{$answer->answer_text}}</td>
            <td>{{$answer->is_correct}}</td>
            <td>{{$answer->created_at}}</td>
            <td>{{$answer->updated_at}}</td>

        </tr>
        @endforeach      
    </tbody>
</table>   
                 
</div>
</div>
</div>
</div>
</div>
</div>


@endsection