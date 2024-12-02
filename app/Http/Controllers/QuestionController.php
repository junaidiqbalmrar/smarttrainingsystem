<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QuestionController extends Controller
{
   
    public function index()
    {
      $questions = Question::with('lesson')->orderBy('lesson_id')->paginate(5);
        //return $questions;
        return view('questions.index',[
            'questions'=>$questions
        ]);
    }

   
    public function create()
    {
        $lessons = Lesson::all();
        return view('Questions.create' ,compact('lessons'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            //'q_id'=>'int|nullable',
            'lessonid'=>'required|int|nullable|exists:lessons,id',
            'q_text'=>'required|string|max:255',
            //'q_cretedat'=>'nullable',
             //'q_updatedat'=>'nullable'
        ]);
        Question::create([
           // 'id'=>$request->q_id,
            'lesson_id'=>$request->lessonid,
            'question_text'=>$request->q_text,
            'created_at'=>now(),
            //'updated_at'=>''
            //'updated_at'=>$request->q_updatedat
        ]);
        return redirect('admin/dashboard/questions')->with('status','Question Created Successfully');
    }

   
    public function show(string $question)
    {
       
        $data = Question::where('id',$question)->with('answers')->with('lesson')->get();
        return view('Questions.show' , ['question'=>$data]);

    }

    
    public function edit(string $question)
    {
        $data = Question::where('id',$question)->get();
        return view('Questions.edit' , ['question'=>$data]);
    }

   
    public function update(Request $request, string $id)
    {
        $request->validate([
            'q_id'=>'int|nullable',
            'l_id'=>'required|int|nullable',
            'q_text'=>'required|string|max:255',
           // 'q_cretedat'=>'nullable',
            //'q_updatedat'=>now()
        ]);
        DB::table('questions')->where('id',$id)->update([
            'id'=>$request->q_id,
            'lesson_id'=>$request->l_id,
            'question_text'=>$request->q_text,
           // 'created_at'=>$request->q_createdat,
            'updated_at'=>now()

        ]);
        return redirect('admin/dashboard/questions')->with('status','Question Updated Successfully');
    }

   
    public function destroy(string $question)
    {
      Question::where('id',$question)->delete();
      return redirect('admin/dashboard/questions')->with('status','Question Deleted Successfully');
    }
}
