<?php

namespace Intranet\Http\Controllers\Psp\PspDocument;

use Illuminate\Http\Request;
use Intranet\Models\PspDocument;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Template;
use Intranet\Models\PspStudent;
use Auth;

class PspDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = PspStudent::where('idUser',Auth::User()->IdUsuario)->get();
        $student  =$students->first();
        $pspdocuments = PspDocument::where('idStudent',$student->id)->get(); ;

        $data = [
            'pspdocuments'    =>  $pspdocuments,
        ];
        $data['student'] = $students->first();

        //$data['groups'] = $this->groupService->retrieveAll();
        return view('psp.PspDocument.index', $data);
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
        $pspDocument    = pspDocument::find($id);
        $students = PspStudent::where('idUser',Auth::User()->IdUsuario)->get();
        $student  =$students->first();
        
        $data = [
            'pspDocument'    =>  $pspDocument,
        ];
        $data['student'] = $students->first();
        return view('psp.pspDocument.edit', $data);
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
