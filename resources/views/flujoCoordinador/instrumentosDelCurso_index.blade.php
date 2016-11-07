@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    @if(Session::get('academic-cycle')!=null)
                        @if(count($cursos) !=0 )
                            <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Código</th>
                                    <th class="column-title">Nombre del Curso</th>
                                    <th class="column-title">Nivel Académico</th>
                                    <th class="column-title">Especialidad</th>
                                    <th class="column-title last">Acciones</th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cursos as $curso)
                                    <tr class="even pointer">
                                        <td class=" ">{{$curso->Codigo}}</td>
                                        <td class=" ">{{$curso->Nombre}}</td>
                                        @if($curso->NivelAcademico == -1)
                                            <td class=" ">Electivo</td>
                                        @else
                                            <td class=" ">{{$curso->NivelAcademico}}</td>
                                        @endif
                                        @if($facultad->Nombre!= null)
                                            <td class=" ">{{$facultad->Nombre}}</td>
                                        @else
                                            <td class=" ">-</td>
                                        @endif
                                        <td class=" "> 
                                            @if(in_array(74,Session::get('actions')))
                                                <a href="{{ route('instrumentosDelCurso_edit.flujoCoordinador', ['id'=> $facultad->IdEspecialidad,'idCurso' => $curso->IdCurso]) }}" class="btn btn-primary btn-xs" title="Administrar Instrumentos de Medición"><i class="fa fa-cogs"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-warning">
                                        <strong>Advertencia: </strong> No hay cursos para dictarse este ciclo, debe agregar aquellos que se dictarán.
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                       
                    @else
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="alert alert-warning">
                                    <strong>Advertencia: </strong> No existe ciclo activo.
                                </div>
                            </div>
                        </div>
                    @endif


                </div>

                <div class="row">                    
                    
                </div>
                <div class="separator"></div>
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">                         
                         <a href="" class="btn btn-default pull-left">< ATRAS </a>
                         <a id ="" href="" class="btn btn-success pull-right">SIGUIENTE ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection