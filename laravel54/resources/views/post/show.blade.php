@extends('layout.main')

@section('content')

    <h2>{{$post->title}}</h2>


    <a href="/posts/{{$post->id}}/edit" >edit</a>
    <a href="/posts/{{$post->id}}/delete" >delete</a>

    <div>
        {{$post->content}}
    </div>
    <div>
        {{$post->created_at->toFormattedDateString()}}
    </div>
    
    <div>
        <a href="">赞</a>
    </div>
@endsection