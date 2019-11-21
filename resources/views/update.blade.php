@extends('layout.master')
@section("title","Update Article")
@section('content')
<div class="col-md-6 offset-md-3">
    <form action="{{route('article.edit', $article->id)}}" method="POST">
        @method("put")
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" placeholder="Input the title!" class="form-control" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="title">Description</label>
            <input type="text" name="description" placeholder="Input the description!" class="form-control" value="{{$article->description}}">
        </div>
        <div class="form-group">
            <label for="title">Author</label>
            <input type="text" name="author" placeholder="Input the author!" class="form-control" value="{{$article->author}}">
        </div>
        <div class="btn-bottom">
            <input type="submit" value="Update Now" class="btn btn-primary">
            <a href="{{route('article.all')}}">
                <input type="button" value="Go Back" class="btn btn-success"> 
            </a>
        </div>
    </form>

</div>

@endsection