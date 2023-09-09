<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_title', 'answers', 'right_answer', 'question_type', 'question_score', 'exam_id'
    ];


    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}