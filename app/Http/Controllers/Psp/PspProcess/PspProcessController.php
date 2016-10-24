<?php

namespace Intranet\Http\Controllers\Psp\PspProcess;

use Illuminate\Http\Request;

use Intranet\Http\Requests;
use Intranet\Http\Controllers\Controller;

use Intranet\Models\PspProcess;

use Carbon\Carbon;
use Auth;


class PspProcessController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$proceso = PspProcess::get();

        $data = [
            'proceso'    =>  $proceso,
        ];
        return view('psp.pspProcess.index',$data);
    }

    public function create()
    {

        return view('psp.pspProcess.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorRequest $request)
    {

    }
}
