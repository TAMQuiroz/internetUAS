<?php namespace Intranet\Http\Services\Investigation\Event;

use Intranet\Models\Teacher;
use Intranet\Models\Investigator;
use Intranet\Models\Faculty;
use Intranet\Models\User;
use Intranet\Models\Accreditor;
use Intranet\Models\CoursexTeacher;
use Intranet\Models\Event;
use Intranet\Http\Services\User\UserService;
use Intranet\Http\Services\User\PasswordService;
use DB;
use Session;

class EventService {


	public function retrieveAll()
    {
        return Event::get();
    }

	public function createEvent($request) {

		if(Session::get('user')->IdEspecialidad == 0){
            $especialidad = Session::get('faculty-code');
        }else{
            $especialidad = Session::get('user')->IdEspecialidad;
        }

        //$facultyName = $request['facultyName'];

        //Parsear hora y fecha

        //conseguir tipo
        if ($request['eventType'] == 0){
            $eventType = "Público";
        }
        else{
            $eventType = "Privado";
        }

        //conseguir duracion
        $eventDuration = ($request['eventHH']*60) + $request['eventMM'];

        $event = Event::create([
            'nombre' => $request['eventName'],
            'ubicacion' => $request['eventLocation'],
            'duracion' => $eventDuration,
            'tipo' => $eventType,
        ]);

        return $event;

	}

    public function updateGroup($request, $id) {

        Group::where('id', $id)
            ->update(['nombre'=> $request['group-name'], 'descripcion' => $request['groupDescription'], 'id_lider' => $request['leaderCode']]);
    }

    public function deleteGroup($id) {
        $group = Group::find($id);
        if($group && $group->investigators){
            return $group;
        }else{
            $group->delete();
        }
        return null;        
    }

	public function findGroup($request)
    {
        //$group = Group::where('id', $request['groupId'])->first();
        $group = Group::where('id', $request['groupId'])->first();
        return $group;
    }

    public function findGroupById($groupId)
    {
        //$group = Group::where('id', $request['groupId'])->first();
        $group = Group::where('id', $groupId)->first();
        return $group;
    }

    public function getNotSelectedInvestigators($id)
    {
        $group = Group::find($id);
        $ids = [];
        
        foreach ($group->investigators as $investigator) {
            array_push($ids,$investigator->id);
        }

        $investigators = Investigator::whereNotIn('id',$ids)->get();

        return $investigators;
    }
}