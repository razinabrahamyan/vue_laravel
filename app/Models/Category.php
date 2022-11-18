<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'category',
    ];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
