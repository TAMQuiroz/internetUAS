@extends('app')
@section('content')

<div class="page-title">
	<div class="title_left">
		<h3>Aspectos</h3>
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
                        <th class="column-title">Nombre de Aspecto</th>
                        <th class="column-title">Nota</th>
                        <th colspan="2">Acciones</th>       
                        studentsResult             
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($Aspecto as $aspecto)
                        <tr> 
                            <td>{{$aspecto->Nombre}}</td> 
                            <td>{{$aspecto->Nombre}}</td>                            
                            <td>
                                <a href="{{route('aspecto.check',$aspecto->IdAspecto)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-search"></i></a>
                                
                            </td>
                            <!--
                            <div class="modal fade"  id="obsModal{{$aspecto->IdAspecto}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Observaciones</h4>
                                  </div>
                                  <div class="modal-footer">
                                     <h4 class="col-md-12 col-sm-12 col-xs-12" align="left">{{$pspdocument->observaciones}}</h4>
                                  </div> -->
                                 <!-- 
                                </div>
                              </div>  
                            </div> -->
                        </tr>

                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection