<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'test_id',
        'question_id',
        'answer_id',
        'order',
        'right',
    ];

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}
