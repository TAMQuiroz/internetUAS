<?php

namespace Intranet\Http\Controllers\Evaluations\Question;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Question;
use Intranet\Models\Competence;
use Illuminate\Support\Facades\Session;//<---------------------------------necesario para usar session

class QuestionController extends Controller
{
    public function index()
    {
        $specialty = Session::get('faculty-code');
        $questions = Question::where('id_especialidad',$specialty)->get();
        $data = [
            'questions'    =>  $questions,
        ];
        return view('evaluations.question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialty = Session::get('faculty-code');
        $competences = Competence::where('id_especialidad',$specialty)->get();
        $data = [
            'competences'    =>  $competences,
        ];
        return view('evaluations.question.create',$data);
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
