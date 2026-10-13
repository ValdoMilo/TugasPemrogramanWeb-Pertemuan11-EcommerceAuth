<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeWithActiveProducts($query)
    {
        return $query->whereHas('products', fn($q) => $q->where('is_active', true));
    }
}