<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function questions() {
        return $this->hasMany(Question::class,'quiz_id');
    }

    public function answers() {
        return $this->hasMany(Answer::class,'quiz_id');
    }
    protected $fillable = ['name','desc','image_url','is_private'];
    protected $table = 'quizzes';
}
