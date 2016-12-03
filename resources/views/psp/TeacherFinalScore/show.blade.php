@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Nota Final</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>
                @if($finalScore!=21)
                    {{$finalScore}}
                @else
                    <div class="alert alert-warning">
                            <strong>Advertencia: </strong> El Alumno aun no ha registrado su ficha de inscripcion.
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection