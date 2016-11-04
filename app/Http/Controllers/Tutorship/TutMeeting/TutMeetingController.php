<?php

namespace Intranet\Http\Controllers\Tutorship\TutMeeting;

use Auth;
use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Tutorship;
use Intranet\Models\Tutstudent;
use Intranet\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Intranet\Http\Services\User\PasswordService;

class TutMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMyStudents(Request $request)
    {
        $mayorId = Session::get('faculty-code');

        $user       = Session::get('user');

        $filters = [
            "code" => $request->input('code'),
            "name" => $request->input('name'),
            "lastName" => $request->input('lastName'),
            "secondLastName" => $request->input('secondLastName'),
        ];

        $myStudents = Tutstudent::getFilteredStudents($filters, $user->IdDocente, $mayorId);

        $data = [
            'students' =>  $myStudents,
        ];

        return view('tutorship.tutormystudents.index', $data);
    
    }

    public function showMyStudent($id)
    {
        $student       = Tutstudent::find($id);
        $data = [
            'student'      =>  $student,
        ];
        return view('tutorship.tutormystudents.show', $data);
    }
    /**
     * Este create es cuando el alumno pide una cita a su tutor
     *     
     */
    public function createDate($id)
    {
        return view('tutorship.tutormydates.create');
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
