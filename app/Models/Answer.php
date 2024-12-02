<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LDAP\Result;

class Answer extends Model
{
    protected $answerstable = 'answers';
    protected $fillable = [
       // 'id',
        'question_id',
        'answer_text',
        'is_correct'

    ];
    public $timestamps = true;
    
    //Many-To-One Relation With Question Table
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    //One-To-Many Relation With Result Table
    public function result(){
        return $this->hasMany(ResultModel::class);
    }

    protected static function booted():void
    {
        
    }
}
