<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Company;
use App\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TeamController;

class WorkspaceController extends Controller
{
    private $teamController;
    private $projectController;
    private $companyController;

    public function __construct(){
        $this->teamController = new TeamController();
    }

    public function __destruct(){
    }

    public function index(){
        return view("workspace.index");
    }

    public function getProjects(){
        return Auth::user()->projects;
    }

    public function getTeams(){
        return Auth::user()->teams;
    }
    
    public function getTeamCreateFirst(){
        return view("workspace.ajax_responce.modal_form.create_first_team");
    }

    public function getTeamCreate(){
        return view("workspace.ajax_responce.modal_form.create_team");
    }

    public function postTeamCreate(Request $request){
        return $this->teamController->create($request->all());
    }
}