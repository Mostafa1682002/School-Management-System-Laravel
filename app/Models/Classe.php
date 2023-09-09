<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classe extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['class_name'];
    protected $fillable = ['class_name', 'schoolgrade_id'];



    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'schoolgrade_id');
    }
}
