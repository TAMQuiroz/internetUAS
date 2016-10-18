@extends('app')
@section('content')
<div class="page-title">
	<div class="title_left">
		<h3>Detalle de Documento</h3>
	</div>
</div>

<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
             <a>Codigo</a>
                <input id=codigo type="text" disabled name="" value="<?php echo htmlspecialchars($student->codigoAlumno); ?>"/>
                <br/>
                <br/>
                <a>Alumno</a>
                <input id=alumno type="text" disabled name="" value="<?php echo htmlspecialchars($student->nombres); ?>"/>
                <br/>
                <br/>
                <div class="clearfix"></div>   

                               

            </div>
        </div>
    </div>

@endsection