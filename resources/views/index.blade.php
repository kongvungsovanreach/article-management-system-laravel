@extends('layout.master')
@section("title","Get All Articles")
@section('content')
    <br>
    <div class="col-md-10 offset-md-1">
        <div id="search-div" class="col-md-4">
            <form action="/search" method="POST">
                @csrf
                <h1>{{$filter}}</h1>
                <input type="text" value="{{isset($keyword)?$keyword:''}}" name="keyword" class="form-control" id="search-box">
                <select name="filter" id="" class="form-control">
                    @foreach($filters as $f)
                        <option value="{{strtolower($f)}}" 
                            @if($f == $filter)
                                selected = "selected"

                            @endif
                        >{{$f}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Search" class="btn btn-primary" id="search-button">
                
            </form>
        </div>
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
                <tr>
                     <td colspan="5" align="right">Total Record: <span>{{$count}}</span></td>
                </tr>
            @endif
        </table>
        @if(!count($articles))
            <h1>There is no articles</h1>
        @endif
    </div>
@endsection