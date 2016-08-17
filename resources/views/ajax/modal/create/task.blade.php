<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Создание задачи</h4>
            </div>
            <div class="modal-body">

                <form role="form6" action="workspace/task">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="about">Описание:</label>
                        {{--<textarea class="form-control" rows="5" id="about" name="about"></textarea>--}}
                        {{--<textarea class="textarea" placeholder="Enter text ..." rows="5"  style="width: 100%; height: 200px;"></textarea>--}}

                        @include('workspace.forms.text-editor')

                    </div>

                    <div class="form-group">
                        <select class="selectpicker" data-width="30%" data-max-options="2" name="mark[]" multiple>

                            @foreach($marks as $key => $color)

                                <option value="{{ $key }}" data-content="<span class='label' style='background-color:{{ $color }};'>{{ $key }}</span>">{{ $key }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <select class="selectpicker" data-width="30%" name="priority">

                            @for($i = 1; $i < 11; ++$i)

                                <option value="{{ $i }}">{{ $i }}</option>

                            @endfor

                        </select>
                    </div>

                    {{--<div style="width: 100%;height: 1px;background-color: #e5e5e5;margin-bottom: 15px;"></div>--}}
                    <hr>
                    @if(count(Auth::user()->privilegesTeams) > 0)

                        <div class="form-group" style="display: inline;">
                            {{--<label for="sel1">Select Team:</label><br>--}}

                            <select id="team" class="selectpicker" data-width="32%" data-live-search="true" data-size="5">

                                <option value="0"><b>Select Team</b></option>

                            @foreach(Auth::user()->privilegesTeams as $team)
                                <option value="{{ $team->id }}" data-tokens="{{ $team->name }}">{{ $team->name }}</option>
                            @endforeach

                            </select>

                        </div>

                        <div class="form-group" style="display: none;">
                            {{--<label for="sel1">Select Project:</label><br>--}}

                            <select id="project" class="selectpicker" data-width="32%" name="project_id" data-live-search="true" data-size="5">
                                <option value="0"><b>Select Project</b></option>
                            </select>

                        </div>

                    @else

                        <div class="form-group" style="display: inline;">
                            {{--<label for="sel1">Select Project:</label><br>--}}

                            <select id="project" class="selectpicker" data-width="32%" name="project_id" data-live-search="true" data-size="5">

                                <option value="0"><b>Select Project</b></option>

                                @foreach(Auth::user()->privilegesProjects as $project)
                                    <option value="{{ $project->id }}" data-tokens="{{ $project->name }}">{{ $project->name }}</option>
                                @endforeach

                            </select>

                        </div>



                    @endif





                    <div class="form-group" style="display: none;">
                        {{--<label for="sel1">Select User:</label><br>--}}

                        <select id="user_to" class="selectpicker" data-width="32%" name="user_to_id" data-live-search="true" data-size="5">
                            <option value="0"><b>Select User</b></option>
                        </select>

                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" data-action="modal-submit" class="btn btn-primary">Создать</button>
            </div>
        </div>
    </div>

    <script>


        $('.selectpicker').on('change', function(){

            var selected = $(this).find("option:selected").val();
            var id = $(this).attr("id");

            console.log(selected);

            switch (id){
                case 'team':

                    refreshSelectpicker('project', window.location.origin + '/ajax/team/' + selected + '/projects');

                    break;
                case 'project':

                    refreshSelectpicker('user_to', window.location.origin + '/ajax/project/' + selected + '/users');

                    break;
            }

        });

        function refreshSelectpicker(id_selectpicker, url){

            var $selectpicker = $(" .selectpicker#" + id_selectpicker);
            $selectpicker.parent().parent().css('display', 'none');

            $.get(url, function(data){
                console.log(data);
                var responce = $.parseJSON(data);

                if(responce.length > 0){
                    $selectpicker.parent().parent().css('display', 'inline');
                    $selectpicker.find(':not([value="0"])').remove();
                }

                responce.forEach(function(item, index) {

                    $selectpicker.append('<option value="' + item.id + '" data-tokens="' + item.name + '">' + item.name + '</option>');
                });

                $selectpicker.selectpicker('refresh');

            });
        }
    </script>
</div>