@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $title }}</h3>
        </div>
    </div>


    <div class="separator"></div>

    <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">
            @if(in_array(34,Session::get('actions')))
                <a href="{{ route('cursosCiclo_edit.flujoCoordinador', $idEspecialidad) }}" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Agregar Cursos</a>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    @if(Session::get('academic-cycle')!=null)
                        @if(count($courses) !=0 )
                            <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">Código</th>
                                    <th class="column-title">Nombre del Curso</th>
                                    <th class="column-title">Nivel Académico</th>
                                    <th class="column-title last">Acciones</th>
                                    <th class="bulk-actions" colspan="7">
                                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($courses as $dic)
                                    <tr class="even pointer">
                                        <td class=" ">{{$dic->course->Codigo}}</td>
                                        <td class=" ">{{$dic->course->Nombre}}</td>
                                        @if($dic->course->NivelAcademico == -1)
                                            <td class=" ">Electivo</td>
                                        @else
                                            <td class=" ">{{$dic->course->NivelAcademico}}</td>
                                        @endif
                                        <td class=" ">
                                            @if(in_array(35,Session::get('actions')))
                                                <a href="{{ route('cursosCicloHorario_index.flujoCoordinador',  ['id' => $idEspecialidad,'idCourse' => $dic->course->IdCurso]) }}" class="btn btn-primary btn-xs" title="Asignar Horarios"><i class="fa fa-cogs"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <!--
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-warning">
                                        <strong>Advertencia: </strong> No hay cursos para asignarse a este ciclo, debe agregar aquellos que se dictarán.
                                    </div>
                                </div>
                            </div>
                            -->
                        @endif
                        <div class="separator"></div>

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
            </div>
        </div>
    </div>

    <div class="row">
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
               <a  href="{{ route('contributions.flujoCoordinador',$idEspecialidad) }}" class="btn btn-success pull-right">Siguiente ></a>
               <!--<a  href="{{ route('end3.flujoCoordinador',$idEspecialidad) }}" class="btn btn-default pull-left">< Atras</a>-->
          </div>
      </div>

    </div>

@endsection