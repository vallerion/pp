<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkspaceController extends Controller
{
    public function index(){
        return view("workspace.index");
    }

    public function getProjects(){

        return Auth::user()->company;

        return view("workspace.page.projects");
    }
}