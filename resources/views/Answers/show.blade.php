@extends('Layouts.layout')
@section('title')
    Answers
@endsection
@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div  class="collapse navbar-collapse">
        @foreach ($answers as $key => $id )
        <ul class="navbar-nav">
             <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Answer ID - {{$id->id}}</h4></a></li> 
        </ul>
        </div>
        <a href="{{ route('answers.index') }}" class="btn btn-danger float-end">←</a></div>
         </nav>
<div class="card-body">

<form action="{{route('answers.store')}}" method="POST">
    @csrf
    {{-- <div class="mb-3">
        <label>ID</label><br>
        <input type="text" name="id" class="form-control" value="{{$id->id}}" readonly>
       </div> --}}
    <div class="mb-3">
        <label>Question</label><br>
        <input type="text" name="qid" class="form-control" value="{{$id->question->question_text}}" readonly>
       </div>
   <div class="mb-3">
       <label>Answer Text</label><br>
       <input type="text" name="anstext" class="form-control" value="{{$id->answer_text}}" readonly>
   </div>
   @php
   if($id->is_correct=='1'){
        $id->is_correct="Correct";
   }else{
        $id->is_correct ="InCorrect";
   }
@endphp
    <div class="mb-3">
        <label>Type</label><br>
        <input type="text" name="ansiscorrect" class="form-control" value="{{$id->is_correct}}" readonly>
    </div>
    <div class="mb-3">
        <label>Created At</label><br>
        <input type="text" name="ansiscorrect" class="form-control" value="{{$id->created_at}}" readonly>
    </div>
    <div class="mb-3">
        <label>Updated At</label><br>
        <input type="text" name="ansiscorrect" class="form-control" value="{{$id->updated_at}}" readonly>
    </div>
  
 
</nav>
</form> @endforeach
@php
    //print_r($lesson)
@endphp
</div>
</div>
</div>
</div>
</div>
</div>

@endsection