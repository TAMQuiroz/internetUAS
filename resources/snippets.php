<?php

//Fecha para html date 
\Carbon\Carbon::today()->toDateString()

if(isset($request['imagen']) && $request['imagen'] != ""){
    $destinationPath = 'uploads/eventos/'; // upload path
    $extension = $request['imagen']->getClientOriginalExtension();
    $filename = $evento->id.'.'.$extension; 
    $request['imagen']->move($destinationPath, $filename);

    $evento->imagen = $destinationPath.$filename;
    $evento->save();
}

0=>'Publico',1=>'Privado'

{{date("h:i", strtotime( $evento->hora ))}}

Un hombre va al médico. Le cuenta que está deprimido. Le dice que la vida le parece dura y cruel. Dice que se siente muy solo en este mundo lleno de amenazas donde lo que nos espera es vago e incierto. El doctor le responde; “El tratamiento es sencillo, el gran payaso Pagliacci se encuentra esta noche en la ciudad, vaya a verlo, eso lo animará”. El hombre se echa a llorar y dice “Pero, doctor… yo soy Pagliacci”.

return redirect()->back()->with('warning','Primero debe crear grupos');