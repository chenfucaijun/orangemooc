@extends('course.layout.main')

@section('content')
    <h2 class="page-header text-center">MOOC个性化推荐课程</h2>
    <section class="content">
        <div class="row">


            @foreach($courses as $course)
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                {{--<h2>css定位 position</h2>--}}
                                {{--<p>老师会讲解css定位中的知识并运用到案例中</p>--}}
                                <h2>{{$course->name}}</h2>
                                <p>{{$course->title}}</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/courses/{{$course->id}}" class="small-box-footer">学习课程 <i class="fa fa-arrow-circle-right"></i></a>
                        </div>



                </div>


            @endforeach

            {{--分页--}}
            <div>
                {{$courses->links()}}
            </div>




            {{--<!-- ./col -->--}}
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-green">--}}
                    {{--<div class="inner">--}}
                        {{--<h2>移动web开发适配秘籍Rem</h2>--}}
                        {{--<p>移动web不求人，全面掌握移动web开发rem适配方案。</p>--}}
                    {{--</div>--}}
                    {{--<div class="icon">--}}
                        {{--<i class="ion ion-stats-bars"></i>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<!-- ./col -->--}}
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-yellow">--}}
                    {{--<div class="inner">--}}
                        {{--<h3>44</h3>--}}

                        {{--<p>User Registrations</p>--}}
                    {{--</div>--}}
                    {{--<div class="icon">--}}
                        {{--<i class="ion ion-person-add"></i>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- ./col -->--}}
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-red">--}}
                    {{--<div class="inner">--}}
                        {{--<h3>65</h3>--}}

                        {{--<p>Unique Visitors</p>--}}
                    {{--</div>--}}
                    {{--<div class="icon">--}}
                        {{--<i class="ion ion-pie-graph"></i>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- ./col -->--}}
        </div>

    </section>

@endsection