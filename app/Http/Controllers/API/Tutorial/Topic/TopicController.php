<?php

namespace Intranet\Http\Controllers\API\Tutorial\Topic;

use Illuminate\Http\Request;
use Intranet\Models\Topic;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;
//Tested
class TopicController extends BaseController
{
    use Helpers;
    
    public function getAll()
    {
        $topics = Topic::get();
        return $this->response->array($topics->toArray());
    }
    
    public function getById($id)
    {        
        $topic = Topic::where('id',$id)->get();
        return $this->response->array($topic->toArray());
    }

}  