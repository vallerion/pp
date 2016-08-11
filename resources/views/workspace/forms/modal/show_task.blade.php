<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                @if($task->status == 0)
                    <a title="closed" href="{{ url('workspace/task/' . $task->id) }}"><h4 class="modal-title header-text-task-closed" id="name">{{ $task->name }} </h4></a>
                @else
                    <a href="{{ url('workspace/task/' . $task->id) }}"><h4 class="modal-title" id="name">{{ $task->name }} </h4></a>
                @endif
            </div>
            <div class="modal-body">

                {!! csrf_field() !!}

                <label for="about">Описание:</label><br>
                <span id="about">{!! $task->about !!}</span>

                {{--<div class="checkbox">--}}
                {{--<label><input checked name="visible" type="checkbox">Публичная команда</label>--}}
                {{--</div>--}}

            </div>
            <div class="modal-block">
                
                <div class="row header-modal-block">

                    <div class="pull-left image">
                        <img src="{{ $task->user_from->image }}" alt="{{ $task->user_from->name }}">
                    </div>

                    <a href="#">{{ $task->user_from->name }}</a>

                </div>

                <div class="body-modal-block">
                    <span>{{ $task->created_at . " " . $task->user_from->name }} created the task</span>
                </div>

                {{--<span>12.12.12 author created the task</span>--}}

                {{--<label for="about">Описание:</label><br>--}}
                {{--<span id="about">{!! $task->about !!}</span>--}}

                {{--<div class="checkbox">--}}
                {{--<label><input checked name="visible" type="checkbox">Публичная команда</label>--}}
                {{--</div>--}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                {{--<button type="button" id="modal-submit" class="btn btn-primary">Создать</button>--}}
            </div>
        </div>
    </div>
</div>