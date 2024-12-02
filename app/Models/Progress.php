<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $progressTable = "progress";
    protected $fillable = [
        'user_id',
        'level_id',
        'lesson_id',
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
}
