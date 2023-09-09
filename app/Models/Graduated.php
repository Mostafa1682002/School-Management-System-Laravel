<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduated extends Model
{
    use HasFactory;
    public $guarded = [];


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id')->withTrashed();
    }
}
