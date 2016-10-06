<?php

namespace Intranet\Http\Controllers\Investigation\Group\Affiliation;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\Investigator;
use Intranet\Models\Group;
use Intranet\Models\Investigatorxgroup;

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
            $group = Group::find($request['id_group']);

            $group->investigators()->attach($request['id_investigator']);

            return redirect()->route('grupo.edit',$group->id)->with('success', 'El investigador se ha agregado exitosamente');
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
            $investigatorXgroup = Investigatorxgroup::find($id);

            if($investigatorXgroup){
                $group = Group::find($investigatorXgroup->id_grupo);
                $investigatorXgroup->delete();

                return redirect()->route('grupo.edit',$group->id)->with('success', 'El investigador se ha quitado exitosamente');
            }else{
                return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');    
            }
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
