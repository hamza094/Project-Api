<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    public function index(){

        $projects=Project::all();

        foreach($projects as $project){
        	$project->update(['status'=>'OFF']);
        }

        return ProjectResource::collection($projects);
    }

    public function show(Project $project){

       $project->update(['status'=>'ON']);

    	return new ProjectResource($project);
    }
}
