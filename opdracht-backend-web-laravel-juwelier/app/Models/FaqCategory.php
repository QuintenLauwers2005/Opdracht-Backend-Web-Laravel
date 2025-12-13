<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'order'];

    // One-to-Many: Category has many FAQs
    public function faqs()
    {
        return $this->hasMany(Faq::class)->orderBy('order');
    }
}
