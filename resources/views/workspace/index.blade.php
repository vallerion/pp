@extends('workspace.layers.extender')

@section('title', 'Projects')

@section('sidebar-menu')
    <ul class="sidebar-menu">
        <li class="header">МЕНЮ</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i> <span>Проекты</span>
                <i class="fa fa-plus pull-right plus show-modal" modal-act="create-project"></i>
                @if(count(Auth::user()->projects) > 0)
                    <i class="fa fa-angle-left pull-right"></i>
                @endif
            </a>
            <ul class="treeview-menu">
                <!-- TODO вывод списка проектов -->

                @for($i = 0; $i < count(Auth::user()->projects) && $i < 5; ++$i)
                    <li><a href="workspace/projects/{{ Auth::user()->projects[$i]->id }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->projects[$i]->name }}</a></li>
                @endfor

                <li class="divider"></li>
                <li class="footer"><a href="workspace/projects">See all {{ Auth::user()->current_id_team }}</a></li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-tasks"></i> <span>Задачи</span>
                <i class="fa fa-plus pull-right plus show-modal" modal-act="create-task"></i>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <!-- TODO вывод списка задач -->
                <li><a href="#"><i class="fa fa-circle-o"></i>Задача1</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Задача2</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Задача3</a></li>
                <li class="divider"></li>
                <li class="footer"><a href="workspace/projects">See all</a></li>
            </ul>
        </li>

        <li class="treeview">

            @if(Auth::user()->current_team_id == "none")

                @if(count(Auth::user()->teams) > 0)

                    <a href="#">
                        <i class="fa fa-group"></i> <span>Команды</span>
                        <i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        @for($i = 0; $i < count(Auth::user()->teams) && $i < 5; ++$i)
                            <li><a href="workspace/teams/{{ Auth::user()->teams[$i]->id }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->teams[$i]->name }}</a></li>
                        @endfor

                        <li class="divider"></li>
                        <li class="footer"><a href="workspace/teams/{{ Auth::user()->current_id_team }}">See all</a></li>

                    </ul>

                @else

                    <a class="show-modal" modal-act="create-first-team" href="#">
                        <i class="fa fa-group"></i> <span>Команды</span>
                        <!-- <i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i> -->
                    </a>


                @endif

            @else

                <a href="#">
                    <i class="fa fa-group"></i> <span>Моя команда</span>
                    <i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    @for($i = 0; $i < count(Auth::user()->member_my_team) && $i < 5; ++$i)
                        <li><a href="workspace/profile/{{ Auth::user()->member_my_team[$i]->id }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->member_my_team[$i]->name }}</a></li>
                    @endfor

                    <li class="divider"></li>
                    <li class="footer"><a href="workspace/myteams">See all</a></li>

                </ul>

            @endif


        </li>
    </ul>
@endsection

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
    </div>
    <!-- /.row (main row) -->

</section>
    @endsection