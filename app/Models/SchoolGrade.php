<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class SchoolGrade extends Model
{
    use HasTranslations;
    use HasFactory;
    public $translatable = ['name'];
    protected $fillable = ['name', 'notes'];

    public function classes()
    {
        return $this->hasMany(Classe::class, 'schoolgrade_id');
    }


    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
