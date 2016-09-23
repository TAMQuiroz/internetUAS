<?php

namespace Intranet\Http\Controllers\Investigation\Group;

use Illuminate\Http\Request;
use View;
use Session;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\Investigation\Group\GroupService;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $facultyService;
    protected $teacherService;
    protected $groupService;

    public function __construct()
    {
        $this->facultyService = new FacultyService();
        $this->teacherService = new TeacherService();
        $this->groupService = new GroupService();
    }

    public function index()
    {

        $faculty_id = Session::get('faculty-code');
        //$data['title'] = "Courses";

        try {
            $data['faculty'] = $this->facultyService->find($faculty_id);
            $data['groups'] = $this->groupService->retrieveAll();
        } catch (Exception $e) {
            dd($e);
        }

        return view('investigation.group.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty_id = Session::get('faculty-code');

        try {
            $data['faculty'] = $this->facultyService->find($faculty_id);
            $data['teachers'] = $this->teacherService->findTeacherByFaculty($faculty_id);
        } catch (Exception $e) {
            dd($e);
        }

        return view('investigation.group.createGroup',$data);
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
            $this->groupService->createGroup($request->all());
        } catch(\Exception $e) {
            dd($e);
        }

        return redirect()->route('grupo.index')->with('success', 'El grupo se ha registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        try {
            $data['group'] = $this->groupService->findGroup($request->all());
        } catch(\Exception $e) {
            dd($e);
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
