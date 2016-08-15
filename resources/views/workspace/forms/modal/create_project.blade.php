<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Создание проекта</h4>
            </div>
            <div class="modal-body">

                <form role="form6" action="workspace/project">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="about">Описание:</label>
                        {{--<textarea class="form-control" rows="5" id="about" name="about"></textarea>--}}
                        {{--<textarea id="about" name="about" class="textarea form-control" placeholder="Enter text ..." rows="5" style="width: 100%;"></textarea>--}}

                        @include('workspace.forms.text-editor')

                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input checked name="visible" type="checkbox">Публичный проект</label>
                        </div>
                    </div>

                    @if(count(Auth::user()->privilegesTeams) > 0)

                        <div class="form-group" style="display: inline;">
                            {{--<label for="sel1">Select Team:</label><br>--}}

                            <select id="team" class="selectpicker" name="team_id" data-width="33%" data-live-search="true" data-size="5">

                                <option value="0"><b>Select Team</b></option>

                                @foreach(Auth::user()->privilegesTeams as $team)
                                    <option value="{{ $team->id }}" data-tokens="{{ $team->name }}">{{ $team->name }}</option>
                                @endforeach

                            </select>

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