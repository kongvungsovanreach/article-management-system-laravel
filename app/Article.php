<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // public $timestamps = false;
    public $fillable = [
        "title","description","author"
    ];
    // public $guarded = ["_token"];

    // public $attributes = [
    //     "description"=>"a description" 
    // ];

    // public $fillable = ["title", "description","author"];
    // protected $fillable = [
    //     "title",
    //     "description",
    //     "author"
    // ];

}
