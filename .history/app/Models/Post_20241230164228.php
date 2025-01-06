<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'id_category',
        'id_user'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'id_post', 'id_tag');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

}
