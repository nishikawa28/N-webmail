<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 一括代入(フォームから受け取って直接保存)を許可するカラムを指定
    protected $fillable = [
        "author_name",
        "title",
        "content",
    ];
}
