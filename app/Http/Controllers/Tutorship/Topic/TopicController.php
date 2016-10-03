<?php

namespace Intranet\Http\Controllers\Tutorship\Topic;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\Http\Requests;
use Intranet\Models\Topic;
class TopicController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $topics = Topic::get();
        $data = [
            'topics'    =>  $topics,
        ];
        return view('tutorship.topic.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tutorship.topic.create');
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
            $tema = new Topic;
            $tema->nombre       = $request['nombre'];            
            $tema->save();
            return redirect()->route('tema.index')->with('success', 'El tema se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    
    public function show($id)
    {
       //
    }

    
    public function edit($id)
    {
        $topic       = Topic::find($id);
        $data = [
            'topic'      =>  $topic,
        ];
        return view('tutorship.topic.edit', $data);
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
        try {
            $topic = Topic::find($id);
            $topic->nombre       = $request['nombre'];            
            $topic->save();
            return redirect()->route('tema.index', $id)->with('success', 'El tema se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $topic   = Topic::find($id);
            $message = "";
            // if(count($area->investigators)){
            //     return redirect()->back()->with('warning', 'Esta area esta asignada a investigadores');
            // }
            $topic->delete();
            return redirect()->route('tema.index')->with('success', 'El tema se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
