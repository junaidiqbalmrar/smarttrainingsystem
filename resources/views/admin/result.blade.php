@extends('Layouts.layout')

@section('title')
    Result Page
@endsection

@section('content')
    <div class="container text-center">
            <div class="row py-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h3 class="card-title">{{Auth::user()->id}}-{{Auth::user()->name}}</h3>  --}}
                            <h5>Result Of Lesson - {{$lesson->title}}</h5>
                            <hr>
                            @php
                                $correct = 0;
                                $incorrect = 0;
                                $qCount = count($results);                               
                            @endphp
                            @if ($qCount)
                            @foreach($results as $result)                              
                                @if($result->status==1)
                                @php
                                    $correct++;
                                @endphp  
                                @else
                                @php
                                     $incorrect++;
                                @endphp
                                @endif
                                <!--echo "<br>". $result->id ." " . $result->user_id ." ".  $result->lesson_id ." " .  $result->question_id . " " .  $result->answer_id . " ".$result->status."<br>"; -->
                            @endforeach
                            {{-- echo "<br>" . "Correct : ".$correct." Incorrect : ".$incorrect. " ";  --}}
                            <p class="card-text">Correct Answers : {{$correct}}</p>
                            <p class="card-text">Incorrect Answers : {{$incorrect}}</p>
                            {{--$qCount--}}
                            @php
                             $correct_Marks = $correct * 10 ;
                             $incorrect_Marks = $incorrect * 5; 
                             $total = $correct_Marks - $incorrect_Marks ;
 
                            $remarks = " ";
                                $percentage = ($correct/$qCount)*100;
                                if($percentage>=90){
                                 $remarks .= "Excellent";
                                }else if($percentage>=70&&$percentage<=90){
                                 $remarks .= "Nice";
                                }else if($percentage>=50&&$percentage<=70){
                                 $remarks .= "Passed";
                                }else{
                                 $remarks .= "Failed";
                                }
                            @endphp
                            {{--$percentage%--}}
                            <a class="btn btn-info btn-sm text-center" href="{{--route('questions',++$id)--}}" >{{$total}}</a>
                            <a class="btn btn-info btn-sm text-center" href="{{--route('questions',++$id)--}}" >{{$remarks}}</a>
                            @else
                            <p class="card-text"> No Results Found ! </p>
                            @endif
                        </div>

                 </div>
             </div>
         </div>
     </div>
@endsection