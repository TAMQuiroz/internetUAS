@extends('app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="page-title">
			<div class="title_left">
				<h3>Fichas de Inscripcion</h3>
			</div>
		</div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            <div class="x_content">

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Nombre de area</th>
                        <th class="column-title">Puesto</th>
                        <th class="column-title">Razon social</th>
                        <th class="column-title last">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@foreach($inscriptiones as $inscription)      	
                    	<tr class="even pointer">
                            <td >{{$inscription->nombre_area}}</td>
                            <td >{{$inscription->puesto}}</td>
                            <td >{{$inscription->razon_social}}</td>
                            <td >
                                <a href="{{ route('inscription.check', $inscription->id) }}" class="btn btn-primary btn-xs" title="Revisar"><i class="fa fa-pencil"></i></a>
                                @if($inscription->recomendaciones!=null)
                                <a class="btn btn-primary btn-xs" href="" title="observaciones" data-toggle="modal" data-target="#obsModal{{$inscription->id}}"><i class="fa fa-info"></i></a>
                                @endif
                            </td>
                            <div class="modal fade"  id="obsModal{{$inscription->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Observaciones</h4>
                                  </div>
                                  <div class="modal-footer">
                                     <h4 class="col-md-12 col-sm-12 col-xs-12" align="left">{{$inscription->recomendaciones}}</h4>
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </tr>
                        @include('modals.delete', ['id'=> $inscription->id, 'message' => '¿Esta seguro que desea eliminar esta información?', 'route' => route('inscription.delete', $inscription->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a class="btn btn-default pull-right" href="{{ route('student.index') }}">Regresar</a>

@endsection