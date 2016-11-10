<?php

namespace Intranet\Http\Controllers\Investigation\Deliverable\Affiliation;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Deliverable;
use Intranet\Models\Investigatorxdeliverable;
use Intranet\Models\Teacherxdeliverable;
use Intranet\Models\Studentxdeliverable;

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
            $entregable = Deliverable::find($request['id_entregable']);

            $entregable->investigators()->attach($request['id_investigator']);

            return redirect()->route('entregable.edit',$entregable->id)->with('success', 'El investigador se ha agregado exitosamente');
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
            $investigatorXdeliverable = Investigatorxdeliverable::find($id);

            if($investigatorXdeliverable){
                $entregable = Deliverable::find($investigatorXdeliverable->id_entregable);
                $investigatorXdeliverable->delete();

                return redirect()->route('entregable.edit',$entregable->id)->with('success', 'El investigador se ha quitado exitosamente');
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
            $entregable = Deliverable::find($request['id_entregable']);

            $entregable->students()->attach($request['id_estudiante']);

            return redirect()->route('entregable.edit',$entregable->id)->with('success', 'El estudiante se ha agregado exitosamente');
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
            $studentXdeliverable = Studentxdeliverable::find($id);

            if($studentXdeliverable){
                $entregable = Deliverable::find($studentXdeliverable->id_entregable);
                $studentXdeliverable->delete();

                return redirect()->route('entregable.edit',$entregable->id)->with('success', 'El estudiante se ha quitado exitosamente');
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
            $entregable = Deliverable::find($request['id_entregable']);

            $entregable->teachers()->attach($request['id_docente']);

            return redirect()->route('entregable.edit',$entregable->id)->with('success', 'El profesor se ha agregado exitosamente');
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
            $teacherXdeliverable = Teacherxdeliverable::find($id);

            if($teacherXdeliverable){
                $entregable = Deliverable::find($teacherXdeliverable->id_entregable);
                $teacherXdeliverable->delete();

                return redirect()->route('entregable.edit',$entregable->id)->with('success', 'El profesor se ha quitado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
