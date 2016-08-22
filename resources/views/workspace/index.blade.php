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

        <button type="button" class="btn btn-primary btn-lg" data-target="#modal" data-toggle="modal">
            Launch demo modal
        </button>
    <!-- TODO вывод последних событий компании, команды, проекта -->
        {{--<h4 class="modal-title" id="name">{{ $project->name }} </h4>--}}
        <div class="modal fade" id="modal" aria-labelledby="modalLabel" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Crop the image</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <img id="image" src="../img/picture.jpg" alt="Picture">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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