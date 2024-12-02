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
       @foreach ($level as $key)
            <ul class="navbar-nav">
                <li class="nav-itm justify-content-center"> <a class="navbar-brand"><h4>LEVEL - {{$key->level_name}}</h4></a></li>
            </ul>
            </div>
            <a href="{{ route('levels.index') }}" class="btn btn-danger float-end">←</a></div>
             </nav>
<div class="card-body">
       
       <table class="table table-bordered">
        <tr>
            <td colspan="4" class="text-center"><strong>Level Details</strong></td>
        </tr>
        <tbody>
            <tr>
                <th>Level ID</th>
                <th>Level Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            <tr>
                <td >{{$key->id}}</td>
                <td>{{$key->level_name}}</td>
                <td>{{$key->created_at}}</td>
                <td>{{$key->updated_at}}</td>
            </tr>
            @endforeach      
        {{-- </tbody>
    </table>      
      
    <table class="table table-bordered"> --}}
        <tr>
            <td colspan="4" class="text-center"><strong>Associated Lessons</strong></td>
       </tr>
       {{--   <tbody> --}}
            <tr>
                <th>Lesson Title</th>
                <th>Lesson Content</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            @foreach($key->lessons as $lesson)
            <tr>
                <td >{{$lesson->title}}</td>
                <td>{{$lesson->content}}</td>
                <td>{{$lesson->created_at}}</td>
                <td>{{$lesson->updated_at}}</td>
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