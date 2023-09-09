<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClasse extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'school_grade_id',
        'classe_id',
        'section_id',
        'subject_id',
        'start_time',
        'start_url',
        'join_url'
    ];

    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
