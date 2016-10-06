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
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <a href="{{ route('create.template') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nuevo Documento</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Titulo</th>
                        <th class="column-title">Plantilla</th>
                        <th class="column-title">Obligatorio</th>
                        <th class="column-title">Fase</th>   
                        <th colspan="2">Acciones</th>                     
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($templates as $template)
                        <tr> 
                            <td>{{$template->titulo}}</td> 
                            <td>{{$template->ruta}}</td> 
                            @if($template->obligatorio==1)
                            <td>obligatorio</td> 
                            @else
                            <td>no obligatorio</td> 
                            @endif
                            <td>{{$template->idPhase}}</td> 
                            <td>
                                <a href="{{route('template.edit', $template->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$template->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr> 
                        @include('modals.delete', ['id'=> $template->id, 'message' => '¿Esta seguro que desea eliminar esta plantilla?', 'route' => route('delete.template', $template->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection