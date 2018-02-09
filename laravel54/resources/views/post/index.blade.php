@extends('layout.main')

@section('content')
    <div>
        @foreach($posts as $post)

            <div>
                <a href="/posts/{{$post->id}}"> <h2>{{$post->title}}</a>
                </h2>
                <div>______________</div>
                {{str_limit($post->content,100,'...')}}
                <div>______________</div>
                {{$post->created_at->toFormattedDateString()}}

            </div>
        @endforeach

        {{--分页--}}
        <div>
            {{$posts->links()}}
        </div>


    </div>

@endsection