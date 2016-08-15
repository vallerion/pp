@extends('workspace.layers.extender')

@section('title', 'Projects')

@section('content')
<section class="content-header">
    <h1>
        Projects
    </h1>
    <!-- TODO сделать лист для заметок
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cogs"></i> Home</a></li>
        <li class="active">Projects</li>
    </ol>-->
</section>

    <!-- Main content -->
<section class="content">
        <!-- Small boxes (Stat box) -->
    <div class="row">
        @foreach($projects as $project)

            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue">

                    @if(!empty($project->image))
                        <div class="widget-user-image">
                            <img class="img-circle" src="./files/img_projects/pira.png" alt="Projects logo">
                        </div>
                    @endif

                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $project->name }}</h3>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">Tasks<span class="pull-right badge bg-red">{{ count($project->tasks) }}</span></a></li>
                            <li><a href="#">Developers<span class="pull-right badge bg-aqua">{{ count($project->users) }}</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>


        @endforeach

        {{--<div class="col-md-4">--}}
            {{--<!-- Widget: user widget style 1 -->--}}
            {{--<div class="box box-widget widget-user-2">--}}
                {{--<!-- Add the bg color to the header using any of the bg-* classes -->--}}
                {{--<div class="widget-user-header bg-blue">--}}
                    {{--<div class="widget-user-image">--}}
                        {{--<img class="img-circle" src="./files/img_projects/pira.png" alt="Projects logo">--}}
                    {{--</div>--}}
                    {{--<!-- /.widget-user-image -->--}}
                    {{--<h3 class="widget-user-username">PIRA PROJECTS</h3>--}}
                {{--</div>--}}
                {{--<div class="box-footer no-padding">--}}
                    {{--<ul class="nav nav-stacked">--}}
                        {{--<li><a href="#">Tasks<span class="pull-right badge bg-red">15</span></a></li>--}}
                        {{--<li><a href="#">Developers<span class="pull-right badge bg-aqua">4</span></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.widget-user -->--}}
        {{--</div>--}}

        {{--<div class="col-md-4">--}}
            {{--<!-- Widget: user widget style 1 -->--}}
            {{--<div class="box box-widget widget-user-2">--}}
                {{--<!-- Add the bg color to the header using any of the bg-* classes -->--}}
                {{--<div class="widget-user-header bg-maroon">--}}
                    {{--<div class="widget-user-image">--}}
                        {{--<img class="img-circle" src="./files/img_projects/pira.png" alt="Projects logo">--}}
                    {{--</div>--}}
                    {{--<!-- /.widget-user-image -->--}}
                    {{--<h3 class="widget-user-username">PIRA PROJECTS</h3>--}}
                {{--</div>--}}
                {{--<div class="box-footer no-padding">--}}
                    {{--<ul class="nav nav-stacked">--}}
                        {{--<li><a href="#">Tasks<span class="pull-right badge bg-red">15</span></a></li>--}}
                        {{--<li><a href="#">Developers<span class="pull-right badge bg-aqua">4</span></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.widget-user -->--}}
        {{--</div>--}}


        {{--<div class="col-md-4">--}}
            {{--<!-- Widget: user widget style 1 -->--}}
            {{--<div class="box box-widget widget-user-2">--}}
                {{--<!-- Add the bg color to the header using any of the bg-* classes -->--}}
                {{--<div class="widget-user-header bg-navy-active">--}}
                    {{--<div class="widget-user-image">--}}
                        {{--<img class="img-circle" src="./files/img_projects/pira.png" alt="Projects logo">--}}
                    {{--</div>--}}
                    {{--<!-- /.widget-user-image -->--}}
                    {{--<h3 class="widget-user-username">PIRA PROJECTS</h3>--}}
                {{--</div>--}}
                {{--<div class="box-footer no-padding">--}}
                    {{--<ul class="nav nav-stacked">--}}
                        {{--<li><a href="#">Tasks<span class="pull-right badge bg-red">15</span></a></li>--}}
                        {{--<li><a href="#">Developers<span class="pull-right badge bg-aqua">4</span></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.widget-user -->--}}
        {{--</div>--}}
    </div>
    <!-- /.row (main row) -->

</section>
    @endsection