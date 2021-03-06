<?php

namespace Intranet\Http\Controllers\Investigation\Group;

use Illuminate\Http\Request;
use View;
use Session;
use Auth;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Services\Faculty\FacultyService;
use Intranet\Http\Services\Teacher\TeacherService;
use Intranet\Http\Services\Investigation\Group\GroupService;

use Intranet\Models\Investigator;
use Intranet\Models\Group;
use Intranet\Models\Teacher;

use Intranet\Http\Requests\GroupRequest;

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

    public function index(Request $request)
    {

        $filters = $request->all();
        $faculty_id = Session::get('faculty-code');
        //$data['title'] = "Courses";

        try {
            $data['faculty'] = $this->facultyService->find($faculty_id);
            $data['groups'] = $this->groupService->retrieveAll($filters);
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
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
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

        return view('investigation.group.createGroup',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        try {
            $this->groupService->createGroup($request->all());
        } catch(\Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

        return redirect()->route('grupo.index')->with('success', 'El grupo se ha registrado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $grupo = Group::find($id);
            
            $profesores = $grupo->teachers;
            $investigadores = $grupo->investigators;
            $estudiantes = $grupo->students;

            $integrantes = null;
            $sorted = [];
            
            foreach ($investigadores as $investigador) {
                $integrantes = $profesores->push($investigador);    
            }

            foreach ($estudiantes as $estudiante) {
                $integrantes = $profesores->push($estudiante);    
            }
            
            if($integrantes){
                $sorted = $integrantes->sortBy(function ($product, $key) {
                    if(isset($product['IdDocente'])){
                        return $product['Nombre'];
                    }else{
                        return $product['nombre'];
                    }
                });
            }

            $data['integrantes'] = $sorted;
            $data['group'] = $grupo;
        } catch(\Exception $e) {
            //dd($e);
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        return view('investigation.group.show', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$data['title'] = 'Edit Course';
        $faculty_id = Session::get('faculty-code');
        try {
            if($this->groupService->checkLeader($id)){
                $data['group'] = $this->groupService->findGroupById($id);
                $data['faculties'] = $this->facultyService->retrieveAll();
                $data['faculty'] = $this->facultyService->find($faculty_id);
                $data['teachers'] = $this->teacherService->findTeacherByFaculty($faculty_id);
                $data['investigators'] = $this->groupService->getNotSelectedInvestigators($id);
                $data['students'] = $this->groupService->getNotSelectedStudents($id);
                $data['elegible_teachers'] = $this->groupService->getNotSelectedTeachers($id);
            }else{
                return redirect()->back()->with('warning', 'El grupo no se puede editar debido a que no es el lider');
            }
            
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }

        return view('investigation.group.editGroup', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        try {
            $this->groupService->updateGroup($request->all(), $id);
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        return redirect()->route('grupo.show',$id)->with('success', 'Las modificaciones se han guardado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            if($this->groupService->checkLeader($id)){
                $group = $this->groupService->deleteGroup($id);
                if($group){
                    return redirect()->back()->with('warning', 'El grupo no se puede eliminar debido a que tiene investigadores asignados');
                }
            }else{
                return redirect()->back()->with('warning', 'El grupo no se puede eliminar debido a que no es el lider');
            }         

        } catch (\Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
        return redirect()->route('grupo.index')->with('success', 'El registro ha sido eliminado exitosamente');
    }
}
