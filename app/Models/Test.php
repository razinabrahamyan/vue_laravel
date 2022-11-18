<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'step',
        'subject_id',
        'user_id',
        'questions_count',
        'started_at',
        'ended_at',
    ];

    public function questions(){
        return $this->belongsToMany(Question::class,'tests_questions')->as('result')->withPivot('status','spent');
    }
}
