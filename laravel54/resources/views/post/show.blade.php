@extends('layout.main')

@section('content')

    <h2>{{$post->title}}</h2>


    @can('update',$post)
        <a href="/posts/{{$post->id}}/edit">edit</a>
    @endcan
    @can('delete',$post)
        <a href="/posts/{{$post->id}}/delete">delete</a>
    @endcan
    <div>
        {!! $post->content !!}
    </div>
    <div>
        {{$post->created_at->toFormattedDateString()}}
    </div>

    <div>
        <a href="">赞</a>
    </div>
@endsection