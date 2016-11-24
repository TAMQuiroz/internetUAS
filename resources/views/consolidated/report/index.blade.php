@extends('app')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3> {{ $title }} </h3>
        </div>
    </div>
    

    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">

                <form method="POST" action="{{ route('report.view')}}" id="formReport" name="formReport" novalidate="true">
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <!--
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    -->
                    <div class="form-group">
                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="resultado" class="control-label col-sm-4 col-xs-12">Período<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select  required="true" name="periodo" id="periodo" class="form-control" required>
                                    <option value="0">--Seleccione--</option>
                                    @foreach($periodos as $periodo)
                                        <option value= "{{$periodo->IdPeriodo}}">
                                            {{ $periodo->configuration->cycleAcademicStart->Descripcion }} - {{ $periodo->configuration->cycleAcademicEnd->Descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Resultado Estudiantil<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select name="resultado" id="resultado" class="form-control">
                                    <option value="0">--Seleccione--</option>
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Aspecto<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select name="aspecto" id="aspecto" class="form-control">
                                    <option value="0">--Seleccione--</option>
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>

                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Criterio<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select name="criterio" id="criterio" class="form-control">
                                    <option value="0">--Seleccione--</option>
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>
                        <div class="row"></div>
                        <div class="row">
                            <div  class="col-sm-2"></div>
                            <label for="aspecto" class="control-label col-sm-4 col-xs-12">Curso<span class="error">*</span></label>
                            <div class="col-sm-4 col-xs-12">
                                <select name="curso" id="curso" class="form-control">
                                    <option value="0">--Seleccione--</option>
                                </select>
                            </div>
                            <div  class="col-sm-2"></div>
                        </div>
                        
                        <br>
                        <br>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                 <button class="btn btn-success pull-right" type="submit"><i class="fa fa-plus"></i> Generar Reporte</button>
                            </div>
                        </div>
                    </div>  
                        
                </form>     
            </div>

        </div>
    </div>


    <script>      
        var fila = $("#criterio-fc-table").find("tr");
        if (fila.length == 0) {
            $('#criterio-siguiente-btn').attr("disabled",true);
            //$('#criterio-siguiente-btn').click(function(){return false;});
        }

        //para el combobox se refresque solo
        $(document).ready(function(){
            $('#periodo').change(function(){

                var miUrl=  "{{ url('consolidated/consultarResultados') }}";
                var idPeriodo = $('#periodo').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                //alert(miUrl);
                //alert(idPeriodo);
                //alert(CSRF_TOKEN);

                $.ajax({        
                    type: "GET",   
                    url: miUrl,
                    dataType : "JSON",
                    data: {
                        idPeriodo: idPeriodo,
                        _token: CSRF_TOKEN
                    },
                    success: function(data){

                        console.log(data);  // for testing only
                        $('#resultado').empty();

                        $('#resultado').append('<option value="">--Seleccione--</option>');

                        $.each(data, function(key, element) {
                            $('#resultado').append("<option value='" +  element['IdResultadoEstudiantil'] + "'>" + element['Identificador'] + " - " + element['Descripcion'] + "</option>");
                        });
                       
                    },
                    error: function (e) {
                        console.log('holi');
                      console.log(e.responseText);
                    },

                });

            });
        });     


        //para el combobox se refresque solo
        $(document).ready(function(){
            $('#resultado').change(function(){

                var miUrl=  "{{ url('consolidated/consultarAspectosyCursos') }}";
                var idResultadoEstudiantil = $('#resultado').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                //alert(miUrl);
                //alert(idResultadoEstudiantil);
                //alert(CSRF_TOKEN);

                $.ajax({        
                    type: "GET",   
                    url: miUrl,
                    dataType : "JSON",
                    data: {
                        idResultadoEstudiantil: idResultadoEstudiantil,
                        _token: CSRF_TOKEN
                    },
                    success: function(data){

                        console.log(data);  // for testing only

                        $('#aspecto').empty();

                        $('#aspecto').append('<option value="">--Seleccione--</option>');

                        var aspectos = data['aspectos'];
                        var cursos = data['cursos'];
                        
                        $.each(aspectos, function(key, element) {
                            $('#aspecto').append("<option value='" +  element['IdAspecto'] + "'>" + element['Nombre'] + "</option>");
                        });
                        $.each(cursos, function(key, element) {
                            $('#curso').append("<option value='" +  element['IdCurso'] + "'>" + element['Codigo'] + " - " + element['Nombre'] + "</option>");
                        });
                    },
                    error: function (e) {
                        console.log('holi');
                      console.log(e.responseText);
                    },

                });

            });
        });    

         //para el combobox se refresque solo
        $(document).ready(function(){
            $('#aspecto').change(function(){

                var miUrl=  "{{ url('consolidated/consultarCriterios') }}";
                var idAspecto = $('#aspecto').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                //alert(miUrl);
                //alert(idResultadoEstudiantil);
                //alert(CSRF_TOKEN);

                $.ajax({        
                    type: "GET",   
                    url: miUrl,
                    dataType : "JSON",
                    data: {
                        idAspecto: idAspecto,
                        _token: CSRF_TOKEN
                    },
                    success: function(data){

                        console.log(data);  // for testing only
                        $('#criterio').empty();

                        $('#criterio').append('<option value="">--Seleccione--</option>');

                        $.each(data, function(key, element) {
                            $('#criterio').append("<option value='" +  element['IdCriterio'] + "'>" + element['Nombre'] + "</option>");
                        });
                       
                    },
                    error: function (e) {
                        console.log('holi');
                      console.log(e.responseText);
                    },

                });

            });
        }); 

        //para el combobox se refresque solo
        /*
        $(document).ready(function(){
            $('#resultado').change(function(){

                var miUrl=  "{{ url('consolidated/consultarCursos') }}";
                var idResultado = $('#resultado').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                //alert(miUrl);
                //alert(idPeriodo);
                //alert(CSRF_TOKEN);

                $.ajax({        
                    type: "GET",   
                    url: miUrl,
                    dataType : "JSON",
                    data: {
                        idResultado: resultado,
                        _token: CSRF_TOKEN
                    },
                    success: function(data){

                        console.log(data);  // for testing only
                        $('#curso').empty();

                        $('#curso').append('<option value="">--Seleccione--</option>');

                        $.each(data, function(key, element) {
                            $('#curso').append("<option value='" +  element['IdCurso'] + "'>" + element['Codigo'] + " - " + element['Nombre'] + "</option>");
                        });
                       
                    },
                    error: function (e) {
                        console.log('holi');
                      console.log(e.responseText);
                    },

                });

            });
        }); 
        */
    </script>
    <script src="{{ URL::asset('js/intranetjs/teachers/index-teacher-script.js')}}">
    
@endsection