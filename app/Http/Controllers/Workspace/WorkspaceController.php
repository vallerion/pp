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

    public function getProjects(){
        return json_encode(Auth::user()->projects);
    }

    public function getTeams(){

        if(Auth::user()->current_team_id != 'none')
            return json_encode(Auth::user()->teams->where('id', Auth::user()->current_team_id));
        else
            return json_encode(Auth::user()->teams);
    }

    public function getTeamCreate(){
        return view("workspace.ajax_responce.modal_form.create_team");
    }

    public function postTeamCreate(Request $request){
        return $this->teamController->create($request->all());
    }

    public function getProjectCreate(){
        return view("workspace.ajax_responce.modal_form.create_project");
    }

    public function postProjectCreate(Request $request){
        return $this->projectController->create($request->all());
    }

    public function getTasks(){
        return view("workspace.tasks");
    }

    public function getTaskCreate(){
        return view("workspace.ajax_responce.modal_form.create_task");
    }

    public function postTaskCreate(Request $request){
        return $this->taskController->create($request->all());
    }

}