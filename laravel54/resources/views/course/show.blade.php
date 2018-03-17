@extends('course.layout.main')

@section('content')
    <div class="col-md-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-book"></i>

                <h3 class="box-title">课程教学文档</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="panel box box-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                JavaScript基础教程
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" style=" overflow:scroll; width:400px; height:400px;">

                            JavaScript是世界上最流行的脚本语言，因为你在电脑、手机、平板上浏览的所有的网页，以及无数基于HTML5的手机App，交互逻辑都是由JavaScript驱动的。

                            简单地说，JavaScript是一种运行在浏览器中的解释型的编程语言。

                            那么问题来了，为什么我们要学JavaScript？尤其是当你已经掌握了某些其他编程语言如Java、C++的情况下。

                            简单粗暴的回答就是：因为你没有选择。在Web世界里，只有JavaScript能跨平台、跨浏览器驱动网页，与用户交互。

                            Flash背后的ActionScript曾经流行过一阵子，不过随着移动应用的兴起，没有人用Flash开发手机App，所以它目前已经边缘化了。相反，随着HTML5在PC和移动端越来越流行，JavaScript变得更加重要了。并且，新兴的Node.js把JavaScript引入到了服务器端，JavaScript已经变成了全能型选手。

                            JavaScript一度被认为是一种玩具编程语言，它有很多缺陷，所以不被大多数后端开发人员所重视。很多人认为，写JavaScript代码很简单，并且JavaScript只是为了在网页上添加一点交互和动画效果。

                            但这是完全错误的理解。JavaScript确实很容易上手，但其精髓却不为大多数开发人员所熟知。编写高质量的JavaScript代码更是难上加难。

                            一个合格的开发人员应该精通JavaScript和其他编程语言。如果你已经掌握了其他编程语言，或者你还什么都不会，请立刻开始学习JavaScript，不要被Web时代所淘汰。
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-8">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-video-camera"></i>

                <h3 class="box-title">课程教学视频</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!--container for everything-->

                <div id="jp_container_1" class="jp-video jp-video-360p">



                    <!--container in which our video will be played-->

                    <div id="jquery_jplayer_1" class="jp-jplayer">


                    </div>



                    <!--main containers for our controls-->

                    <div class="jp-gui">

                        <div class="jp-interface">

                            <div class="jp-controls-holder">



                                <!--play and pause buttons-->

                                <a href="javascript:;" class="jp-play" tabindex="1">play</a>

                                <a href="javascript:;" class="jp-pause" tabindex="1">pause</a>

                                <span class="separator sep-1"></span>



                                <!--progress bar-->

                                <div class="jp-progress">

                                    <div class="jp-seek-bar">

                                        <div class="jp-play-bar"><span></span></div>

                                    </div>

                                </div>



                                <!--time notifications-->

                                <div class="jp-current-time"></div>

                                <span class="time-sep">/</span>

                                <div class="jp-duration"></div>

                                <span class="separator sep-2"></span>



                                <!--mute / unmute toggle-->

                                <a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a>

                                <a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a>



                                <!--volume bar-->

                                <div class="jp-volume-bar">

                                    <div class="jp-volume-bar-value"><span class="handle"></span></div>

                                </div>

                                <span class="separator sep-2"></span>



                                <!--full screen toggle-->

                                <a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a>

                                <a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a>



                            </div><!--end jp-controls-holder-->

                        </div><!--end jp-interface-->

                    </div><!--end jp-gui-->



                    <!--unsupported message-->

                    <div class="jp-no-solution">

                        <span>Update Required</span>

                        Here's a message which will appear if the video isn't supported. A Flash alternative can be used here if you fancy it.

                    </div>



                </div><!--end jp_container_1-->

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </div>


@endsection