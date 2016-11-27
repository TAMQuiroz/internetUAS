<?php
namespace Intranet\Http\Controllers\Psp\TeacherFinalScore;

use Illuminate\Http\Request;
use Intranet\Models\Student;
use Intranet\Models\User;
use Intranet\Models\Supervisor;
use Intranet\Models\PspDocument;
use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;
use Intranet\Models\PspStudent;
use Intranet\Models\Studentxinscriptionfiles;
use Auth;

class TeacherFinalScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = PspStudent::paginate(10);

        $data = [
            'students'    =>  $students,
        ];
        return view('psp.TeacherFinalScore.index', $data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $inscriptiofile= Studentxinscriptionfiles::where('idpspstudents',$id)->first();
        if($inscriptiofile!=null)
        {
            $finalScore= $inscriptiofile->nota_final;
        }else{
            $finalScore= 21;
        }
        

        $data = [
                    'finalScore'    => $finalScore,
                ];

        return view('psp.TeacherFinalScore.show', $data);
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
