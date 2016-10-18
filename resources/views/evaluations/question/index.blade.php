@extends('app')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Banco de preguntas</h3>
    </div>    
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">                
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('pregunta.create') }}" class="btn btn-success pull-right">
                        <i class="fa fa-plus"></i> Nueva pregunta
                    </a>
                </div>
            </div>   
            <div class="table-responsive">
                <table class="table table-striped responsive-utilities jambo_table bulk_action">
                    <col width="5%" >
                    <col width="10%">
                    <col width="10%">
                    <col width="45%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <thead>
                        <tr class="headings">                            
                            <th class="column-title">Código </th>                        
                            <th class="column-title">Últ. modif. </th>    
                            <th class="column-title">Responsable </th>    
                            <th class="column-title">Pregunta </th>    
                            <th class="column-title">Tipo </th>  
                            <th class="column-title">Competencia </th>  
                            <th class="column-title last">Acciones</th>                                
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)
                        <tr class="even pointer">                            
                            <td class=" ">{{ $question->id }}</td>
                            <td class=" ">{{ $question->updated_at->format('d/m/Y')}}</td>
                            <td class=" ">{{ explode(' ',trim($question->responsable->Nombre))[0]    .' '.$question->responsable->ApellidoPaterno
                            }}</td>
                            <td class=" ">{{ $question->descripcion }}</td>                            
                            @if($question->tipo == 1)
                            <td class="">Cerrada</td> 
                            @elseif ($question->tipo == 2)
                            <td class="">Abierta</td> 
                            @else
                            <td class="">Archivo</td> 
                            @endif    
                            <td class=" ">{{ $question->competencia->nombre }}</td>                         
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
</div>
@endsection