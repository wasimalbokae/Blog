<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['word'];
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'id_tag', 'id_post');
    }
}
