<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Article;
use Illuminate\Session;

Route::get("/", "ArticleController@index")->name("article.all");
Route::get("/view/{id}", "ArticleController@view")->name("article.view");
Route::get("/article/create", "ArticleController@create")->name("article.create");
Route::post("/article", "ArticleController@insert")->name("article.insert");
Route::get("/delete/{id}", "ArticleController@delete")->name("article.delete");
Route::get("/article/update/{id}", "ArticleController@update")->name("article.update");
Route::put("/article/{id}","ArticleController@edit")->name("article.edit");
Route::get("/aa", function(){
    $count = Article::all()->last();
    echo $count;
});
Route::get("/change", function(Request $request){
    $language = App::getLocale();
    App::setLocale("kh");
    return redirect()->route("article.all");
});

Route::post("/search","ArticleController@search");
