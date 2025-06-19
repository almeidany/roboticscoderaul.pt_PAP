<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = ['photo', 'title', 'news', 'news_date', 'author_user'];
}
