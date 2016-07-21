<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="name">{{ $project->name }} </h4>
</div>
<div class="modal-body">

    {!! csrf_field() !!}

    <label for="about">Описание:</label>
    <textarea class="form-control" rows="5" id="about" name="about"></textarea>

    <div class="checkbox">
        <label><input checked name="visible" type="checkbox">Публичная команда</label>
    </div>

</div>
{{--<div class="modal-footer">--}}
    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>--}}
    {{--<button type="button" id="modal-submit" class="btn btn-primary">Создать</button>--}}
{{--</div>--}}
