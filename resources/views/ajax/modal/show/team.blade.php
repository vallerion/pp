<div class="modal fade" id="modal-block" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <a href="{{ url('workspace/team/' . $team->id) }}"><h4 class="modal-title" id="name">{{ $team->name }} </h4></a>
            </div>
            <div class="modal-body">

                {!! csrf_field() !!}

                {{--<label for="about">Описание:</label>--}}
                <span id="about">{!! $team->about !!}</span>

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