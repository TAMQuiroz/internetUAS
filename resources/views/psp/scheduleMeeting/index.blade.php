@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Semana de Reuniones</h3>
			</div>
		</div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                <div class="clearfix"></div>


                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Tipo</th>
                        <th class="column-title">Fecha de Inicio</th>
                        <th class="column-title">Fecha de Fin</th>
                        <th class="column-title">Fase</th>
                        <th class="column-title">Curso de Psp</th>
                        <th colspan="2">Acciones</th>    
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($Schedules as $Schedule)      	
                    	<tr class="even pointer">
                            @if($Schedule->PspProcess!=null)
                            <td >{{$Schedule->tipo}}</td>
                            <td >{{$Schedule->fecha_inicio}}</td>
                            <td >{{$Schedule->fecha_fin}}</td>
                            @if($Schedule->Phase!=null)
                            <td >{{$Schedule->Phase->numero}}</td>
                            @else
                            <td >-</td>
                            @endif
                            <td >{{$Schedule->PspProcess->Course->Nombre}}</td>
                            <td >
                                <a href="{{ route('scheduleMeeting.edit', $Schedule->id) }}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>                                
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection