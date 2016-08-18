<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Создание проекта</h4>
            </div>
            <div class="modal-body">

                <form role="form6" action="workspace/project" method="put">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
                    </div>
                    <div class="form-group">
                        <label for="about">Описание:</label>
                        {{--<textarea class="form-control" rows="5" id="about" name="about"></textarea>--}}
                        {{--<textarea id="about" name="about" class="textarea form-control" placeholder="Enter text ..." rows="5" style="width: 100%;"></textarea>--}}

                        @include('workspace.forms.text-editor', [$content => $project->about])

                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                @if($project->visible == 0)
                                    <input name="visible" type="checkbox">
                                @else
                                    <input checked name="visible" type="checkbox">

                                Публичный проект
                            </label>
                        </div>
                    </div>

                    @if($project->teams()->count() > 0)

                    <div class="form-group">
                        <label for="name">Команды:</label>
                        @foreach($project->teams as $team)

                            <a href="#">{{ $team->name }}  </a>

                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="name">Участники:</label>
                        @foreach($project->users as $user)

                            <a href="#" data-action="user-info" data-id="{{ $user->id }}">{{ $user->name }}  </a>

                        @endforeach
                    </div>

                    @endif



                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" data-action="modal-submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </div>
</div>