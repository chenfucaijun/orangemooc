@extends('layout.main')

@section('content')
    <div>{{Auth::id()}}</div>
    <div>
        @foreach($posts as $post)

            <div>
                <a href="/posts/{{$post->id}}"><h2>{{$post->title}}</h2></a>

                {{--{{str_limit($post->content,100,'...')}}--}}
                {{--直接渲染html代码--}}
                {!! str_limit($post->content,100,'...') !!}
                {{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}
                <p class="blog-post-meta">赞 {{$post->zans_count}}| 评论 {{$post->comments_count}}</p>
            </div>
        @endforeach

        {{--分页--}}
        <div>
            {{$posts->links()}}
        </div>


    </div>

@endsection