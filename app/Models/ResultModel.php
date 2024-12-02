<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultModel extends Model
{
    protected $table = 'results';
    protected $fillable = [
        'user_id',
        'lesson_id',
        'question_id',
        'answer_id',
        'status'
    ];
    public $timestamps = true;

    //Many-To-One Inverse Relation With User Table
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Many-To-One Inverse Relation With Lesson Table
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    
    //Many-To-One Inverse Relation With Question Table
    public function question(){
        return $this->belongsTo(Question::class);
    }

    //Many-To-One Inverse Relation With Answer Table
    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}
