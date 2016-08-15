<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                {{--<div class="tools">--}}
                    {{--<a href="#" class="btn btn-primary hvr-bounce-in"><i class="fa fa-check"></i></a>--}}
                {{--</div>--}}
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

            </div>

            {{--<div class="modal-block">--}}
                {{----}}
                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="{{ $task->user_from->image }}" alt="{{ $task->user_from->name }}">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">{{ $task->user_from->name }}</a>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at)) }}</span>--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block text-blue">--}}
                    {{--<i class="fa fa-arrow-up" aria-hidden="true"></i>--}}
                    {{--<span>Created this task</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-block">--}}

                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="http://pira.loc/img/user_avatars/2.png" alt="SuperUser">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">SuperUser</a>--}}
                        {{--<span class="pull-right text-muted">13.08.16 12:14</span>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at . "+4 hours")) }}</span>--}}
                        {{--+1 week 2 days 4 hours 2 seconds--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block text-green">--}}
                    {{--<i class="fa fa-check-circle-o" aria-hidden="true"></i>--}}
                    {{--<span>Closed this task</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-block">--}}

                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="http://pira.loc/img/user_avatars/2.png" alt="SuperUser">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">SuperUser</a>--}}
                        {{--<span class="pull-right text-muted">13.08.16 17:03</span>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at . "+4 hours 34 min")) }}</span>--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block text-danger">--}}
                    {{--<i class="fa fa-refresh" aria-hidden="true"></i>--}}
                    {{--<span>Reopen this task</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-block">--}}

                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="{{ $task->user_from->image }}" alt="{{ $task->user_from->name }}">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">{{ $task->user_from->name }}</a>--}}
                        {{--<span class="pull-right text-muted">13.08.16 17:43</span>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at . "+4 hours 39 min")) }}</span>--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block">--}}
                    {{--<span>wtf!?</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-block">--}}

                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="http://pira.loc/img/user_avatars/2.png" alt="SuperUser">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">SuperUser</a>--}}
                        {{--<span class="pull-right text-muted">13.08.16 17:45</span>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at . "+4 hours 48 min")) }}</span>--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block text-danger">--}}
                    {{--<i class="fa fa-exchange" aria-hidden="true"></i>--}}
                    {{--<span>Switched to--}}

                        {{--<span class="label" style='background-color:#d84315;'>test</span>--}}

                        {{--@foreach($task->getMark() as $mark)--}}
                            {{--<span class="label" style='background-color:{{ $task::marks[$mark] }};'>{{ $mark }}</span>--}}
                        {{--@endforeach--}}

                    {{--</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-block">--}}

                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="{{ $task->user_from->image }}" alt="{{ $task->user_from->name }}">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">{{ $task->user_from->name }}</a>--}}
                        {{--<span class="pull-right text-muted">13.08.16 17:53</span>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at . "+4 hours 52 min")) }}</span>--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block">--}}
                    {{--<span>Ok. TEST</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-block">--}}

                {{--<div class="row header-modal-block">--}}

                    {{--<div class="pull-left image">--}}
                        {{--<img src="http://pira.loc/img/user_avatars/2.png" alt="SuperUser">--}}
                    {{--</div>--}}

                    {{--<div class="headline">--}}
                        {{--<a href="#">SuperUser</a>--}}
                        {{--<span class="pull-right text-muted">13.08.16 18:15</span>--}}
                        {{--<span class="pull-right text-muted">{{ date("d.m.y H:i", strtotime($task->created_at . "+5 hours 2 min")) }}</span>--}}
                    {{--</div>--}}


                {{--</div>--}}

                {{--<div class="body-modal-block text-green">--}}
                    {{--<i class="fa fa-check-circle-o" aria-hidden="true"></i>--}}
                    {{--<span>Closed this task</span>--}}
                {{--</div>--}}

            {{--</div>--}}

            <div class="modal-footer">
                @if($task->status == 0)
                    <a href="{{ url('workspace/task/' . $task->id . '/action?action=open') }}" class="btn btn-danger" data-id="{{ $task->id }}" data-action="reopen-task" data-dismiss="modal"><i class="fa fa-refresh"></i> Reopen</a>
                @else
{{--                    <a href="{{ url('workspace/task/' . $task->id . '/action?action=open') }}" class="btn btn-danger" data-id="{{ $task->project_id }}" data-action="reopen-task" data-dismiss="modal"><i class="fa fa-refresh"></i> Reopen</a>--}}
                    {{--<a class="btn btn-success" ><i class="fa fa-check"></i> Apply</a>--}}
                    <a href="{{ url('workspace/task/' . $task->id . '/action?action=close') }}" class="btn btn-success" data-id="{{ $task->id }}" data-action="apply-task" data-dismiss="modal"><i class="fa fa-check"></i> Apply</a>
                @endif
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{--<button type="button" id="modal-submit" class="btn btn-primary">Создать</button>--}}
            </div>
        </div>
    </div>
</div>