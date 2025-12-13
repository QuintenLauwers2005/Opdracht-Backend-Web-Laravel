<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'publication_date',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'publication_date' => 'date',
        ];
    }

    // One-to-Many: NewsItem belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-Many: NewsItem has many Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
