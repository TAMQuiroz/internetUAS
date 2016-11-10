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
                <div class="clearfix"></div>
            
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Codigo</th>
                        <th class="column-title">Alumno</th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Hora Inicio</th>                        
                        <th class="column-title">Hora Fin</th>                                                     
                        <th colspan="2">Acciones</th>                     
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($meetings as $key => $meeting)
                        <tr>                             
                            <td>{{$meeting->student->Codigo}}</td> 
                            <td>{{$meeting->student->Nombre.' '.$meeting->student->ApellidoPaterno}}</td> 
                            <td>{{$meeting->fecha}}</td>
                            <td>{{$meeting->hora_inicio}}</td>
                            <td>{{$meeting->hora_fin}}</td>                                                      
                            <td>
                                <a href="{{route('meeting.edit',$meeting->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>                                                                
                                <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$meeting->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>                                                        
                        </tr>
                        @include('modals.delete', ['id'=> $meeting->id, 'message' => '¿Esta seguro que desea cancelar esta reunion?', 'route' => route('meeting.delete', $meeting->id)])

                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection