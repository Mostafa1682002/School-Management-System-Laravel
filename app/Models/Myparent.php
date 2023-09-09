<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Myparent extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['name_father', 'job_father', 'name_mother', 'job_mother'];


    public function attachments()
    {
        return $this->belongsTo(ParentAttachment::class, 'myparent_id');
    }
}
