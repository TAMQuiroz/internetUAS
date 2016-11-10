<?php

namespace Intranet\Http\Controllers\Investigation\Project\Affiliation;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Project;
use Intranet\Models\Investigatorxproject;
use Intranet\Models\Teacherxproject;
use Intranet\Models\Studentxproject;

class AffiliationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInvestigator(Request $request)
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
    public function destroyInvestigator($id)
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(Request $request)
    {
        try {
            $proyecto = Project::find($request['id_proyecto']);

            $proyecto->students()->attach($request['id_estudiante']);

            return redirect()->route('proyecto.edit',$proyecto->id)->with('success', 'El estudiante se ha agregado exitosamente');
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
    public function destroyStudent($id)
    {
        try {
            $studentXproject = Studentxproject::find($id);

            if($studentXproject){
                $proyecto = Project::find($studentXproject->id_proyecto);
                $studentXproject->delete();

                return redirect()->route('proyecto.edit',$proyecto->id)->with('success', 'El estudiante se ha quitado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeacher(Request $request)
    {
        try {
            $proyecto = Project::find($request['id_proyecto']);

            $proyecto->teachers()->attach($request['id_docente']);

            return redirect()->route('proyecto.edit',$proyecto->id)->with('success', 'El profesor se ha agregado exitosamente');
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
    public function destroyTeacher($id)
    {
        try {
            $teacherXproject = Teacherxproject::find($id);

            if($teacherXproject){
                $project = Project::find($teacherXproject->id_proyecto);
                $teacherXproject->delete();

                return redirect()->route('proyecto.edit',$project->id)->with('success', 'El profesor se ha quitado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
