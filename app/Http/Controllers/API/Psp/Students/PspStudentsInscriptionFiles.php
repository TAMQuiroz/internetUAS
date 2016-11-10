<?php

namespace Intranet\Http\Controllers\API\Psp\Students;

use DB;
use Mail;
use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\Inscription;
use Dingo\Api\Routing\Helpers;
use Intranet\Models\PspStudent;
use Intranet\Models\meeting;
use Illuminate\Routing\Controller as BaseController;

class PspStudentsInscriptionFiles extends BaseController
{

    use Helpers;


        public function getAll()
    {
       $students = Student::get();
       return $this->response->array($students->toArray());
    }


  public function getInscriptions()
    {
       

        $inscription = Inscription::get();
        return $this->response->array($inscription->toArray());

    }





 


    public function getAllPspStudents()
    {
        $pspstudents = PspStudent::get();
        $students = array();
        foreach ($pspstudents as $pspstudent) {
            $student = Student::where('IdAlumno',  $pspstudent->idalumno)->get()->first();
            array_push($students, $student);
            }
        return $this->response->array($students);
    }


  public function getInscriptionsByStudent(Request $request, $id )
    {
       

     foreach ($pspstudents as $pspstudent) {
            $inscription = Inscription::where('IdAlumno',  $id )->get()->first();
            array_push($inscriptions, $inscription);


            }

 return $this->response->array($inscriptions);


    }


   public function edit(Request $request, $id ){
    
        $recomendaciones     = $request->only('recomendaciones');
             
        //Guardar
        $inscription = Inscription::find($id);
        $inscription->recomendaciones  = $recomendaciones['recomendaciones'];
        $inscription->save();
        $recomendacion  =  $inscription->recomendaciones ; 
        $mail = 'jemarroquin@pucp.edu.pe';
        try
        {
            Mail::send('emails.notifyObservationForInscriptionFilePSP', compact('recomendacion'), function($m) use($mail) {
                $m->subject('Recomendacion Registrada - PSP');
                $m->to($mail);
            });
        }
        catch (\Exception $e)
        {
            dd($e->getMessage());
        }
        //Retornar mensaje
        $mensaje = 'Se modifico correctamente';

        return $mensaje;
    }






    public function postAppointmentSuperEmployer(Request $request)
    {        
        $pspstudents = meeting::get();

        return "exito";    
    }


}