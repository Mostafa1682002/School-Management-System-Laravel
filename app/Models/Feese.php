<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feese extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $table = "feese";
    protected $fillable = [
        'name_fees',
        'amount',
        'school_grade_id',
        'classe_id',
        'academic_year',
        "fees_type",
        'notes',
    ];


    public $translatable = ['name_fees'];



    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
