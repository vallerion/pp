

@foreach($tasks as $task)

    @if($task->status == 0)
        <li class="row task-row" style="border-left: 20px solid #c5c5c5;" data-id="{{ $task->id }}">
    @else
        <li class="row task-row" style="border-left: 20px solid #3c8dbc;" data-id="{{ $task->id }}">
    @endif

            <div class="col-xs-3 col-md-5 task-name">
                <span class="handle ui-sortable-handle hidden-xs">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>

                @if($task->status == 0)
                    <a href="#" class="text-task-closed text" data-action="modal-task" data-id="{{ $task->id }}">{{ $task->name }}</a>
                @else
                    <a href="#" class="text" data-action="modal-task" data-id="{{ $task->id }}">{{ $task->name }}</a>
                @endif

                <div class="label-mark-block hidden-xs">
                    @foreach($task->getMark() as $mark)
                        <span class="label" style='background-color:{{ $task::marks[$mark] }};'>{{ $mark }}</span>
                    @endforeach
                </div>

                <?php
                    $about = Helper::filterHtml($task->about);
                    $about = strlen($about) > 90 ? substr($about, 0, 90) . ' ...' : $about;
                ?>
                <p class="about hidden-xs">{{ $about }}</p>
            </div>

            <div class="label-priority-block col-xs-1 col-md-1">
                <span class="label" style='background-color:{{ $task::priority[$task->priority] }};'>{{ $task->priority }}</span>
            </div>

            <div class="user-detail col-xs-4 col-md-4">
                <a href="#" data-action="user-info" data-id="{{ $task->user_from->id }}">{{ $task->user_from->name }}</a> ->
                <a href="#" data-action="user-info" data-id="{{ $task->user_to->id }}">{{ $task->user_to->name }}</a>
            </div>

            <div class="tools col-xs-4 col-md-2 pull-right">
                <a href="#" class="btn-xs btn-primary hvr-bounce-in">
                    <i class="fa fa-pencil"></i>
                </a>
                <a data-action="delete-task" href="#" class="btn-xs btn-danger hvr-bounce-in col-xs-offset-1">
                    <i class="fa fa-trash-o"></i>
                </a>
            </div>
        </li>

@endforeach