<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags_posts extends Model
{
    protected $fillable = ['id_post','id_tag'];

}
