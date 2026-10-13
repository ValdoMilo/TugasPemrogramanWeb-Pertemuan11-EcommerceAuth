<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'slug', 'excerpt', 'body',
        'category', 'status', 'image',
    ];

    protected static function booted(): void
    {
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title) . '-' . uniqid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExcerptAttribute($value)
    {
        return $value ?: Str::limit(strip_tags($this->body), 150);
    }

    public function getStatusBadgeAttribute(): string
    {
        return $this->status === 'published'
            ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30'
            : 'bg-yellow-500/10 text-yellow-400 border-yellow-500/30';
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return Storage::url($this->image);
    }
}