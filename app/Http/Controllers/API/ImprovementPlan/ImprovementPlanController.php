<?php

namespace Intranet\Http\Controllers\API\ImprovementPlan;

use JWTAuth;
use Response;
use Intranet\Models\ImprovementPlan;
use Intranet\Models\Suggestion;
use Intranet\Models\ActionPlan;
use Intranet\Models\Teacher;
use Intranet\Models\FileCertificate;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
class ImprovementPlanController extends BaseController
{
    use Helpers;

    public function __construct()
    {
       
    }


    public function getipbyId($ip_id){
      $ip = ImprovementPlan::where('IdPlanMejora',$ip_id)->with('teacher','typeImprovementPlan', 'file')->first();
      //dd($ip);
      return response()->json($ip);

    }

    public function getActionsofIp($ip_id){
      $actions = ActionPlan::where('IdPlanMejora',$ip_id)->with('teacher', 'cicle')->get();      
      
      foreach ($actions as &$action){
        $idarch = $action->IdArchivoEntrada;
        $arch = FileCertificate::where('IdArchivoEntrada', $idarch)->first();
        if ($arch != null) $action->file = $arch;

      }
      

      return response()->json($actions);
    }

    public function createSuggestion(Request $request,$ip_id){
        $teacher_id = $request->only('idDocente');
        $specialty_id = $request->only('idEspecialidad');
        $title = $request->only('titulo');
        $description = $request->only('descripcion');

        $suggestion = Suggestion::create([
            'IdPlanMejora' => $ip_id,
            'IdDocente' => $teacher_id['idDocente'],
            'IdEspecialidad' => $specialty_id['idEspecialidad'],
            'Titulo' => $title['titulo'],
            'Descripcion' => $description['descripcion']
          ]);

        $mensaje = ['mensaje' => 'Sugerencia registrada correctamente'];
        return response()->json($mensaje);
    }

    public function getSuggestion($ip_id){
        $suggestions = Suggestion::where('IdPlanMejora',$ip_id)->get();
        $responses = [];
        foreach ($suggestions as $key => $value) {
            $nombre = Teacher::where('IdDocente', $value->IdDocente)->first()->Nombre;
            $created_at = $value->created_at->toDateTimeString();
            $updated_at = $value->updated_at->toDateTimeString();
            $title = $value->Titulo;
            $descripcion = $value->Descripcion;
            $response = [
              'name' => $nombre,
              'created' => $created_at,
              'updated' => $updated_at,
              'title' => $title,
              'description' =>$descripcion
            ];
            array_push($responses, $response);
        }
  
      return response()->json($responses);
    }
    
}
