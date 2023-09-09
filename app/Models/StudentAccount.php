<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'fees_invoice_id',
        'type',
        'debit',
        'credit',
        'descrption',
    ];
}
