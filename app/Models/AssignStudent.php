<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    use HasFactory;

    protected $table = 'assign_student';

    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
