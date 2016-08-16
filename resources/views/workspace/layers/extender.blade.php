@extends('workspace.layers.template')

@push('stylesheets')


<link rel="stylesheet" href="{{asset("css/workspace.css")}}">
{{--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-wysihtml5.css')}}">--}}
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css">-->

@endpush

@push('scripts')


<script src="{{asset('js/move_list.js')}}"></script>
<script src="{{asset('js/editable.js')}}"></script>

@endpush

@section('header')
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <!--<span class="logo-mini"><b>A</b>LT</span>-->
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>PIRA</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-envelope-o"></i>--}}
                            {{--<span class="label label-success">4</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">У вас 4 непрочитаных сообщения</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start message -->--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<img src="files/img_user/user5.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<h4>--}}
                                                {{--Костя Мусорин--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 8 mins</small>--}}
                                            {{--</h4>--}}
                                            {{--<p>лол</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end message -->--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<img src="files/img_user/user4.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<h4>--}}
                                                {{--Сергей Муравский--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 45 min</small>--}}
                                            {{--</h4>--}}
                                            {{--<p>Я дизайнер я так вижу</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<img src="files/img_user/user2.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<h4>--}}
                                                {{--Василий Беляев--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 1 hours</small>--}}
                                            {{--</h4>--}}
                                            {{--<p>халва 3 вышла</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<img src="files/img_user/user3.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<h4>--}}
                                                {{--Игорь Канарович--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 2 hours</small>--}}
                                            {{--</h4>--}}
                                            {{--<p>Вообще пиздец как кстати..ну такие инвалиды пиздос</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                    {{--<li class="dropdown notifications-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-bell-o"></i>--}}
                            {{--<span class="label label-warning">2</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">Два новых уведомления</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-users text-red"></i> 5 новых участников--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-user text-red"></i> Вы что-то сделали--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">View all</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- Tasks: style can be found in dropdown.less -->--}}
                    {{--<li class="dropdown tasks-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-flag-o"></i>--}}
                            {{--<span class="label label-danger">3</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">У вас 3 задачи</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<h3>--}}
                                                {{--Создать дизайн--}}
                                                {{--<small class="pull-right">20%</small>--}}
                                            {{--</h3>--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<div class="progress-bar progress-bar-red" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">20% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<h3>--}}
                                                {{--Добавить хуйни--}}
                                                {{--<small class="pull-right">40%</small>--}}
                                            {{--</h3>--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<div class="progress-bar progress-bar-red" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">40% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<h3>--}}
                                                {{--Заебашить пиздато--}}
                                                {{--<small class="pull-right">60%</small>--}}
                                            {{--</h3>--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<div class="progress-bar progress-bar-aqua" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">60% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer">--}}
                                {{--<a href="#">View all tasks</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ Auth::user()->image }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ Auth::user()->image }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->name }}
                                    <small><!-- TODO "about me" --></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Company</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Teams</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('workspace/project') }}">Projects</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('workspace/profile/' . Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
@endsection

@section('sidebar')
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Auth::user()->image }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </form>

            <ul class="sidebar-menu">
                <li class="header">МЕНЮ</li>
                <li class="treeview projects-section">

                    @if(count(Auth::user()->projects) > 0)

                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Проекты</span>
                            <i class="fa fa-plus pull-right plus" data-action="modal-create-project"></i>

                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu">
                            <!-- TODO вывод списка проектов -->

                            @for($i = 0; $i < count(Auth::user()->projects) && $i < 5; ++$i)
                                {{-- old <li><a class="show-modal" modal-act="show-project" modal-id="{{ Auth::user()->projects[$i]->id }}" href="#" ><i class="fa fa-circle-o"></i>{{ Auth::user()->projects[$i]->name }}</a></li>--}}
                                <li><a data-action="modal-project" data-id="{{ Auth::user()->projects[$i]->id }}" href="#" ><i class="fa fa-circle-o"></i>{{ Auth::user()->projects[$i]->name }}</a></li>
                            @endfor

                            <li class="divider"></li>
                            <li class="footer">
                                <a href="{{ url('workspace/project') }}">See all</a>
                            </li>
                        </ul>

                    @else
                        <a data-action="modal-create-project" href="#">
                            <i class="fa fa-cogs"></i> <span>Проекты</span>
                        </a>
                    @endif

                </li>

                @if(count(Auth::user()->projects) > 0)

                    <li class="treeview tasks-section">

                        @if(count(Auth::user()->tasks) > 0)

                            <a href="#">
                                <i class="fa fa-tasks"></i> <span>Задачи</span>
                                <i class="fa fa-plus pull-right plus" data-action="modal-create-task"></i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                @for($i = 0; $i < count(Auth::user()->tasks) && $i < 5; ++$i)
                                    {{-- old <li><a class="show-modal" modal-act="show-task" modal-id="{{ Auth::user()->tasks[$i]->id }}" href="#"><i class="fa fa-circle-o"></i>{{ strlen(Auth::user()->tasks[$i]->name) > 25 ? substr(Auth::user()->tasks[$i]->name, 0, 25).'...' :  Auth::user()->tasks[$i]->name }}</a></li>--}}
                                    <li><a data-action="modal-task" data-id="{{ Auth::user()->tasks[$i]->id }}" href="#"><i class="fa fa-circle-o"></i>{{ strlen(Auth::user()->tasks[$i]->name) > 25 ? substr(Auth::user()->tasks[$i]->name, 0, 25).'...' :  Auth::user()->tasks[$i]->name }}</a></li>
                                @endfor

                                <li class="divider"></li>
                                <li class="footer"><a href="{{ url('workspace/task') }}">See all</a></li>

                            </ul>

                        @else

                            <a data-action="modal-create-task"" href="#">
                                <i class="fa fa-tasks"></i> <span>Задачи</span>
                                <!-- <i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i> -->
                            </a>

                        @endif

                    </li>

                @endif

                <li class="treeview teams-section">

                    @if(Auth::user()->current_team_id == "none")

                        @if(count(Auth::user()->teams) > 0)

                            <a href="#">
                                <i class="fa fa-group"></i> <span>Команды</span>
                                <i class="fa fa-plus pull-right plus" data-action="modal-create-team"></i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">

                                @for($i = 0; $i < count(Auth::user()->teams) && $i < 5; ++$i)
                                    {{--<li><a class="show-modal" modal-act="show-team" modal-id="{{ Auth::user()->teams[$i]->id }}" href="#"><i class="fa fa-circle-o"></i>{{ Auth::user()->teams[$i]->name }}</a></li>--}}
                                    <li><a data-action="modal-team" data-id="{{ Auth::user()->teams[$i]->id }}" href="#"><i class="fa fa-circle-o"></i>{{ Auth::user()->teams[$i]->name }}</a></li>
                                @endfor

                                <li class="divider"></li>
                                <li class="footer"><a href="{{ url('workspace/team') }}">See all</a></li>

                            </ul>

                        @else

                            <a data-action="modal-create-team" href="#">
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
                                <li><a href="{{ url('workspace/profile/'.Auth::user()->member_my_team[$i]->id) }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->member_my_team[$i]->name }}</a></li>
                            @endfor

                            <li class="divider"></li>
                            <li class="footer"><a href="{{ url('workspace/myteams') }}">See all</a></li>

                        </ul>

                    @endif


                </li>
            </ul>



        </section>
        <!-- /.sidebar -->
    </aside>
@endsection

{{--@section('sidebar-menu')--}}
    {{--<ul class="sidebar-menu">--}}
        {{--<li class="header">МЕНЮ</li>--}}
        {{--<li class="treeview projects-section">--}}

            {{--@if(count(Auth::user()->projects) > 0)--}}

                {{--<a href="#">--}}
                    {{--<i class="fa fa-cogs"></i> <span>Проекты</span>--}}
                    {{--<i class="fa fa-plus pull-right plus show-modal" modal-act="create-project"></i>--}}

                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}

                {{--<ul class="treeview-menu">--}}
                    {{--<!-- TODO вывод списка проектов -->--}}

                    {{--@for($i = 0; $i < count(Auth::user()->projects) && $i < 5; ++$i)--}}
                        {{--<li><a href="workspace/projects/{{ Auth::user()->projects[$i]->id }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->projects[$i]->name }}</a></li>--}}
                    {{--@endfor--}}

                    {{--<li class="divider"></li>--}}
                    {{--<li class="footer"><a href="workspace/projects">See all {{ Auth::user()->current_id_team }}</a></li>--}}
                {{--</ul>--}}

            {{--@else--}}
                {{--<a class="show-modal" modal-act="create-project" href="#">--}}
                    {{--<i class="fa fa-cogs"></i> <span>Проекты</span>--}}
                {{--</a>--}}
            {{--@endif--}}

        {{--</li>--}}

        {{--@if(count(Auth::user()->projects) > 0)--}}

            {{--<li class="treeview tasks-section">--}}

                {{--@if(count(Auth::user()->tasks) > 0)--}}

                    {{--<a href="#">--}}
                        {{--<i class="fa fa-group"></i> <span>Задачи</span>--}}
                        {{--<i class="fa fa-plus pull-right plus show-modal" modal-act="create-task"></i>--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}

                        {{--@for($i = 0; $i < count(Auth::user()->tasks) && $i < 5; ++$i)--}}
                            {{--<li><a class="show-modal" modal-act="show-task" modal-task-id="{{ Auth::user()->tasks[$i]->id }}" href="#"><i class="fa fa-circle-o"></i>{{ strlen(Auth::user()->tasks[$i]->name) > 40 ? substr(Auth::user()->tasks[$i]->name, 0, 40).'...' :  Auth::user()->tasks[$i]->name }}</a></li>--}}
                        {{--@endfor--}}

                        {{--<li class="divider"></li>--}}
                        {{--<li class="footer"><a href="workspace/tasks">See all</a></li>--}}

                    {{--</ul>--}}

                {{--@else--}}

                    {{--<a class="show-modal" modal-act="create-task" href="#">--}}
                        {{--<i class="fa fa-group"></i> <span>Задачи</span>--}}
                        {{--<!-- <i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i> -->--}}
                    {{--</a>--}}

                {{--@endif--}}

            {{--</li>--}}

        {{--@endif--}}

        {{--<li class="treeview teams-section">--}}

            {{--@if(Auth::user()->current_team_id == "none")--}}

                {{--@if(count(Auth::user()->teams) > 0)--}}

                    {{--<a href="#">--}}
                        {{--<i class="fa fa-group"></i> <span>Команды</span>--}}
                        {{--<i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i>--}}
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}

                        {{--@for($i = 0; $i < count(Auth::user()->teams) && $i < 5; ++$i)--}}
                            {{--<li><a href="workspace/teams/{{ Auth::user()->teams[$i]->id }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->teams[$i]->name }}</a></li>--}}
                        {{--@endfor--}}

                        {{--<li class="divider"></li>--}}
                        {{--<li class="footer"><a href="workspace/teams/{{ Auth::user()->current_id_team }}">See all</a></li>--}}

                    {{--</ul>--}}

                {{--@else--}}

                    {{--<a class="show-modal" modal-act="create-team" href="#">--}}
                        {{--<i class="fa fa-group"></i> <span>Команды</span>--}}
                        {{--<!-- <i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i> -->--}}
                    {{--</a>--}}


                {{--@endif--}}

            {{--@else--}}

                {{--<a href="#">--}}
                    {{--<i class="fa fa-group"></i> <span>Моя команда</span>--}}
                    {{--<i class="fa fa-plus pull-right plus show-modal" modal-act="create-team"></i>--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}

                    {{--@for($i = 0; $i < count(Auth::user()->member_my_team) && $i < 5; ++$i)--}}
                        {{--<li><a href="workspace/profile/{{ Auth::user()->member_my_team[$i]->id }}"><i class="fa fa-circle-o"></i>{{ Auth::user()->member_my_team[$i]->name }}</a></li>--}}
                    {{--@endfor--}}

                    {{--<li class="divider"></li>--}}
                    {{--<li class="footer"><a href="workspace/myteams">See all</a></li>--}}

                {{--</ul>--}}

            {{--@endif--}}


        {{--</li>--}}
    {{--</ul>--}}
{{--@endsection--}}