<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'id_user',
        'id_post',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
