@extends('Layouts.layout')

@section('title')
    <h5>Questions For Lesson - {{$l_Details->title}}</h5>
@endsection
@section('content')
    <div id="quiz-container" class="container">
        <div class="py-3 mt-4 ">
            <div class="row py-3">
                <div class="col-md-12">

                       <h3>{{ $quiz_Q2->question_text }}</h3>
           
                       <form method="POST" action="{{ route('qSubmit') }}">
                           @csrf
                           <input type="hidden" name="question_id" value="{{ $quiz_Q2->id }}">
           
                           @foreach($quiz_Q2->answers as $answer)
                               <label>
                                   <input type="radio" name="answer_id" value="{{ $answer->id }}" class="mt-3" required>
                                   {{ $answer->answer_text }}
                               </label><br>
                           @endforeach
                               <div class="text-center mt-3">
                               <button type="submit" class="btn btn-info">Submit Answer</button>
                               </div>
                       </form>

        @if(session('feedback'))
                <div id="status-message" style="margin-top: 15px; font-weight: bold; color: {{ session('feedback') == 'Correct' ? 'green' : 'red' }}">
                    {{ session('feedback') }}
                </div>
            @endif
    </div>
    </div>
    </div>   
    </div>
    @endsection   
