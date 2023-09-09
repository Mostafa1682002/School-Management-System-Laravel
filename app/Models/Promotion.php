<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    public $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class)->withTrashed();
    }
    public function f_grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'from_grade');
    }
    public function f_class()
    {
        return $this->belongsTo(Classe::class, 'from_classe');
    }

    public function f_section()
    {
        return $this->belongsTo(Section::class, 'from_section');
    }

    public function t_grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'to_grade');
    }
    public function t_class()
    {
        return $this->belongsTo(Classe::class, 'to_classe');
    }

    public function t_section()
    {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
