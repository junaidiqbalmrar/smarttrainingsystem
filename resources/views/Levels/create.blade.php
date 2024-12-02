@extends('Layouts.layout')
@section('title')
    Levels
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
                <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>Create Level</h4></a></li>
            </ul>
            </div>
            <a href="{{ route('levels.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body">
 <form action="{{route('levels.store')}}" method="POST">
        @csrf
        {{-- <div class="mb-3">
            <label>ID</label><br>
            <input type="text" name="levelid" class="form-control" placeholder="Enter Id">
           </div> --}}
       <div class="mb-3">
           <label>Name</label><br>
           <input type="text" name="levelname" class="form-control @error('levelname') is-invalid @enderror"  placeholder="Enter Level Name">
           <span class="text-danger">
            @error('levelname')
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