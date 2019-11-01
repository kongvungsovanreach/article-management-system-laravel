<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    public $fillable = [
        "title","description","author"
    ];

    public $guard = ["title"];
}
