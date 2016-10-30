@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Documentos</h3>
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
                <input id=alumno type="text" disabled name="" value="<?php echo htmlspecialchars($student->Nombre); ?>"/>
                @endif
                <br/>
                <br/>
                <div class="clearfix"></div>
            
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Titulo</th>
                        <th class="column-title">Plantilla</th>
                        <th class="column-title">Documento</th>
                        <th class="column-title">Obligatorio</th>
                        <th class="column-title">Estado</th> 
                        <th class="column-title">Fecha Limite</th>    
                        <th colspan="2">Acciones</th>                     
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($pspdocuments as $pspdocument)

                        <tr> 
                            <td>{{$pspdocument->template->titulo}}</td> 
                            <td>{{$pspdocument->template->ruta}}</td> 
                            <td>{{$pspdocument->ruta}}</td> 
                            @if($pspdocument->esObligatorio=='s')
                            <td>obligatorio</td> 
                            @else
                            <td>no obligatorio</td> 
                            @endif
                            @if($pspdocument->idTipoEstado==3)
                            <td>No Subido</td>
                            @elseif($pspdocument->idTipoEstado==4)
                            <td>Subido</td>
                            @else
                            <td>Revisado</td>
                            @endif
                            <td>{{$pspdocument->fecha_limite}}</td> 
                            <td>
                                <a href="{{route('pspDocument.check',$pspdocument->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-search"></i></a>
                                @if($pspdocument->idTipoEstado==5)
                                <a class="btn btn-primary btn-xs" href="" title="observaciones" data-toggle="modal" data-target="#obsModal{{$pspdocument->id}}"><i class="fa fa-info"></i></a>
                                @endif
                            </td>
                            <div class="modal fade"  id="obsModal{{$pspdocument->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Observaciones</h4>
                                  </div>
                                  <div class="modal-footer">
                                     <h4 class="col-md-12 col-sm-12 col-xs-12" align="left">{{$pspdocument->observaciones}}</h4>
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </tr>

                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection