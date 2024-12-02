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
   @foreach ($lesson as $key)
        <ul class="navbar-nav">
            <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Lesson - {{$key->title}}</h4></a></li>
        </ul>
        </div>
        <a href="{{ route('lessons.index') }}" class="btn btn-danger float-end">←</a></div>
         </nav>
<div class="card-body">
   
   <table class="table table-bordered">
    <tr>
        <td colspan="6" class="text-center"><strong>Lesson Details</strong></td>
    </tr>
    <tbody>
        <tr>
            <th>ID</th>
            <th>Level Name</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        <tr>
            <td >{{$key->id}}</td>
            <td>{{$key->level->level_name}}</td>
            <td >{{$key->title}}</td>
            <td >{{$key->content}}</td>
            <td>{{$key->created_at}}</td>
            <td>{{$key->updated_at}}</td>
        </tr>
        @endforeach      
     </tbody>
</table>      
<table class="table table-bordered">
    <tr>
        <td colspan="6" class="text-center"><strong>Associated Questions</strong></td>
   </tr>
      <tbody> 
        <tr>
            <th>Question ID</th>
            <th>Question Text</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        
        @foreach($key->questions as $question)
        <tr>
            <td >{{$question->id}}</td>
            <td>{{$question->question_text}}</td>
            <td>{{$question->created_at}}</td>
            <td>{{$question->updated_at}}</td>
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