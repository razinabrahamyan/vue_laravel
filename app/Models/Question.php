<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'subject_id',
        'level_id',
        'image',
        'type_id',
        'rate',
        'fails',
        'success',
        'title',
    ];

    public function level(){
        return $this->belongsTo(QuestionLevel::class,'level_id');
    }

    public function type(){
        return $this->belongsTo(QuestionType::class,'type_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function history(){
        return $this->hasMany(History::class);
    }

    public function tests(){
        return $this->belongsToMany(Test::class,'tests_questions')->as('result');
    }

}
