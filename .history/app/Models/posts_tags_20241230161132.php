<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts_tags extends Model
{
    protected $fillable = ['id_post','id_tag'];

}
