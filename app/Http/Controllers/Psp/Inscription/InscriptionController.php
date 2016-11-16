<?php

namespace Intranet\Http\Controllers\Psp\Inscription;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Http\Services\User\PasswordService;
use Intranet\Http\Services\User\UserService;

use Intranet\Models\Faculty;
use Intranet\Models\Teacher;
use Intranet\Models\User;
use Intranet\Models\Inscription;
use Intranet\Models\Studentxinscriptionfiles;
use Intranet\Models\Student;
use Intranet\Models\PspStudent;
use Intranet\Http\Requests\InscriptionRequest;
use Intranet\Http\Requests\InscriptionEditRequest;

use Auth;

class InscriptionController extends Controller
{
    public function __construct() {
        $this->userService = new UserService;
        $this->passwordService = new PasswordService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inscriptiones = Inscription::get();

        $data = [
            'inscriptiones'    =>  $inscriptiones,
        ];
        return view('psp.inscription.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('psp.inscription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscriptionRequest $request)
    {
        try {

            //Crear inscription
            $inscription                   = new Inscription;
            $inscription->activ_formativas          = $request['activ_formativas'];
            $inscription->actividad_economica       = $request['actividad_economica'];
            $inscription->cond_seguridad_area       = $request['cond_seguridad_area'];
            $inscription->correo_jefe_directo       = $request['correo_jefe_directo'];
            //$inscription->debe_modificarse          = $request['debe_modificarse'];
            $inscription->direccion_empresa         = $request['direccion_empresa'];
            $inscription->distrito_empresa          = $request['distrito_empresa'];
            $inscription->equi_del_practicante      = $request['equi_del_practicante'];
            $inscription->equipamiento_area         = $request['equipamiento_area'];
            $inscription->fecha_inicio              = $request['fecha_inicio'];
            $inscription->fecha_recep_convenio      = $request['fecha_recep_convenio'];
            $inscription->fecha_termino             = $request['fecha_termino'];
            $inscription->jefe_directo_aux          = $request['jefe_directo_aux'];
            $inscription->nombre_area               = $request['nombre_area'];
            $inscription->personal_area             = $request['personal_area'];
            $inscription->puesto                    = $request['puesto'];
            $inscription->razon_social              = $request['razon_social'];
            //$inscription->recomendaciones           = $request['recomendaciones'];
            $inscription->telef_jefe_directo        = $request['telef_jefe_directo'];
            $inscription->ubicacion_area            = $request['ubicacion_area'];

            $inscription->save();
            $student = Student::where('IdUsuario',Auth::User()->IdUsuario)->first(); 
            $pspstudent = PspStudent::where('idalumno',$student->IdAlumno)->first(); 
            if($student!=null){
                $studentxinscription  = new Studentxinscriptionfiles;
                $studentxinscription->idinscriptionfile =$inscription->id;
                $studentxinscription->idpspstudents=$pspstudent->id;
                $studentxinscription->acepta_terminos=1;
                $studentxinscription->save();
            }
            return redirect()->route('inscription.index')->with('success', 'La información se ha registrado exitosamente');
        }catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscription       = Inscription::find($id);

        $data = [
            'inscription'      =>  $inscription,
        ];
        return view('psp.inscription.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscription       = Inscription::find($id);

        $data = [
            'inscription'      =>  $inscription,
        ];
        return view('psp.inscription.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InscriptionRequest $request, $id)
    {
        try {
            //Crear 
            $inscription                   = Inscription::find($id);
            $inscription->activ_formativas          = $request['activ_formativas'];
            $inscription->actividad_economica       = $request['actividad_economica'];
            $inscription->cond_seguridad_area       = $request['cond_seguridad_area'];
            $inscription->correo_jefe_directo       = $request['correo_jefe_directo'];
            //$inscription->debe_modificarse          = $request['debe_modificarse'];
            $inscription->direccion_empresa         = $request['direccion_empresa'];
            $inscription->distrito_empresa          = $request['distrito_empresa'];
            $inscription->equi_del_practicante      = $request['equi_del_practicante'];
            $inscription->equipamiento_area         = $request['equipamiento_area'];
            $inscription->fecha_inicio              = $request['fecha_inicio'];
            $inscription->fecha_recep_convenio      = $request['fecha_recep_convenio'];
            $inscription->fecha_termino             = $request['fecha_termino'];
            $inscription->jefe_directo_aux          = $request['jefe_directo_aux'];
            $inscription->nombre_area               = $request['nombre_area'];
            $inscription->personal_area             = $request['personal_area'];
            $inscription->puesto                    = $request['puesto'];
            $inscription->razon_social              = $request['razon_social'];
            //$inscription->recomendaciones           = $request['recomendaciones'];
            $inscription->telef_jefe_directo        = $request['telef_jefe_directo'];
            $inscription->ubicacion_area            = $request['ubicacion_area'];
            
            $inscription->save();

            return redirect()->route('inscription.index')->with('success', 'La información se ha actualizado exitosamente');
        } catch (Exception $e){
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
            $inscription   = inscription::find($id);
            
            //Restricciones

            $inscription->delete();

            return redirect()->route('inscription.index')->with('success', 'La información se ha eliminado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }  
    }


    public function search($id)
    {
        //$students = Student::where('IdUsuario',Auth::User()->IdUsuario)->get();
        //$student  =$students->first();
        $student = Student::find($id);
        $pspstudent = PspStudent::where('idalumno',$student->IdAlumno)->first(); 
        $idinscrip = Studentxinscriptionfiles::where('idpspstudents',$pspstudent->id)->get();
        $inscriptiones = array();
        foreach ($idinscrip as $ins) {
                $inscriptiones[]=Inscription::find($ins->idinscriptionfile);
        }
        $r = count($inscriptiones); 
        if($r==0)$inscriptiones=null;

        $data = [
            'inscriptiones'    =>  $inscriptiones,
        ];
        $data['student'] = $pspstudent;

        return view('psp.Inscription.search', $data); 
    }

    public function check($id)
    {
        $inscription       = Inscription::find($id);

        $data = [
            'inscription'      =>  $inscription,
        ];
        return view('psp.inscription.check',$data);
    }

        public function updateC(InscriptionEditRequest $request, $id)
    {
        try {
            //Crear 
            $inscription                   = Inscription::find($id);
            $inscription->recomendaciones           = $request['recomendaciones'];            
            $inscription->save();
            $ixs=Studentxinscriptionfiles::where('idinscriptionfile',$inscription->id)->first();
            $psp=PspStudent::find($ixs->idpspstudents);           

            return redirect()->route('inscription.search',$psp->idalumno)->with('success', 'La información se ha actualizado exitosamente');
        } catch (Exception $e){
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

}
