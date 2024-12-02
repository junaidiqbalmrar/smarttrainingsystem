<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Progress;
use App\Models\ResultModel;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use function Laravel\Prompts\progress;

class QuizController extends Controller
{   
    public function showLevel(){
        
        $level = Level::all();
        //return $level;
        return view('admin.users',[
            'levels'=>$level, 
        ]);
    }
    
    public function showLesson(string $id){
       //return $id;
        $levelLesson = Level::with('lessons')->find($id);
        //return $levelLesson->level_name;
        $attemptedLessons = User::where('id', Auth::id())->with('progress')->get();
        //return $attemptedLessons;
        return view('admin.lessons',[
            'lessons'=>$levelLesson,
            'status'=>$attemptedLessons
        ]);
    }
    public function checkLevel(string $id){
        $lessonId = Lesson::find($id);
        //return $lessonId->id;
        $previous_level = Level::where("id","<",$lessonId->level_id)
                            ->orderBy("id","desc")
                            ->first();
        //return $previous_level;      
       
       $first_level = !$previous_level;
       
       if($first_level){
            //$msg = "first Level Lessons " ; 
            return redirect()->route('lessonprogress', $lessonId->id);
       }else{
        $lesson_level = Lesson::where('level_id',$previous_level->id)->distinct()->count('id');
        //return $lesson_level;
        $level_progress = Progress::where('user_id',Auth::id())->where('level_id',$previous_level->id)->distinct()->count('lesson_id');
        if($lesson_level==$level_progress){
            $msg = "access" ;
            return redirect()->route('lessonprogress', $lessonId->id);
        }else{
            $msg = "No Access : Complete $previous_level->level_name Level First !";
            session()->put('progress_level', $lessonId->id);
            return redirect()->route('lessons.questions', ['id' => $lessonId->level_id])->with("err",$msg);
        }
        //return $level_progress;
    }
    }

    public function checkProgress(string $id){
        
       // return $progress;
        $lessonId = Lesson::find($id);
        //return $lessonId->id;
        $pre_Lesson = Lesson::where('id', '<', $id)
                    ->where('level_id', $lessonId->level_id)
                    ->orderBy('id', 'desc')
                    ->first();
                    
        // return $pre_Lesson;
                    
        $firstLesson = !$pre_Lesson;
        if($firstLesson){
            //$msg = "First Lesson";
            //return $msg;
            return Redirect()->route('qShow',['id'=>$id]);        
        }else{
        $progress = Progress::where('lesson_id',$pre_Lesson->id)
                    ->where('user_id',Auth::id())
                    ->orderBY('lesson_id','desc')
                    ->first();
                    //return $progress;             
                if(!$progress ){
                    $msg = "No Access";
                    //return $msg;
                    $status = $msg . " - Attempt $pre_Lesson->title Lesson Quiz First To Access This And Next Lessons Quizs ! ";
                   //return $status;
                    session()->put('progress_lesson', $lessonId->id);
                    return redirect()->route('lessons.questions', ['id' => $lessonId->level_id])->with('status', $status);
                }else{
                    //$msg = "Access";
                    //return $msg;
                    return Redirect()->route('qShow',['id'=>$id]); 
                }
        }   
    }
    public function showQuestions(string $id){
        $lessonQuestions = Lesson::with('questions')->with('answer')->find($id);
        //return $lessonQuestions;
        return view('Admin.quiz',['lessonQuestions'=>$lessonQuestions]);
    }

    public function submitQuiz(Request $request) {
   
        //return $request;
        $qCount = count($request->q); 
        $level = Lesson::find($request->lesson_id);
       // return $level;
        $levelid = $level->level_id;
       // return $levelid;


        $quiz = Question::with('answers')->where('lesson_id', $request->lesson_id)->get();
       //return $quiz;

        $quizCount = count($quiz); 
        $correct = 0; 
        $incorrect = 0; 
    
        if ($qCount > 0 && $quizCount > 0) {
            for ($i = 0; $i < $qCount; $i++) {
                $qId = $request->q[$i]; 
                $aId = $request->input('ans_'.$i + 1);
                //echo $qId . " " . $aId ;
                foreach ($quiz as $q) {
                    if ($qId == $q->id) {
                       // return $q->id;
                        foreach ($q->answers as $a) {
                            if ($aId == $a->id) {
                                if ($a->is_correct == 1) {
                                    $correct++;
                                    //return $correct;
                                } else {
                                    $incorrect++;
                                }
                            }
                        }
                    }
                }
            }  
                // echo "[" . $aId . "][" . $qId . "]";
                 $message = " Correct: " . $correct . " Incorrect: " . $incorrect  ;
                $id=$request->lesson_id;
                session()->put('completed_lesson', $request->lesson_id);
                session()->flash('status', $message);
                return redirect()->route('lessons.questions', ['id' => $levelid]);
        }
    }
    
