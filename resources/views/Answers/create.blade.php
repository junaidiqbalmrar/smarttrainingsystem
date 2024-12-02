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
                            
                                <ul class="navbar-nav">
                                    <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Create New Answer</h4></a></li> 
                                </ul>
                            </div>
                                <a href="{{ route('answers.index') }}" class="btn btn-danger float-end">←</a></div>
                        </nav>
<div class="card-body">

 <form action="{{route('answers.store')}}" method="POST">
        @csrf
       <div class="mb-3">
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
        </div>
        <div class="mb-3">
           <label>Answer Text</label><br>
           <input type="text" name="anstext" class="form-control @error('anstext')is-invalid @enderror" placeholder="Enter Answer Text">
           <span class="text-danger">
                @error('anstext')
                    {{$message}}
                @enderror
           </span>
       </div>
       <div class="mb-3">
            <label>Is Corrrect</label><br>
            <select name="ansiscorrect" id="ansiscorrect" class="form-control @error('ansiscorrect') is-invalid @enderror" > 
                <option class="form-control " value="">Select Option</option> 
                <option class="form-control" value="1">Correct Answer</option>
                <option class="form-control" value="0">In Correct Answer</option>
            </select>
            <span class="text-danger">
                @error('ansiscorrect')
                 {{$message}}
                @enderror
            </span>
        </div>
        

        <div class="mb-3">
             <button type="submit" class="btn btn-primary">Save</button>
        </div>
     
     
    </nav>
  
</div>
</div>
</div>
</div>
</div>
</div>


@endsection