<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'content',
        'is_active',
        'is_featured',
        'view_count',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public static function scopeActive(Builder $builder){
        $builder->where('is_active', 1);
    }
    public static function scopeFeatured(Builder $builder){
        $builder->where('is_featured', 1);
    }
}
