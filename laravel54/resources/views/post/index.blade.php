@extends('layout.main')

@section('content')
    <div>
        @foreach($posts as $post)

            <div>
                <h2>{{$post->title}}
                </h2>
                <div>______________</div>
                {{$post->content}}
                <div>______________</div>
                {{$post->created_at->toFormattedDateString()}}

            </div>
        @endforeach


    </div>

@endsection