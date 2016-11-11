<?php

namespace Intranet\Http\Controllers\API\Psp\Students;

use DB;
use DateTime;
use Mail;
use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\Inscription;
use Intranet\Models\PspStudent;
use Intranet\Models\Tutstudent;
use Intranet\Models\meeting;
use Illuminate\Routing\Controller as BaseController;
use Dingo\Api\Routing\Helpers;





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
       
$inscription = array();
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

    public function postAppointmentSuperEmployer(Request $request )
    {        
               

        $lugarAux = $request->only('lugar');
        $lugar = $lugarAux['lugar'];

        $idAlumnoAux     = $request->only('idAlumno');
        $idAlumno = $idAlumnoAux['idAlumno'];

        $dateStringAux = $request->only('fecha');
        $fecha = $dateStringAux['fecha'];
 
        $horaAux1 =  $request->only('hora');  
        $horaAux2 = $horaAux1['hora']; 
        $hora =  $horaAux2.":00"; // hora reserva ejem 12:00:00
        $horaFin = $hora;
        $horaFin[3] = '3' ;

        $idUserAux = $request->only('idUser'); //idSupervisor
        $idUser = $idUserAux['idUser']; 

        DB::table('pspmeetings')->insertGetId(
            [
                'idtipoestado' => 12, //id del estado pendiente
               'hora_inicio' => $hora,
               'hora_fin' => $horaFin ,
               'fecha' => $fecha,
               'idstudent' => $idAlumno,
               'idsupervisor' => $idUser  ,
               'asistencia' =>  'No se ha registrado',
               'lugar' => $lugar,
               'observaciones' =>'No se han registrado observaciones',
               'tiporeunion' =>   2, //Reunion tipo supervisor - jefe

            ]

        );

            //enviamos el correo al jefe

        return "exito";    

    }


    public function getPspStudents($id)
    {
        $pspstudent = PspStudent::where('idalumno', $id )->get();
        return  $this->response->array($pspstudent->toArray());

    }

 public function getStudents($id)
    {
        $student = Student::where('IdAlumno', $id )->get();
        return  $this->response->array($student->toArray());

    }

 public function getTutStudents($idAlumno)
    {
        $student = Student::where('IdAlumno', $idAlumno )->get()->first();
        $tutstudent = Tutstudent::where('codigo', $student->Codigo )->get();


        return  $this->response->array($tutstudent->toArray());
   }


  public function getDatesSuperEmployerAll()
    {

            $pspstudents = meeting::get();
    return  $this->response->array($pspstudents->toArray());
    }

}