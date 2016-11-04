<?php

namespace Intranet\Http\Controllers\Psp\Aspecto;

use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\Aspect; /*ya existia en el uas */
use Intranet\Models\User;
use Intranet\Models\Supervisor;
use Intranet\Models\PspDocument;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\PspStudent;
use Auth;

class AspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $supervisor = Supervisor::where('idUser',Auth::User()->IdUsuario)->first();
        $students = PspStudent::where('idsupervisor',$supervisor->id)->get();

        $data = [
            'students'    =>  $students,
        ];
        return view('psp.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$nota = $request['nota'];  //con esto se obtiene lo que se selecciona con el combobox
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $aspectos = null;

        $data = [
            'aspectos'    =>  $aspectos,
        ];
        return view('psp.aspecto.edit', $data);
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
