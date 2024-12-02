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
            <a href="{{ route('answers.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body">
    @foreach ($answers as $key => $id )
        
   
 <form action="{{route('answers.update',$id->id)}}" method="POST">
        @csrf
        @method('PUT')
        {{-- <div class="mb-3">
            <label for="question">Select Question</label>
                <select name="qid" id="qid" class="form-control @error('qid') is-invalid @enderror" > 
                    <option class="form-control " value="">Select Question</option> 
                    @foreach ($questions as $qtext)  
                    <option class="form-control" value="{{$qtext->id}}">{{$qtext->question_text}}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('qid')
                        {{ $message }}
                    @enderror
                </span>
        </div> --}}
        <div class="mb-3">
            <label>Question ID</label><br>
            <input type="text" name="qid" class="form-control" value="{{$id->question_id}}">
           </div> 
       <div class="mb-3">
           <label>Answer Text</label><br>
           <input type="text" name="anstext" class="form-control" value="{{$id->answer_text}}">
       </div>
       <div class="mb-3">
        <label>Is Corrrect</label><br>
        <input type="text" name="ansiscorrect" class="form-control" value="{{$id->is_correct}}">
    </div>
       <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
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