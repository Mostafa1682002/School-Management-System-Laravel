<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $fillable = [
        'email', 'password', 'name_teacher', 'gender_id', 'specialization_id', 'address'
    ];

    public $translatable = ['name_teacher'];


    public  function  specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public  function  gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public  function  sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }

    public  function subjects(){
        return $this->hasMany(Subject::class);
    }
}
