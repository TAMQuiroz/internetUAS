<?php

namespace Intranet\Http\Controllers\Investigation\Event;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Investigation\Event\EventService;
use Intranet\Http\Requests;
use View;
use Session;

class EventController extends Controller
{
    protected $facultyService;
    protected $teacherService;
    protected $groupService;
    protected $eventService;

    public function __construct()
    {
        $this->facultyService = new FacultyService();
        //$this->teacherService = new TeacherService();
        //$this->groupService = new GroupService();
        $this->eventService = new EventService();
    }

    public function index()
    {

       //faculty_id = Session::get('faculty-code');
        $data['title'] = "Events";

        try {
            //data['faculty'] = $this->facultyService->find($faculty_id);
            $data['events'] = $this->eventService->retrieveAll();
        } catch (Exception $e) {
            dd($e);
        }

        return view('investigation.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$faculty_id = Session::get('faculty-code');

        try {
            //$data['faculty'] = $this->facultyService->find($faculty_id);
            //$data['teachers'] = $this->teacherService->findTeacherByFaculty($faculty_id);
        } catch (Exception $e) {
            dd($e);
        }

        //return view('investigation.event.createEvent',$data);
        return view('investigation.event.createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->eventService->createEvent($request->all());
        } catch(\Exception $e) {
            dd($e);
        }

        return redirect()->route('evento.index')->with('success', 'El evento se ha registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
