<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_Section extends Model
{
    use HasFactory;
    protected $fillable=['section_id','teacher_id'];
}
