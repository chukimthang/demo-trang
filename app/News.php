<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";

    protected $fillable = ['id_comments', 'title', 'content', 'image', 'receiver_id'];
}
