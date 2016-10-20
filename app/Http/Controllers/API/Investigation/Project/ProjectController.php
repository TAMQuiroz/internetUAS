<?php

namespace Intranet\Http\Controllers\API\Psp\Project;

use Illuminate\Http\Request;
use Intranet\Models\Project;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Sin testear
class ProjectController extends BaseController
{
    use Helpers;
       
    public function getAll()
    {
        $project = Project::with('area')->with('group')->with('status')->get();
                
        return $this->response->array($project->toArray());
    }

    
    public function getById($id)
    {
        $project = Project::where('id',$id)->with('area')->with('group')->with('status')->get();
        return $this->response->array($project->toArray());
    }

   
}   