<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller{
    
    function index(){
        $articles = Article::paginate(10);
        $count = Article::all()->count();
        $filters = ["ID","Title","Description","Author"];
        $filter = "title";
        return view("index",compact("articles","count", "filters","filter"))->with("success", "You have successfully get all the articles! Thanks!");
    }

    function view($id){
        $article = Article::where("id",$id)->firstorfail();
        return view("view",compact("article"))->with("success","You have found the article successfully!");
    }

    function create(){
        return view("create");
    }

    function insert(Request $request){
        // $inserted = Article::firstornew($request->all());
        $article = new Article();
        $article->fill($request->all());
        $article->save();
        // Article::create($request->all());
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
        $startdate =  $request -> startdate;
        $enddate = $request -> enddate;
        $keyword = $request -> keyword;
        $filter = $request -> filter;
        $filters = ["ID","Title","Description","Author"];
        $articles = [];
        $count = 0;
        if($startdate==""){
            $articles = Article::where($filter,"like","%".$keyword."%")->paginate(5);
            $count = Article::where($filter,"like","%".$request->keyword."%")->count();
        }
        else{
            $articles = Article::where($filter,"like","%".$keyword."%")->wherebetween("created_at", [$startdate, $enddate])->get();
            $count = Article::where($filter,"like","%".$request->keyword."%")->wherebetween("created_at", [$startdate, $enddate])->count();
        }
        return view("index", compact("articles","count","keyword","filters","filter","startdate","enddate"));
    }

    function deleteAll(){
        Article::truncate();
        return redirect()->route("article.all");
    }
}