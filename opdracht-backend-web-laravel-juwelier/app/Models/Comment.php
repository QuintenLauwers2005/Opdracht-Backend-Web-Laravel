<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_item_id',
        'content',
    ];

    // Many-to-One: Comment belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Many-to-One: Comment belongs to NewsItem
    public function newsItem()
    {
        return $this->belongsTo(NewsItem::class);
    }
}
