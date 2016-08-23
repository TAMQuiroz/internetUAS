@extends('app')
@section('content')

<div class="page-title">
    <div class="title_left">
        <h3> {{ $course->Nombre }} </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
           
                <div class="x_title">
                    <h2> Información del Curso </h2>
                    <div class="clearfix"></div>
                </div>

                <input id="courseId" name="courseId" type="text" name="code" readonly="true" value="{{$course->IdCurso}}" hidden="true">

                <div class="form-horizontal">
                    <div class="form-group row">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="code" class="form-control col-md-7 col-xs-12" type="text" name="code" readonly="true" value="{{$course->Codigo}}">
                        </div>
                    </div>
                </div>

                <div class="form-horizontal">
                    <div class="form-group row">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nivel Académico </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="academicLevel" class="form-control col-md-7 col-xs-12" name="academicLevel" type="text" readonly="true" value="{{$course->NivelAcademico}}">
                        </div>
                    </div>
                </div>

                <div class="form-horizontal">
                    <div class="form-group row">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Especialidad </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="faculty" name="faculty" class="form-control col-md-7 col-xs-12" type="text" readonly="true" value="{{$course->faculty->Nombre}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    </br>
                    </br>
                    </div>
                </div>   

                <div class="x_title">
                    <h2>  Instrumentos de Medición Asociados </h2>
                    <div class="clearfix"></div>
                </div>

                <div class="form-horizontal">
                    <div class="form-group row">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="idStudentsResult" name="idStudentsResult" class="form-control col-md-7 col-xs-12" type="text">
                                <option value="">-- Seleccione --</option>
                                @if($studentsResults != null)
                                @foreach($studentsResults as $stdRslt)
                                <option value="{{$stdRslt->Identificador}}">
                                    {{ $stdRslt->Identificador }} - {{ $stdRslt->Descripcion }}
                                </option> 
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            @if( count($msrxcrt) == 0)
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-warning">
                        <strong>Advertencia: </strong> No hay instrumentos de medición asociados al curso
                    </div>
                </div>
            </div>
            @else
            <div class="form-group" id="detailTable">
<table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs" border="2">
    <thead>
        <tr class="even pointer"> 
            <th class="column-title" style="vertical-align: middle"> Aspecto </th>
            <th class="column-title" style="vertical-align: middle"> Criterio </th>
            
            @if($sources!=null)
            @foreach($sources as $src)                             

                <?php $pos = 0; ?> 

                @foreach($msrxcrt as $mxc)   
                    @if($mxc->IdFuenteMedicion == $src->IdFuenteMedicion)  
                        <?php $pos = $mxc->IdFuentexCursoxCriterioxCiclo; ?>     
                    @endif                                            
                @endforeach


                @if($pos != 0)  
                    <th value="{{$src->IdFuenteMedicion}}" class="{{$src->IdFuenteMedicion}}" style="vertical-align: middle">{{ $src->Nombre}}</th> 
                @endif  

            @endforeach
            @endif
        </tr>
    </thead>
    <tbody > 
        @if($studentsResults != null)
        @foreach($studentsResults as $stdRslt)
        
        @foreach($stdRslt->aspects as $aspt)
            @if($aspt->Estado == 1)
                @foreach($aspt->criterion as $crt)
                @if($crt->Estado == 1)
            <tr class="even pointer table-mxc" name="{{$stdRslt->Identificador}}" hidden="true"> 

                <td value="{{ $aspt->IdAspecto }}" style="vertical-align: middle">{{ $aspt->Nombre }}</td> 
                <td value="{{ $crt->IdCriterio }}" style="vertical-align: middle">{{ $crt->Nombre }}</td> 

                @if($sources!=null)
                @foreach($sources as $src)                             

                    <?php $temp = ''; ?>
                    <?php $x = ''; ?>
                    <?php $pos = 0; ?> 
                    @if($msrxcrt != null)
                    @foreach($msrxcrt as $mxc)   
                        @if($mxc->IdFuenteMedicion == $src->IdFuenteMedicion)  
                            <?php $pos = $mxc->IdFuentexCursoxCriterioxCiclo; ?>     
                        @endif           
                        @if($mxc->IdFuenteMedicion == $src->IdFuenteMedicion and $mxc->IdCriterio==$crt->IdCriterio)
                            <?php $temp = "checked"; $x = "X"; ?> 
                        @endif                               
                    @endforeach
                    @endif

                    @if($pos != 0)  
                        <td value="{{ $src->IdFuenteMedicion }}" class="{{$src->IdFuenteMedicion}}" style="vertical-align: middle" align="middle">
                            <input hidden="true" value="{{$src->IdFuenteMedicion}}-{{$crt->IdCriterio}}" type="checkbox" class="" id="stRstCheck" name="stRstCheck[]"  {{ $temp }} disabled="true" onchange="c(this)">@if($x != "") <FONT COLOR="green"><h4><b>&#10003;</b></h4> @endif
                        </td>
                    @endif  

                @endforeach
                @endif

            </tr>
            @endif
            @endforeach
                @endif
        @endforeach        

        @endforeach
        @endif
    </tbody>
</table> 

            </div>
            @endif

            <div class="separator"></div>

            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <a href="{{ route('editMesuringByCourse.measurementSource', ['courseId' => $course->IdCurso]) }}" class="btn btn-success pull-right">Editar</a>
                    <a href="{{ route('index.dictatedCourses') }}" class="btn btn-default pull-right">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"> 
    function c(a) 
    { 
        a.checked='checked';
    } 
</script>


<script src="{{ URL::asset('js/intranetjs/measurementSource/view-course-script.js')}}"></script>


@endsection