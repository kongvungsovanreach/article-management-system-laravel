@extends('layout.master')
@section("title","Get One Article")
@section('content')
<div class="col-md-4 offset-md-4">
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{$article->id}}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{$article->title}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$article->description}}</td>
        </tr>
        <tr>
            <th>Author</th>
            <td>{{$article->author}}</td>
        </tr>
    </table>
    <div class="w-100 btn-bottom">
        <a href="{{route('article.all')}}" class="w-100">
            <input type="button" value="Go Back" class="btn btn-success w-100">
        </a>
    </div>
</div>
@endsection