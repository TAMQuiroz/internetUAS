<?php

namespace Intranet\Http\Controllers\API\Psp\Phases;
use JWTAuth;
use Response;
use Illuminate\Http\Request;
use Intranet\Models\Phase;
use Intranet\Models\Teacher;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller as BaseController;

class PspPhasesController extends BaseController
{
    use Helpers;

    //Testeado y funcionando
    public function getAll()
    {
        
        $pspPhases = Phase::get();
        return $this->response->array($pspPhases->toArray());
    }
    
}   