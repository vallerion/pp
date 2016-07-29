@extends('workspace.layers.extender')

@section('title', 'Tasks')

@section('content')

    <link rel="stylesheet" href="{{asset("css/task.css")}}">

<section class="content-header">
    <h1>
        My tasks
    </h1>
    <!-- TODO сделать лист для заметок -->
</section>

    <!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>

            <h3 class="box-title">Tasks</h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="todo-list ui-sortable">

                @foreach(Auth::user()->tasks as $task)
                    <li>
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                        {{--<input value="" type="checkbox">--}}
                        <a href="#" class="text">{{ $task->name }}</a>
                        {{--<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>--}}

                        <div class="label-mark-block hidden-xs">
                            {{--$marks = explode(",", $task->mark);--}}
                        @foreach($task->getMark() as $mark)
                            <span class="label" style='background-color:{{ $task::marks[$mark] }};'>{{ $mark }}</span>
                        @endforeach
                        </div>

                        <p class="about hidden-xs">{{ $task->about }}</p>

                        <div class="label-priority-block">
                            <span class="label" style='background-color:{{ $task::priority[$task->priority] }};'>{{ $task->priority }}</span>
                        </div>

                        <div class="user-detail">
                            <a href="#">{{ $task->user_from->name }}</a> -> <a href="#">{{ $task->user_to->name }}</a>
                        </div>


                        {{--<div class="">--}}
                            {{--<span class="label">Default Label</span>--}}
                            {{--<span class="label">Default Label</span>--}}
                        {{--</div>--}}
                        <a href="#" class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
            <div class="pull-right">
                {{--<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>--}}
                <button type="button" class="btn btn-primary show-modal" modal-act="create-task"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
    </div>


</section>


@endsection