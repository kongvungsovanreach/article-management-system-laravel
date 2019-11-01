@extends('layout.master')
@section("title","Get All Articles")
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="btn-group" id="add_btn">
            <a href="{{route('article.create')}}">
                <input type="button" value="+ Add Article" class="btn btn-primary">
            </a>
        </div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
            @if(count($articles))
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->description}}</td>
                        <td>{{$article->author}}</td>
                        <td>
                            <a href="{{route('article.view',[$article->id])}}"><input type="button" class="btn btn-primary" value="View"></a>
                            <a href="{{route('article.update',[$article->id])}}"><input type="button" class="btn btn-success" value="Edit"></a>
                            <a href="{{route('article.delete',[$article->id])}}"><input type="button" class="btn btn-danger" value="Delete"></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        @if(!count($articles))
            <h1>There is no articles</h1>
        @endif
    </div>
@endsection