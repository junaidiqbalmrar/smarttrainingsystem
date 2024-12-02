@extends('Layouts.layout')

@section('title')
    <h5>Questions For Lesson - {{$lessonQuestions['title']}}</h5>
@endsection
@section('content')
<div class="container">
    <div class="row py-5">  
        @php
        $qcount = 1;
        @endphp
        @if (count($lessonQuestions['questions'])>0)

        <form action="{{route('quiz.submit')}}" method="POST" onsubmit="return isValid()">
        @csrf 
        <input type="hidden" name="lesson_id" id="" value="{{$lessonQuestions['id']}}">
       
        @foreach ($lessonQuestions['questions'] as $key)
                    <div>
                        <h6 >Q.No.{{$qcount++}}-{{$key['question_text']}}</h6><br>
                        <input type="hidden" name="q[]" value="{{$key['id']}}">
                        <input type="hidden" name="ans_{{$qcount-1}}" id="ans_{{$qcount-1}}">
                            <ol type="A">
                             @foreach($key['answers'] as $answer)
                                <li> <input type="radio" name="radio_{{$qcount-1}}" value="{{$answer['id']}}" data-id="{{$qcount-1}}" class="selectAns"> {{$answer['answer_text']}}</li><br>
                             @endforeach    
                            </ol> 
                     </div>
                             @endforeach
                             <div class="text-center">
                             <input type="submit" id="" class="btn btn-info">
                             </div>
                    </form>
        @else
        <h3>No Questions</h3>
        @endif
                     </div>  
                </div>   
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
         
                <script>
                    $(document).ready(function(){
                        $('.selectAns').click(function(){
                            var no = $(this).attr('data-id');
                            $('#ans_' + no).val($(this).val());
                            
                        });
                    });

                    function isValid(){
                         var result = true;
                         var qLength = parseInt("{{$qcount}}")-1;
                         $('.error_msg').remove();
                         //alert(qLength);
                         for(let i=1 ; i<=qLength ; i++){
                             if($('#ans_'+i).val()==""){
                                 var result = false;
                                 $('#ans_'+i).parent().append('<span style="color:red;" class="error_msg">Please Selecte Answer</span>');
                                 setTimeout(() => {
                                    $('.error_msg').remove();
                                 }, 5000);
                            }

                        }
                        return result;
                    }
                     


                </script>
  @endsection   
