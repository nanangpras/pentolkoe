<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';

    protected $fillable = [
        'titles',
        'body',
        'category_id',
        'subcategory_id',
        'status',
        'image',
        'thumbnail',
        'slug',
        'user_id',
        'tags',
        'view',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'id');
    }
}
