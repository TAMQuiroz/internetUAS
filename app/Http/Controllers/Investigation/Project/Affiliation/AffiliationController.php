<?php

namespace Intranet\Http\Controllers\Investigation\Project\Affiliation;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Project;
use Intranet\Models\Investigatorxproject;
class AffiliationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $proyecto = Project::find($request['id_proyecto']);

            $proyecto->investigators()->attach($request['id_investigator']);

            return redirect()->route('proyecto.edit',$proyecto->id)->with('success', 'El investigador se ha agregado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $investigatorXproject = Investigatorxproject::find($id);

            if($investigatorXproject){
                $proyecto = Project::find($investigatorXproject->id_proyecto);
                $investigatorXproject->delete();

                return redirect()->route('proyecto.edit',$proyecto->id)->with('success', 'El investigador se ha quitado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
