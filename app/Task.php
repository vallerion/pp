<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    const marks = [
                        "dev" => "#3c8dbc",
                        "test" => "#d84315",
                        "design" => "#00695c"
                    ];

    const priority = [  "",
                        "#424242", "#455a64",
                        "#824444", "#0091ea",
                        "#827717", "#00c853",
                        "#ff6d00", "#e65100",
                        "#ff5722", "#d50000"
                    ];

//    const status = [
//                        ["name" => "closed", "color" => "#d50000"],
//                        ["name" => "open", "color" => "#3c8dbc"],
//                        ["name" => "reopen", "color" => "#00c853"],
//                        ["name" => "test", "color" => "#00695c"]
//                    ];

    protected $fillable = [
        'name', 'about', 'priority', 'mark', 'user_to_id', 'user_from_id', 'project_id', 'status'
    ];

    protected $hidden = [
        'user_to_id', 'user_from_id', 'project_id', 'created_at', 'updated_at'
    ];

    public function user_to(){
        return $this->belongsTo('App\User', 'user_to_id');
    }

    public function user_from(){
        return $this->belongsTo('App\User', 'user_from_id');
    }

    public function project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function getMark(){
        return empty($this->mark) ? [] : explode(",", $this->mark);
    }

    public function close(){
        return $this->update(["status" => 0]);
    }

    public function open(){
        return $this->update(["status" => 1]);
    }

    static function toHtml($tasks){

        $tasks->map(function($task){
            $task->transformToHtml();
        });

        return $tasks;
    }

    private function transformToHtml(){

        $this->about = \Helper::filterHtml($this->about);

        $this->priority = "<span class=\"label\" style='background-color:" . $this::priority[$this->priority] . ";'>" . $this->priority . "</span>";

        $marks = "";
        foreach ($this->getMark() as $mark){
            $marks .= "<span class=\"label\" style='background-color:" . $this::marks[$mark] . ";'>" . $mark . "</span>";
        }

        $this->mark = $marks;

        $this->status = $this->status == 0 ? "#c5c5c5" : $this::status[$this->status]["color"];



    }
}
