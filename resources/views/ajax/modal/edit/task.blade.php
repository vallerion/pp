<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Изменение задачи</h4>
            </div>
            <div class="modal-body">

                <form role="form6" action="workspace/task/{{ $task->id }}" method="put">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="name">Название:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}">
                    </div>
                    <div class="form-group">
                        <label for="about">Описание:</label>
                        {{--<textarea class="form-control" rows="5" id="about" name="about"></textarea>--}}
                        {{--<textarea class="textarea" placeholder="Enter text ..." rows="5"  style="width: 100%; height: 200px;"></textarea>--}}

                        @include('workspace.forms.text-editor', ["content" => $task->about])

                    </div>

                    <div class="form-group">
                        <label>Метки:</label>
                        <select class="selectpicker" data-width="30%" data-max-options="2" name="mark[]" multiple>

                            @foreach($task::marks as $key => $color)

                                @if(!empty($task->getMark()) && in_array($key, $task->getMark()))
                                    <option selected value="{{ $key }}" data-content="<span class='label' style='background-color:{{ $color }};'>{{ $key }}</span>">{{ $key }}</option>
                                @else
                                    <option value="{{ $key }}" data-content="<span class='label' style='background-color:{{ $color }};'>{{ $key }}</span>">{{ $key }}</option>
                                @endif


                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Приоритет:</label>
                        <select class="selectpicker" data-width="30%" name="priority">

                            @for($i = 1; $i < 11; ++$i)

                                @if($task->priority == $i)
                                    <option selected value="{{ $i }}">{{ $i }}</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif

                            @endfor

                        </select>
                    </div>

                    {{--<div style="width: 100%;height: 1px;background-color: #e5e5e5;margin-bottom: 15px;"></div>--}}
                    <hr>


                    <div class="form-group" style="display: inline;">
                        {{--<label for="sel1">Select Project:</label><br>--}}

                        <input name="user_to_id" type="hidden" value="{{ $task->user_to->id }}">
                        <a href="#" data-action="user-info" data-id="{{ $task->user_to->id }}">{{ $task->user_to->name }}</a>
                        {{--<input name="user_to_id" class="btn btn-default" data-action="user-info" data-id="{{ $task->user_to->id }}" type="button" value="{{ $task->user_to->name }}">--}}
                    </div>




                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" data-action="modal-submit" class="btn btn-primary">Обновить</button>
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