    public function questionShow(Request $request ,string $id){
            //return $id;
            //return $request;
            $l_Details = Lesson::find($id);
            //return $l_Details;
            $l_id = $l_Details->level_id;
            //return $l_id          
                $correct = $request->session()->get('correct',0);
                $incorrect = $request->session()->get('incorrect',0);
                //return $correct;
                $currentIndex = $request->session()->get('request_index', 0);
                //return $currentIndex;
                $quiz_Q2 = Question::with('answers')->where('lesson_id',$id)->skip($currentIndex)->first();
                if (!$quiz_Q2) {
                    $request->session()->forget('correct');
                    $request->session()->forget('incorrect');
                    $request->session()->forget('request_index');
                    session()->put('completed_lesson', $id);
                    $message = "Quiz Completed ! Correct : " . $correct . " - Incorrect : " . $incorrect ;

                    Progress::create([
                       'user_id'=>Auth::id(),
                       'level_id'=>$l_id,
                       'lesson_id'=>$id,
                       'status'=>true,
                       'created_at'=>now(),
                       'updated_at'=>null
                    ]);
                    return redirect()->route('lessons.questions', ['id' => $l_id])->with('competion_status', $message);
                }
                    return view('Admin.test' , compact( 'quiz_Q2','l_Details' ));
            }   
                      
    public function questionSubmit(Request $request){
        //return $request;
        $qID = $request->input('question_id');
        $aID = $request->input('answer_id');
        
        $correctAnswer = Question::with(['answers' => function($query) {
            $query->where('is_correct', 1);
        }])->find($qID);
        //$correct = 0;
        //$incorrect = 0;
        $lID =  $correctAnswer->lesson_id;
        $ansID = $correctAnswer->answers->first()->id;
        
        if($aID==$ansID){
            $correct = $request->session()->get('correct',0);
            $correct = $request->session()->put('correct', $correct + 1);

            $currentIndex = $request->session()->get('request_index', 0);
            $currentIndex = $request->session()->put('request_index',$currentIndex+1) ;
            
            ResultModel::create([
                'user_id'=>Auth::id(),
                'lesson_id'=>$lID,
                'question_id'=>$qID,
                'answer_id'=>$aID,
                'status'=>true,
                'created_at'=>now(),
                'updated_at'=>null
             ]);

            return Redirect()->route('qShow',['id'=>$lID])->with('feedback' , 'Correct');
       }else{
            $incorrect = $request->session()->get('incorrect',0);
            $incorrect = $request->session()->put('incorrect',$incorrect+1);

            $currentIndex = $request->session()->get('request_index', 0);
            $currentIndex = $request->session()->put('request_index',$currentIndex+1) ;

            ResultModel::create([
                'user_id'=>Auth::id(),
                'lesson_id'=>$lID,
                'question_id'=>$qID,
                'answer_id'=>$aID,
                'status'=>false,
                'created_at'=>now()
             ]);

            return Redirect()->route('qShow',['id'=>$lID])->with('feedback' , 'InCorrect');
       }
    }

    public function showResults(string $id){
        //return $id;
        $results = ResultModel::where('user_id',Auth::id())->where('lesson_id',$id)->get();
        $lesson = Lesson::find($id);
        return view('admin.result', [
            'results'=> $results,
            'lesson'=>$lesson
        ]);
    }
    public function userDetails(){

       
        $lessonProgress= Lesson::with('progress')->orderBy('level_id','asc')->get(); 
        //$results = ResultModel::where('user_id',Auth::id())->get();
        //return $lessonProgress;
        return view('admin.userdetails',[
            'attempts'=>$lessonProgress
        ]);
    }
}