<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'school_grade_id',
        'classe_id',
        'section_id',
        'feese_id',
        'amount',
        'description',
    ];



    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function feese()
    {
        return $this->belongsTo(Feese::class, 'feese_id');
    }
    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
