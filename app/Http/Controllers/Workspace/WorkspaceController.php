<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WorkspaceController extends Controller
{
    public function index(){
        return view("workspace.page.projects", ['title' => '123']);
    }
}