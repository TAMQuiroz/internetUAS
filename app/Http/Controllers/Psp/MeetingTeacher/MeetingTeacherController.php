<?php namespace Intranet\Http\Controllers\Psp\MeetingTeacher;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\MeetingTeacher;
use Intranet\Models\Student;
use Intranet\Http\Requests;
use Intranet\Models\freeHour;
use Intranet\Models\PspStudent;
use Intranet\Models\Supervisor;
use Auth;

class MeetingTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MeetingTeacher = MeetingTeacher::get();

        $data = [
            'MeetingTeacher'    =>  $MeetingTeacher,
        ];

        return view('psp.MeetingTeacher.index', $data);
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

        $data['freeHours'] = $horas;

        $data['MeetingTeacher'] = MeetingTeacher::get();
     
        return view('psp.MeetingTeacher.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request)
    {
        
        

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
    
    }

    public function search($id)
    {
           

    }
}
