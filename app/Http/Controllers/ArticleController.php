<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller{
    function index(){
        $articles = Article::all();
        return view("index",compact("articles"))->with("success", "You have successfully get all the articles! Thanks!");
    }

    function view($id){
        $article = Article::find($id);
        return view("view",compact("article"))->with("success","You have found the article successfully!");
    }

    function create(){
        return view("create");
    }

    function insert(Request $request){
        $article = new Article();
        $article ->title = $request->title;
        $article->description = $request -> description;
        $article->author = $request->author;
        $article -> save();
        return redirect()->route("article.all");
    }

    function delete($id){
        // Article::destroy($id);
        Article::where("id",$id)->delete();
        return redirect()->route("article.all");
    }

    function update($id){
        $article = Article::find($id);
        return view("update", compact("article"));
    }

    function edit($id, Request $request){
        Article::where("id", $id)->update($request->except(["_method","_token"]));
        // $article = Article::find($id);
        // $article->id = 9;
        // $article -> fill($request->all());
        // $article -> save();
        // echo dd($article);
        // $article = new Article();
        // $article ->title = $request->title;
        // $article->description = $request -> description;
        // $article->author = $request->author;
        // $article -> save();
        return redirect()->route("article.all");
    }

    
}
