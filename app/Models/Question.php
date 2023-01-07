<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function answers() {
        return $this->hasMany(Answer::class,'question_id');
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }

    protected $table = 'questions';
    protected $fillable = ['question',"image_url"];
}
