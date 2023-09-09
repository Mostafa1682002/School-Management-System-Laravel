<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ['section_name', 'status', 'classe_id', 'school_grade_id'];
    public $translatable = ['section_name'];



    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function school_grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }


    public  function  teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'section_id');
    }
}