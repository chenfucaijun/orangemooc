@extends('layout.main')

@section('content')

    <div class="col-sm-8">
        <form action="/posts" method="POST">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}"/>--}}
            {{csrf_field()}}
            <div class="form-group">
                <label for="">标题</label>
                <input name="title" type="text" class="form-control" placeholder="这是标题">
            </div>

            <div class="form-group">
                <label for="">内容</label>

                <textarea name="content" id="" cols="30" rows="10" placeholder="这里是内容"></textarea>

                <button type="submit" class="btn btn-default">提交</button>
            </div>

        </form>

    </div>


@endsection