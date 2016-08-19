@extends('workspace.layers.extender')

@section('title', 'Tasks')

@push('scripts')

<script src="{{asset('js/move_list.js')}}"></script>
<script src="{{ asset("js/task.js") }}"></script>

@endpush


@push('stylesheets')

<link rel="stylesheet" href="{{ asset("css/task.css") }}">

@endpush

@section('content')


<section class="content-header">
    <h1>
        My tasks
    </h1>
    <!-- TODO сделать лист для заметок -->
</section>

<input type="hidden" name="_token" content="{{ csrf_token() }}">

    <!-- Main content -->
<section class="content">


    @foreach(Auth::user()->projects as $project)

        <?php $tasks = Auth::user()->tasks()->where('project_id', $project->id)->orderBy('status', 'DESC')->get(); ?>

        @if(count($tasks) < 1)
            @continue
        @endif

        <div class="box project-box" style="border-top-color: {{ Helper::getMaterialColor($project->id)[1] }}" data-id="{{ $project->id }}">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>

                <h3 class="box-title">{{ $project->name }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" data-action="refresh-tasks" class="btn btn-box-tool"><i class="fa fa-refresh"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                    {{--<div class="btn-group">--}}
                        {{--<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-wrench"></i></button>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="#">Action</a></li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                </div>

            </div>

            <div class="box-body">
                <ul class="todo-list ui-sortable">


        @include('workspace.forms.task_block', ["tasks" => $tasks])

        {{--@foreach($tasks as $task)--}}

                    {{--@if($task->status == 0)--}}
                        {{--<li class="row task-row" style="border-left: 20px solid #c5c5c5;" data-id="{{ $task->id }}">--}}
                    {{--@else--}}
                        {{--<li class="row task-row" style="border-left: 20px solid #3c8dbc;" data-id="{{ $task->id }}">--}}
                    {{--@endif--}}

                        {{--<div class="col-xs-3 col-md-5 task-name">--}}
                          {{--<span class="handle ui-sortable-handle hidden-xs">--}}
                            {{--<i class="fa fa-ellipsis-v"></i>--}}
                            {{--<i class="fa fa-ellipsis-v"></i>--}}
                          {{--</span>--}}
                            {{--<input value="" type="checkbox">--}}

                            {{--@if($task->status == 0)--}}
                                {{--<a href="#" class="text-task-closed text" data-action="modal-task" data-id="{{ $task->id }}">{{ $task->name }}</a>--}}
                            {{--@else--}}
                                {{--<a href="#" class="text" data-action="modal-task" data-id="{{ $task->id }}">{{ $task->name }}</a>--}}
                            {{--@endif--}}
                            {{--<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>--}}

                            {{--<div class="label-mark-block hidden-xs">--}}
                                {{--$marks = explode(",", $task->mark);--}}
                                {{--@foreach($task->getMark() as $mark)--}}
                                    {{--<span class="label" style='background-color:{{ $task::marks[$mark] }};'>{{ $mark }}</span>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="label-priority-block col-xs-1 col-md-1">--}}
                            {{--<span class="label" style='background-color:{{ $task::priority[$task->priority] }};'>{{ $task->priority }}</span>--}}
                        {{--</div>--}}

                        {{--<div class="user-detail col-xs-4 col-md-4">--}}
                            {{--<a href="#" data-action="user-info" data-id="{{ $task->user_from->id }}">{{ $task->user_from->name }}</a> ->--}}
                            {{--<a href="#" data-action="user-info" data-id="{{ $task->user_to->id }}">{{ $task->user_to->name }}</a>--}}
                        {{--</div>--}}

                        {{--<div class="tools col-xs-4 col-md-2 pull-right">--}}
                            {{--<a href="#" class="btn-xs btn-primary hvr-bounce-in"><i class="fa fa-pencil"></i></a>--}}
                            {{--<a href="#" class="btn-xs btn-danger hvr-bounce-in col-xs-offset-1">--}}
                                {{--<i class="fa fa-trash-o"></i>--}}
                                {{--<i class="glyphicon glyphicon-envelope"></i>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{----}}
                        {{--<div class="tools col-xs-2">--}}
                            {{--<a href="#" class="btn-xs btn-primary hvr-bounce-in"><i class="fa fa-edit"></i></a>--}}
                            {{--<a href="#" class="btn-xs btn-danger hvr-bounce-in col-xs-offset-1"><i class="fa fa-trash-o"></i></a>--}}
                        {{--</div>--}}

                        {{--<a href="#" class="tools col-xs-2">--}}
                            {{--<i class="fa fa-edit"></i>--}}
                            {{--<i class="fa fa-trash-o"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}

        {{--@endforeach--}}


                </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
                <div class="pull-right">
                    {{--<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>--}}
                    <button type="button" class="btn btn-primary" data-action="modal-create-task"><i class="fa fa-plus"></i> Add</button>
                </div>
            </div>
        </div>

    @endforeach


    {{--<div class="box box-primary">--}}
        {{--<div class="box-header">--}}
            {{--<i class="ion ion-clipboard"></i>--}}

            {{--<h3 class="box-title">Tasks</h3>--}}


        {{--</div>--}}
        {{--<!-- /.box-header -->--}}
        {{--<div class="box-body">--}}
            {{--<ul class="todo-list ui-sortable">--}}

                {{--@foreach(Auth::user()->tasks as $task)--}}
                    {{--<li>--}}
                      {{--<span class="handle ui-sortable-handle">--}}
                        {{--<i class="fa fa-ellipsis-v"></i>--}}
                        {{--<i class="fa fa-ellipsis-v"></i>--}}
                      {{--</span>--}}
                        {{--<input value="" type="checkbox">--}}
                        {{--<a href="#" class="text show-modal" modal-act="show-task" modal-id="{{ $task->id }}">{{ $task->name }}</a>--}}
                        {{--<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>--}}

                        {{--<div class="label-mark-block hidden-xs">--}}
                            {{--$marks = explode(",", $task->mark);--}}
                        {{--@foreach($task->getMark() as $mark)--}}
                            {{--<span class="label" style='background-color:{{ $task::marks[$mark] }};'>{{ $mark }}</span>--}}
                        {{--@endforeach--}}
                        {{--</div>--}}

                        {{--<p class="about hidden-xs">{{ $task->about }}</p>--}}

                        {{--<div class="label-priority-block">--}}
                            {{--<span class="label" style='background-color:{{ $task::priority[$task->priority] }};'>{{ $task->priority }}</span>--}}
                        {{--</div>--}}

                        {{--<div class="user-detail">--}}
                            {{--<a href="#">{{ $task->user_from->name }}</a> -> <a href="#">{{ $task->user_to->name }}</a>--}}
                        {{--</div>--}}


                        {{--<div class="">--}}
                            {{--<span class="label">Default Label</span>--}}
                            {{--<span class="label">Default Label</span>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="tools">--}}
                            {{--<i class="fa fa-edit"></i>--}}
                            {{--<i class="fa fa-trash-o"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}

            {{--</ul>--}}
        {{--</div>--}}
        {{--<!-- /.box-body -->--}}
        {{--<div class="box-footer clearfix no-border">--}}
            {{--<div class="pull-right">--}}
                {{--<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>--}}
                {{--<button type="button" class="btn btn-primary show-modal" modal-act="create-task"><i class="fa fa-plus"></i> Add</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


</section>


@endsection