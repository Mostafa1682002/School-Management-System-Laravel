<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $fillable = [
        'subject_name',
        'school_grade_id',
        'classe_id',
        'teacher_id',
    ];

    public $translatable = ['subject_name'];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
    public  function exams(){
        return $this->hasMany(Exam::class,'subject_id');
    }
    public function book()
    {
        return $this->hasOne(Book::class, 'book_id');
    }
}
