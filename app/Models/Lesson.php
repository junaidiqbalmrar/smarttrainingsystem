<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LDAP\Result;

class Lesson extends Model
{
    protected $lessontabls = 'lessons';
    protected $fillable = [
        //'id',
        'level_id',
        'title',
        'content',
      //  'created_at',
      //  'updated_at'
    ];
    public $timestamps = true; 

    //Many-To-One Relation With Levels Table
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //One-To-Many Relation With Questions Table 
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    
    //One To Many Through Relation With Answers Table
    public function answer(){
        return $this->hasManyThrough(Answer::class,Question::class);
    }

    //One-To-Many Relation With Progress Table
    public function progress(){
        return $this->hasMany(Progress::class);
    }

    //One-To-Many Relation With Result Table
    public function result(){
        return $this->hasMany(ResultModel::class);
    }

}
