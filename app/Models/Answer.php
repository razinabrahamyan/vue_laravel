<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'question_id',
        'order',
        'right',
        'title',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function history(){
        return $this->hasOne(History::class);
    }
}
