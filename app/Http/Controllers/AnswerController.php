<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    
    public function index()
    {
        $answer = Answer::with('question')->orderBy('question_id')->paginate(4);
        //return $answer;
        return view('Answers.index',['answers'=>$answer]);
    }

    
    public function create()
    {
       $questions = Question::all();
       return view('Answers.create', compact('questions') );
    }

   
    public function store(Request $request)
    {
        $request->validate([
            //'id'=>'required|nullable',
            'qid'=>'required|int|exists:questions,id',
            'anstext'=>'required|string|max:255',
            'ansiscorrect'=>'required|boolean',   
          ]);
          Answer::create([
           // 'id'=>$request->id,
            'question_id'=>$request->qid,
            'answer_text'=>$request->anstext,
            'is_correct'=>$request->ansiscorrect,
            'created_at'=> now()
          ]);

          return redirect('admin/dashboard/answers')->with('status','Answer Created Successfully');
    }

   
    public function show(string $id)
    {
        $answer = Answer::where('id',$id)->with('question')->get();
        return view('Answers.show',[
            'answers'=>$answer
        ]);
    }

    
    public function edit(string $id)
    {   

        $answer = Answer::where('id',$id)->get();
        return view('Answers.edit',[
            'answers'=>$answer,
        ]);
    }

   
    public function update(Request $request, string $id)
    {
       
          $request->validate([
            //'id'=>'required|nullable|nullable',
            'qid'=>'required|int',
            'anstext'=>'required|string|max:255',
            'ansiscorrect'=>'required|boolean',   
          ]);
          Answer::where('id',$id)->update([
            //'id'=>$request->id,
            'question_id'=>$request->qid,
            'answer_text'=>$request->anstext,
            'is_correct'=>$request->ansiscorrect,
            'updated_at'=>now()
          ]);

          return redirect('admin/dashboard/answers')->with('status','Answer Updated Successfully');
        
        }

    
    public function destroy(string $id)
    {
        Answer::where('id',$id)->delete();
        return redirect('admin/dashboard/answers')->with('status','Answer Deleted Successfully');
    }
}
