<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //一括代入するカラムを指定
    protected $fillable = [
        'title',
        'content',
    ];
}
