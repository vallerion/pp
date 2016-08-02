<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class WorkspaceController extends Controller
{

    public function __construct(){
    }

    public function __destruct(){
    }

    public function index(){
        return view("workspace.index");
    }

}