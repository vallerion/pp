<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Company;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Task;
use App\Team;
use App\User;


class WorkspaceController extends Controller
{
    private $teamController;
    private $projectController;
    private $companyController;
    private $taskController;

    public function __construct(){
        $this->teamController = new TeamController();
        $this->projectController = new ProjectController();
        $this->taskController = new TaskController();
    }

    public function __destruct(){
    }

    public function index(){
        return view("workspace.index");
    }
    
    public function getProfile(User $user){
        return $user->exists ?
                    view("workspace.profile", ['user' => $user]) :
                    view("workspace.profile", ['user' => Auth::user()]);
    }

    public function getProjects(Request $request, Project $project){

        if($project->exists){

            if($request->ajax()){

                switch ($request->type){

                    case 'modal':

                        return view("workspace.ajax_responce.modal_form.show_project", ['project' => $project]);
                        break;
                    case 'json':

                        return $project;
                        break;

                    case 'users':

                        return json_encode($project->users);
                        break;

                }


            }
            else
                return $project;


        }
        else
            return json_encode(Auth::user()->projects);
    }

    public function getProjectCreate(){
        return view("workspace.ajax_responce.modal_form.create_project");
    }

    public function postProjectCreate(Request $request){
        return $this->projectController->create($request->all());
    }

    public function getTeams(Request $request, Team $team){

//        if(Auth::user()->current_team_id != 'none')
//            return json_encode(Auth::user()->teams->where('id', Auth::user()->current_team_id));
//        else
//            return json_encode(Auth::user()->teams);

        if($team->exists){

            if($request->ajax()) {

                switch ($request->type){

                    case 'modal':

                        return view("workspace.ajax_responce.modal_form.show_team", ['team' => $team]);
                        break;
                    case 'json':

                        return $team;
                        break;

                    case 'projects':

                        return json_encode($team->projects);
                        break;

                }
            }
            else
                return $team;


        }
        else
            return json_encode(Auth::user()->teams);
    }

    public function getTeamCreate(){
        return view("workspace.ajax_responce.modal_form.create_team");
    }

    public function postTeamCreate(Request $request){
        return $this->teamController->create($request->all());
    }

    public function getTasks(Request $request, Task $task){
//        return view("workspace.tasks");
        if($task->exists){

            if($request->ajax())
                return view("workspace.ajax_responce.modal_form.show_task", ['task' => $task]);
            else
                return $task;


        }
        else
            return view("workspace.tasks");
    }

    public function getTaskCreate(){
        return view("workspace.ajax_responce.modal_form.create_task", ["marks" => Task::marks]);
    }

    public function postTaskCreate(Request $request){
        return $this->taskController->create($request->all());
    }

}