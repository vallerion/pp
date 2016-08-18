@extends('workspace.layers.extender')

@section('title', 'Projects')



@section('content')
<section class="content-header">
    <h1>
        Latest events
    </h1>
    <!-- TODO сделать лист для заметок -->
</section>

    <!-- Main content -->
<section class="content">
        <!-- Small boxes (Stat box) -->
    <div class="row">
    <!-- TODO вывод последних событий компании, команды, проекта -->
        {{--<h4 class="modal-title" id="name">{{ $project->name }} </h4>--}}
        <a style="margin-left:20px;margin-top: 100px;" class="btn btn-success btn-confirm"><i class="fa fa-check"></i> Apply</a>
        <a style="margin-left:20px;margin-top: 100px;" class="btn btn-default btn-confirm">
            Are you sure?
            <button class="btn btn-success">Yes</button>
            <button class="btn btn-danger">No</button>
        </a>

    </div>
    <!-- /.row (main row) -->

</section>

{{--<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-sm">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                {{--<h4 class="modal-title">Are you sure?</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn col-md-5 col-md-offset-1 btn-success" data-dismiss="modal">Ok</button>--}}
                {{--<button type="button" class="btn col-md-5 btn-danger" data-dismiss="modal">Cancel</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection