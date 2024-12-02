@extends('Layouts.layout')
@section('title')
    Lessons For Level {{$lessons->level_name}}
@endsection
@section('content')
<div class="container">
    <div class="row py-5">
        {{--$status--}}
        
            {{--$key->id}}-{{$key->name}}-{{$key->email}} <br>
            
               ID - {{$item->status}}-Lesson ID - {{$item->lesson_id}} --}}
            
        @foreach ($lessons->lessons as $lesson)
                       <div class="col-md-4">
                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$lesson->title}}</h4>
                                <p class="card-text">{{$lesson->content}}</p>

                                <hr>
                                @foreach ($status as $key )
                                @php
                                    $attempt = false;
                                @endphp
                                @foreach ($key->progress as $item)

                                @if ($lesson->id == $item->lesson_id)
                                @php
                                    $attempt = true;
                                @endphp
                                @endif

                                @endforeach
                                @endforeach

                                @if ($attempt==true)
                                <span class="badge bg-success tick">✓</span>
                                <!-- div class="progress mt-1 mb-1">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div -->
                                <a href="{{route('user.results',$lesson->id)}}" class="btn btn-danger btn-sm text-center" > Results</a>                    
                                @endif
                                

                                {{--  --}}

                                 <a href="{{route('level.progress', $lesson->id)}}" class="btn btn-warning btn-sm text-center">Start Quiz</a> 
                                
                                 @session('error')
                                <div class="alert alert-success">
                                {{session('error')}}
                                </div> 
                                @endsession

                                @if(session()->has('progress_lesson') && session('progress_lesson') == $lesson->id && session()->has('status'))
                                <div class="alert alert-success mt-3 mb-1">
                                {{session('status')}}
                                </div> 
                                @endif

                                @if(session()->has('progress_level') && session('progress_level') == $lesson->id && session()->has('err'))
                                <div class="alert alert-success mt-3 mb-1">
                                {{session('err')}}
                                </div> 
                                @endif

                                @if(session()->has('completed_lesson') && session('completed_lesson') == $lesson->id && session()->has('competion_status'))
                                <div class="alert alert-success mt-3 mb-1">
                                {{ session('competion_status') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div >
            </div>
  @endsection   

