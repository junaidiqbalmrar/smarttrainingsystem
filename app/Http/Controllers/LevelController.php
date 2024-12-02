<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::paginate(5);
        return view('Levels.index' , [
            'levels'=>$levels
        ]); 

    }

    
    public function create()
    {
        return view('levels.create');
    }

    
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'levelid'=>'nullable',
            'levelname'=>'required|string|max:255'

        ]);
        Level::create([
            'id'=>$request->levelid,
            'level_name'=>$request->levelname,
            'created_at'=>now()
        ]);
        return redirect('admin/dashboard/levels')->with('status','Level Created Successfully');
    }

   
    public function show(string $level)
    {
        $data = Level :: where('id',$level)->with('lessons')->get();
        //echo  $data ;
        return view('Levels.show' , ['level'=>$data]);
    }

    
    public function edit(string $level)
    {
       // dd(print_r($level));
        //return view('Levels.edit' , compact('level'));
        $data = Level::where('id',$level)->get();
        return view('Levels.edit' , ['level'=>$data]);
    }

   
    public function update(Request $request, string $id)
    {   
     
          $request->validate([
             'l_id'=>'nullable',
             'l_name'=>'required|string|max:255'
         ]);
        Level::where('id',$id)->update([
            'id'=>$request->l_id,
            'level_name'=>$request->l_name,
            //'created_at'=>$request->l_createdat,
            'updated_at'=>now()
    //dd(print_r($request->l_name),print_r($request->l_id),print_r($request->l_createdat),print_r($request->l_updatedat))

        ]);
        return redirect('admin/dashboard/levels')->with('status','Level Updated Successfully');
    }

    
    public function destroy(string $level)
    {
       
       // dd(print_r($id));
         Level::where('id',$level)->delete();
         return redirect('admin/dashboard/levels')->with('status','Level Deleted Successfully');
    }
     
    public function latest(){
       // echo "<h1> Latest Page </h1>";
       // $latest = Level::with('latestLesson')->get();
       // return $latest;

       $levelQuestions = Level::with('lessons')->with('levelQuestions')->get();
      //return $levelQuestions;
       return view('Admin.quiz' , [

        'levels'=>$levelQuestions ,
        // 'lessons'=>$levelQuestions,
        // 'questions'=>$levelQuestions
    
        ]);

    }

    



}
