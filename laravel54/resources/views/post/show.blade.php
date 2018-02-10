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

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">评论</div>

        <!-- List group -->
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <h5>{{$comment->created_at}} by {{$comment->user->name}}</h5>
                    <div>
                        {{$comment->content}}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">发表评论</div>

        <!-- List group -->
        <ul class="list-group">
            <form action="/posts/{{$post->id}}/comment" method="post">
                {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{$post->id}}"/>
                <li class="list-group-item">
                    <textarea name="content" class="form-control" rows="10"></textarea>
                    <button class="btn btn-default" type="submit">提交</button>
                    @include('layout.error')
                </li>
            </form>

        </ul>
    </div>
@endsection