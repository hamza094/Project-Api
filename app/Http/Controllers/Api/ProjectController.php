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

        $allProjects= ProjectResource::collection($projects);

         $response=[
        'info'=>'List of all projects',
        'project'=>$allProjects
     ];
      
        return response()->json($response,200);

    }

    public function show(Project $project){

       $project->update(['status'=>'ON']);

       $project= new ProjectResource($project);

      $response=[
        'info'=>'Specific Project Information',
        'project'=>$project
     ];

      return response()->json($response,200);
       
    }
}
