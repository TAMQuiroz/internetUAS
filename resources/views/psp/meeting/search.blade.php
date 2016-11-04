@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Reuniones</h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">
                @if($student!=null)
                <a>Codigo</a>                
                <input id=codigo type="text" disabled name="" value="<?php echo htmlspecialchars($student->Codigo); ?>"/>
                <br/>
                <br/>
                <a>Alumno</a>
                <input id=alumno type="text" disabled name="" value="<?php echo htmlspecialchars($student->Nombre.' '.$student->ApellidoPaterno.' '.$student->ApellidoMaterno); ?>"/>
                @endif
                <br/>
                <br/>
                <div class="clearfix"></div>
            
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Reunion</th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Hora Inicio</th>
                        <th class="column-title">Hora Fin</th>                        
                        <th class="column-title">Estado</th>                             
                        <th colspan="2">Acciones</th>                     
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($meetings as $key => $meeting)
                        <tr> 
                            <td>{{$key+1}}</td> 
                            <td>{{$meeting->fecha}}</td> 
                            <td>{{$meeting->hora_inicio}}</td> 
                            <td>{{$meeting->hora_fin}}</td>
                            @if($meeting->idtipoestado==1)
                            <td>Pendiente</td>
                            @elseif($meeting->idtipoestado==2)
                            <td>Realizada</td>    
                            @else
                            <td>Cancelada</td>
                            @endif                             
                            <td>
                                <a href="{{route('meeting.edit',$meeting->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>                                                                
                            </td>                                                        
                        </tr>

                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection