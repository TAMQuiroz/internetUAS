<?php

namespace Intranet\Http\Controllers\Psp\meeting;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\meeting;
use Intranet\Http\Requests;

use Intranet\Models\freeHour;
class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting = meeting::get();

        $data = [
            'meeting'    =>  $meeting,
        ];
        return view('psp.meeting.index', $data);
        //return view('template.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = [];
        $horas = freeHour::get();
        foreach ($horas as $hora) {
            $cadena = $hora->fecha.' - '.$hora->hora_ini.' - '.$hora->supervisor->nombres.' '.$hora->supervisor->apellido_paterno;
            array_push($arr, $cadena);
        }

        $data['freeHours'] = $arr;
        $data['meeting'] = meeting::get();
     
        return view('psp.meeting.create',$data);
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
