@extends('workspace.layers.extender')

@section('title', 'Projects')

@section('sidebar-menu')
    <ul class="sidebar-menu">
        <li class="header">МЕНЮ</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i> <span>Проекты</span>
                <i class="fa fa-plus pull-right plus"></i>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <!-- TODO вывод списка проектов -->
                <li><a href="#"><i class="fa fa-circle-o"></i>Project1</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Project2</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Project3</a></li>
                <li class="divider"></li>
                <li class="footer"><a href="workspace/projects">See all</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-tasks"></i> <span>Задачи</span>
                <i class="fa fa-plus pull-right plus"></i>
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
            <a href="#">
                <i class="fa fa-group"></i> <span>Команда</span>
            </a>
        </li>
    </ul>
@endsection

@section('content')
<section class="content-header">
    <h1>
        Projects
    </h1>
    <!-- TODO сделать лист для заметок -->
</section>

    <!-- Main content -->
<section class="content">
        <!-- Small boxes (Stat box) -->
    <div class="row">

    </div>
    <!-- /.row (main row) -->

</section>
    @endsection