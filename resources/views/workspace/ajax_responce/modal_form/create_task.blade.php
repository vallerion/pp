<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Создание задачи</h4>
            </div>
            <div class="modal-body">

                <form role="form6" action="workspace/tasks/create">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="about">Описание:</label>
                        <textarea class="form-control" rows="5" id="about" name="about"></textarea>
                    </div>

                    @if(count(Auth::user()->privilegesTeams) > 0)

                        <div class="form-group">
                            <label for="sel1">Select Team:</label>

                            <select class="selectpicker" name="team_id" data-live-search="true" data-size="5">

                            @foreach(Auth::user()->privilegesTeams as $team)
                                <option value="{{ $team->id }}" data-tokens="{{ $team->name }}">{{ $team->name }}</option>
                            @endforeach

                            {{--<option data-tokens="mustard">Burger, Shake and a Smile</option>--}}
                            {{--<option data-tokens="frosting">Sugar, Spice and all things nice</option>--}}
                            </select>


                        </div>

                    @endif

                    <div class="form-group">
                        <label for="sel1">Select User:</label>

                        <select class="selectpicker" name="user_to_id" data-live-search="true" data-size="5">

                            // TODO FIX THIS FUCKED
                            @foreach(Auth::user()->all_users() as $user)
                                <option value="{{ $user->id }}" data-tokens="{{ $user->name }}">{{ $user->name }}</option>
                            @endforeach

                            {{--<option data-tokens="mustard">Burger, Shake and a Smile</option>--}}
                            {{--<option data-tokens="frosting">Sugar, Spice and all things nice</option>--}}
                        </select>


                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" id="modal-submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </div>
</div>