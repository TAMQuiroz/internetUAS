<?php

namespace Intranet\Http\Controllers\API\Uas\Course;

use Illuminate\Http\Request;
use Intranet\Models\Course;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Tested
class CourseController extends BaseController
{
    use Helpers;
    
    public function getAll()
    {
        $courses = Course::get();
        return $this->response->array($courses->toArray());
    }
    
    public function getById($id)
    {        
        $course = Course::where('id',$id)->get();
        return $this->response->array($course->toArray());
    }

}  