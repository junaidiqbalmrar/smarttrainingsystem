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
                <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Create Lesson</h4></a></li>
                
            </ul>
           </div>
            <a href="{{ route('lessons.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body">
 <form action="{{route('lessons.store')}}" method="POST">
        @csrf
       <div class="mb-3">
            <label for="level">Select Level</label><br>
            <select name="levelid" id="level" class="form-control @error('levelid') is-invalid @enderror">
                <option value="">Select Level</option>
                @foreach ($levels as $level)
                <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('levelid')
                    {{ $message }}
                @enderror
            </span>
        </div>
       <div class="mb-3">
           <label>Title</label><br>
           <input type="text" name="les_title" class="form-control @error('les_title') is-invalid @enderror" placeholder="Enter Lesson Title">
           <span class="text-danger">
                @error('les_title')
                    {{ $message }}
                @enderror
           </span>
       </div>
       <div class="mb-3">
            <label>Content</label><br>
            <input type="text" name="les_content" class="form-control @error('les_content') is-invalid @enderror" placeholder="Enter Lesson Content">
            <span class="text-danger">
                @error('les_content')
                  {{ $message }}
                @enderror
            </span>
        </div>
        

       <div class="mb-3">
        <button type="submit" class="btn btn-success">Save</button>
       </div>
     
    </nav>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection