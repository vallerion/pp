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
        <style>
            .hvr-bounce-in {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: translateZ(0);
                transform: translateZ(0);
                box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -moz-osx-font-smoothing: grayscale;
                -webkit-transition-duration: 0.5s;
                transition-duration: 0.5s;
            }
            .hvr-bounce-in:hover, .hvr-bounce-in:focus, .hvr-bounce-in:active {
                -webkit-transform: scale(1.2);
                transform: scale(1.2);
                -webkit-transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
                transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
            }
        </style>
    <!-- TODO вывод последних событий компании, команды, проекта -->
        {{--<h4 class="modal-title" id="name">{{ $project->name }} </h4>--}}
        <div class="btn btn-default hvr-bounce-in"></div>
    </div>
    <!-- /.row (main row) -->

</section>
@endsection