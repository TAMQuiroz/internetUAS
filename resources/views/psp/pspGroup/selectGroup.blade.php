@extends('app')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="page-title">
            <div class="title_left">
                <h3>Seleccione Grupo</h3>
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
            	{{Form::open(['route' => 'pspGroup.selectGroupStore', 'class'=>'form-horizontal', 'id'=>'formSuggestion'])}}

                <table class="table table-striped responsive-utilities jambo_table bulk_action"> 
                    <thead> 
                        <tr class="headings"> 
                        	<th colspan="1"></th>
                            <th>Numero</th> 
                            <th>Observacion</th>       
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
						<!--AUN NO FUNCIONA ESTE SUBMIT-->
						{{--Form::submit('Seleccionar', ['class'=>'btn btn-success pull-right'])--}}
						<a class="btn btn-default pull-right" href="{{ route('pspGroup.index') }}">Cancelar</a>
					</div>
				</div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection