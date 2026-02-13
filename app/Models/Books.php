<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assign_student', 'book_id', 'user_id')
            ->withTimestamps();
    }
}
