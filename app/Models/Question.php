<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LDAP\Result;

class Question extends Model
{ 
    protected $questiontable = 'questions';
    protected $fillable =[
       // 'id',
        'lesson_id',
        'question_text',
       // 'created_at',
       // 'updated_at'
    ];
    public $timestamps = true; 

    //Many-To-One Relation With Lesson Table
    public function lesson()
    { 
        
        return $this->belongsTo(Lesson::class);
    }
    //One-To-Many Relation With Answers Table
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //One-To-Many Relation With Results Table
    public function result(){
        return $this->hasMany(ResultModel::class);
    }
}
