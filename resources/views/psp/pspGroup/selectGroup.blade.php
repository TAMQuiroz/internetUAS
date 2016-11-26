@extends('app')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Eleccion del grupo</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Grupos</h3>
            </div>
            <div class="panel-body">
            	{{Form::open(['route' => 'meeting.index', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                        	<th colspan="1">Seleccionar</th>
                            <th class="column-title">Numero</th> 
                            <th class="column-title">Observacion</th>       
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach($pspGroups as $pspGroup)
                        <tr> 
	                        <td>
                                {{Form::radio('id', $pspGroup->id)}}                             
                            </td>
                            <td>{{$pspGroup->numero}}</td> 
                            <td>{{$pspGroup->descripcion}}</td> 
                         @endforeach    
                        </tr> 
                    </tbody> 
                </table>

                <div class="row">
					<div class="col-md-8 col-sm-12 col-xs-12">						
						{{Form::submit('Seleccionar', ['class'=>'btn btn-success pull-right'])}}
						<a class="btn btn-default pull-right" href="{{ route('meeting.index') }}">Cancelar</a>
					</div>
				</div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection