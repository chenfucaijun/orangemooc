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
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body" style=" overflow:scroll; width:400px; height:400px;">

                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3
                            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                            laborum
                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee
                            nulla
                            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                            nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft
                            beer
                            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                            accusamus
                            labore sustainable VHS.
                            lorem2000
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