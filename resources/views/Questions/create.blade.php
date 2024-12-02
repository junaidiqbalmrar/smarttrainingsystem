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
       
            <ul class="navbar-nav">
                <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Create Question</h4></a></li>
            </ul>
            </div>
            <a href="{{ route('questions.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body">
    
 <form action="{{route('questions.store')}}" method="POST">
        @csrf

        {{-- <div class="mb-3">
            <label>ID</label><br>
            <input type="text" name="q_id" class="form-control" placeholder="Enter ID">
           </div> --}}
        
       <div class="mb-3">
           <label>Question Text</label><br>
           <input type="text" name="q_text" class="form-control @error('q_text') is-invalid @enderror" placeholder="Enter Question Text">
           <span class="text-danger">@error('q_text')
               {{$message}}
           @enderror</span>
       </div>
       {{-- <div class="mb-3">
            <label>Lesson ID</label><br>
            <input type="text" name="l_id" class="form-control @error('l_id') is-invalid @enderror" placeholder="Enter Level ID">
            <span class="text-danger">@error('l_id')
                {{ $message }}
            @enderror</span>
           </div> --}}

           <div class="mb-3">
            <label for="lesson">Select Lesson</label><br>
            <select name="lessonid" id="lesson" class="form-control @error('lessonid') is-invalid @enderror">
                <option value="">Select Lesson</option>
                @foreach ($lessons as $lesson)
                    <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('levelid')
                    {{ $message }}
                @enderror
            </span>
        </div>
       {{-- <div class="mb-3">
        <label>Created At</label><br>
        <input type="text" name="q_cretedat" class="form control" placeholder="Enter Question Created On Date">
    </div>
    <div class="mb-3">
        <label>Updated At</label><br>
        <input type="text" name="q_cretedat" class="form control" placeholder="Enter Updated On Date">
    </div> --}}
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Save</button>
       </div>
     
  
    </form>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection