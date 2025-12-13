<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JewelryCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // One-to-Many: Category has many Products
    public function products()
    {
        return $this->hasMany(JewelryProduct::class);
    }
}
