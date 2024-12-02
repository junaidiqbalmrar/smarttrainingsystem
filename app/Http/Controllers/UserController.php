<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Progress;
use App\Models\ResultModel;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){
        $users = User::where('role','user')->get();
        $user_progress = Progress::where('user_id',5)->get();
        //return $user_progress;
        return view('Users.index',compact('users'));
    }

    public function usershow( string $id){
        
        $lessonProgress= Lesson::with(['progress'=>function($q) use ($id){
            $q->where('user_id',$id);
        }])->orderBy('level_id','asc')->get(); 
        $user_details = User::find($id);
        //return $user_details;
        return view('Users.show',[
            'attempts'=>$lessonProgress,
            'user'=>$user_details
        ]);
    }

    public function userResults(Request $request , string $id){
        $userId = $request->input('user_id'); 
        //return $userId ; 
        $results = ResultModel::where('user_id',$userId)->where('lesson_id',$id)->get();
        $lesson = Lesson::find($id);
        return view('admin.result', [
            'results'=> $results,
            'lesson'=>$lesson
        ]);
    }

}
    
