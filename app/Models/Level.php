<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Level extends Model
{
    use HasFactory;
    protected $leveltable = 'levels';
    public $timestamps = true; 
    
    protected $fillable = [
       // 'id',
        'level_name',
       // 'created_at',
       // 'updated_at'
    ];
    
    //one to many relation with lessons 
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    //Has-One-Of-Many Relation With Lessons 
    public function latestLesson(){
        return $this -> hasOne(Lesson::class)->latestOfMany();
    }
    
    //one to many through relation with Questions Table 
    public function levelQuestions(){
        return $this -> hasManyThrough(Question::class,Lesson::class);
    }

}
