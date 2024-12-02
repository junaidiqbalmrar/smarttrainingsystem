<?php

namespace App\Http\Controllers;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
   
    public function index()
    {   
        $lessons = Lesson::with('level')->orderBy('level_id')->paginate(5);
        //return $lessons;
        return view('Lessons.index' , [
           'lessons'=>$lessons
        ]); 

    }

   
    public function create()
    {
      $levels = Level::all();
       return view('Lessons.create',compact('levels'));
    }

   
    public function store(Request $request)
    {
     // return $request;
      $request->validate([
        'levelid'=>'required|int|exists:levels,id',
        'les_title'=>'required|string|max:255|unique:lessons,title,except,id',
        'les_content'=>'required|string|max:255'
      ]);
      Lesson::create([
        //'id'=>$request->les_id,
        'level_id'=>$request->levelid,
        'title'=>$request->les_title,
        'content'=>$request->les_content,
        'created_at'=>now()
      ]);
      return redirect('admin/dashboard/lessons')->with('status','Lesson Created Successfully');
    }

    
    public function show(string $lesson)
    {
       
       $data = Lesson::where('lessons.id',$lesson)->with('questions')->with('level')->get();
       //return $data;
       return view('Lessons.show' , ['lesson'=>$data]);
    }

    
    public function edit(string $lesson)
    {
      $data = Lesson::where('id',$lesson)->get();
      return view('Lessons.edit' , ['lesson' => $data]);
    }

   
    public function update(Request $request, string $id)
    {
     // return $request;
        $request->validate([
            'levelid'=>'required|int',
            'les_title'=>'required|string|max:255',
            'les_content'=>'required|string|max:255'
          ]);
         Lesson::where('id',$id)->update([
            'level_id'=>$request->levelid,
            'title'=>$request->les_title,
            'content'=>$request->les_content,
            'updated_at'=>now()
          ]);
          return redirect('admin/dashboard/lessons')->with('status','Lesson Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $lesson)
    {
      Lesson::where('lessons.id',$lesson)->delete();
      return redirect('admin/dashboard/lessons')->with('status','Lesson Deleted Successfully');
    }


    
}
