@extends('layout.master')
@section("title","Get All Articles")
@section('content')
    <div class="row">
        <div id="search-div" class="col-md-12">
            <form action="/search" >
                {{-- @csrf --}}
                <div class="row">
                    <div class="col-md-2">
                        <input type="text" autocomplete="off" value="{{isset($startdate)?$startdate : ''}}" name="startdate" id="startdate" placeholder="Start Date" class="form-control dateinput">
                    </div>
                    <div class="col-md-2">
                        <input type="text" autocomplete="off" value="{{isset($enddate)?$enddate : ''}}" name="enddate" id="enddate" placeholder="Start Date" class="form-control dateinput">
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5 row pull-right" style="text-align:right">
                        <div class="col-md-5">
                            <input type="text" name="keyword" class="form-control" id="search-box" value="{{isset($keyword) ? $keyword : '' }}">
                        </div>
                        <div class="col-md-5">
                            <select name="filter" id="filter" class="form-control">
                                @foreach($filters as $f)
                                    <option value="{{strtolower($f)}}"
                                        @if(strtolower($f) == $filter)
                                            selected = 'selected'
                                        @endif
                                    >{{$f}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" value="Search" class="btn btn-primary" id="search-button">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <div class="btn-group col-md-12" id="add_btn">
            <a href="{{route('article.create')}}">
                <input type="button" value="+ Add An Article" class="btn btn-primary">
            </a>
        </div>
        <br>
        <br>
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
                    <td colspan="4">{{$articles->appends(request()->all())->links()}}</td>
                    <td  align="right">Total Record: <span>{{$count}}</span></td>
                </tr>
            @endif

        </table>
        @if(!count($articles))
            <h1>There is no articles</h1>
        @endif
    </div>
@endsection