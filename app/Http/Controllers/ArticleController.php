<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller{
    function index(){
        $articles = Article::all();
        $count = Article::all()->count();
        return view("index",compact("articles","count"))->with("success", "You have successfully get all the articles! Thanks!");
    }

    function view($id){
        $article = Article::where("id",$id)->firstorfail();
        return view("view",compact("article"))->with("success","You have found the article successfully!");
    }

    function create(){
        return view("create");
    }

    function insert(Request $request){
        $inserted = Article::firstornew($request->except("_token"));
        $inserted->save();
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
       
        Article::find($id)->update($request->all());

        return redirect()->route("article.all");
    }

    function search(Request $request){
        $articles = Article::where("title","like","%".$request->keyword."%")->get();
        $count = Article::where("title","like","%".$request->keyword."%")->count();
        return view("index", compact("articles","count"));
    }

    
}
