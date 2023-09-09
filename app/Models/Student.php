<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;


    protected $fillable = [
        'student_name',
        'email',
        'password',
        'gender_id',
        'nationalitie_id',
        'blood_id',
        'date_birth',
        'grade_id',
        'class_id',
        'section_id',
        'parent_id',
        'academic_year'
    ];
    public $translatable = ['student_name'];


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class);
    }
    public function blood()
    {
        return $this->belongsTo(Type_Blood::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function nationalitie()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function parent()
    {
        return $this->belongsTo(Myparent::class);
    }


    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }
}