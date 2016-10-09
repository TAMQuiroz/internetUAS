@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Banco de preguntas</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">

            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('pregunta.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i> Nueva pregunta</a>
                    </div>
                </div>                
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>                        
                            <th class="column-title">Fecha Registro </th>    
                            <th class="column-title">Responsable </th>    
                            <th class="column-title">Pregunta </th>    
                            <th class="column-title">Tipo </th>  
                            <th class="column-title">Competencia </th>  
                            <th class="column-title last">Acciones</th>
                            <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                        <tr class="even pointer">                            
                            <td class=" ">{{ $question->id }}</td>
                            <td class=" ">{{ $question->updated_at}}</td>
                            <td class=" ">{{ $question->responsable->nombre }}</td>
                            <td class=" ">{{ $question->descripcion }}</td>
                            <td class=" ">{{ $question->competencia->nombre }}</td> 
                            @if($question->tipo == 1)
                            <td class="">Cerrada</td> 
                            @elseif ($question->tipo == 2)
                            <td class="">Abierta</td> 
                            @else
                            <td class="">De archivo</td> 
                            @endif                            
                            <td class="">
                                <a href="{{route('pregunta.edit',$question->id)}}" class="btn btn-primary btn-xs view-group"">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-xs delete-group" data-toggle="modal" data-target="#{{$question->id}}">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @include('modals.delete', ['id'=> $question->id, 'message' => '¿Está seguro que desea eliminar esta pregunta?', 'route' => route('pregunta.delete', $question->id)])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection