@extends('appWithoutHamburger')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Matriz de Aporte</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('updateContributions.flujoCoordinador',$idEspecialidad) }}" method="POST" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p> Se selecciona aquellos cursos que van a ser evaluados en el presente ciclo académico Además, se colocará que resultado deberá tener dicho curso.</p>
                <br>
            <div class="x_panel">

                <div class="x_content">
                    <div class="clearfix"></div>

                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Codigo</th>
                            <th class="column-title">Curso</th>
                            <th class="column-title">Nivel Académico</th>
                            @if($currentStudentsResults!=null)
                                <?php $i = 0 ?>
                                @foreach($currentStudentsResults as $currentStudentsResult)
                                    <th class="column-title last" >
                                    <span title="{{$currentStudentsResult->Descripcion}}">
                                        {{$currentStudentsResult->Identificador}}
                                    </span>
                                    </th>
                                @endforeach
                            @endif
                        </tr>

                        </thead>
                        <tbody>
                        <?php $j=0 ?>
                        @if($courses!=null)
                            @foreach($courses as $course)
                                <tr class="even pointer">
                                    <td class="id" hidden >{{ $course->Id }}</td>
                                    <td class=" " >{{ $course->Codigo }} </td>
                                    <td class=" ">{{ $course->Nombre }} </td>
                                    @if($course->NivelAcademico == -1)
                                        <td class="" >Electivo </td>
                                    @else
                                        <td class="" >{{ $course->NivelAcademico }} </td>
                                    @endif

                                @if($currentStudentsResults!=null)
                                    @foreach($currentStudentsResults as $currentStudentsResult)
                                        <!--Missing aport id so it could be changed-->

                                            <?php $temp = ""; ?>
                                            @foreach($course->contributions as $contribution)
                                                @if($currentStudentsResult->IdResultadoEstudiantil == $contribution->IdResultadoEstudiantil and $contribution->Valor == 1)
                                                    <?php $temp = "checked"; ?>
                                                @endif
                                            @endforeach

                                            <td class=" " >
                                                <input value="{{$currentStudentsResult->IdResultadoEstudiantil}}-{{$course->IdCurso}}" type="checkbox" class="flat" id="selectorContVal" name="selectorContVal[]" {{ $temp }}>
                                            </td>

                                        @endforeach
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="separator"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('cursosCiclo_index.flujoCoordinador', $idEspecialidad) }}" class="btn btn-default">< Atras</a>
                        
                    <button class="btn btn-success pull-right" type="submit"  >SIGUIENTE ></button>
                    <!--<a href="{{ route('index.studentsResult') }}" class="btn btn-default pull-right"> Cancelar</a>-->
                </div>
            </div>
        </div>
    </form>
@endsection