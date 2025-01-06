<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['word'];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_tags');
    }
}
