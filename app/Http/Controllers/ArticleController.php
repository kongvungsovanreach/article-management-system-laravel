<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller{
    function index(){
        $filter = "";
        $filters = ["ID","Title","Description","Author"];
        $articles = Article::all();
        $count = Article::all()->count();
        return view("index",compact("articles","count", "filter","filters"))->with("success", "You have successfully get all the articles! Thanks!");
    }

    function view($id){
        $article = Article::where("id",$id)->firstorfail();
        return view("view",compact("article"))->with("success","You have found the article successfully!");
    }

    function create(){
        return view("create");
    }

    function insert(Request $request){
        $article = new Article();
        $article->fill($request->all());
        // echo dd($article);
        // $article -> title = $request->title;
        // $article->description = $request->description;
        // $article->author = $request->author;
        $article -> save();



        return redirect()->route("article.all");
    }

    function delete($id){
        Article::destroy($id);
        Article::where("id",$id)->delete();
        return redirect()->route("article.all");
    }

    function update($id){
        $article = Article::find($id);
        return view("update", compact("article"));
    }

    function edit($id, Request $request){
        // $article = Article::find($id);
        // $article->title = $request->title;
       
        Article::find($id)->update($request->all());

        return redirect()->route("article.all");
    }

    function search(Request $request){
        $filter =  $request->filter;
        $filters = ["ID","Title","Description","Author"];
        $keyword = $request->keyword;
        $articles = Article::where($filter,"like","%".$keyword."%")->get();
        $count = $articles->count();
        return view("index", compact("articles","count","filters","filter","keyword"));
    }

    
}
