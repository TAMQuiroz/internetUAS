@extends('base')
@section('contenido')

<!-- Estos linea es para las migajas-->
<nav class="red lighten-2">
  <div class="nav-wrapper container">
    <div class="col s12">
        <a href="#" class="breadcrumb">Especialidad</a>
    </div>
  </div>
</nav>

<div class="container">

    <div class= "row ">
        <h3 class="red-text text-lighten-2">Lista de especialidades</h3>
    </div>
    <br>
    <br>

    <div class= "row">
        <div class="col s12 right-align">
            <a href="{{url('faculty/new')}}" class="waves-effect waves-light btn">+ Nueva especialidad</a>
        </div>
        
    </div>

    <div class= "row">
        <table class= "bordered highlight responsive-table">
            <thead>
                <tr>
                    <th data-field="codigo">Código</th>
                    <th data-field="nombre">Nombre</th>
                    <th data-field="acciones">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($faculties as $fac)
                <tr>
                    <td class="facultyId" hidden="true">@if($fac!=null) {{$fac->IdEspecialidad}} @endif</td>
                    <td class=" ">@if($fac!=null) {{$fac->Codigo}} @endif</td>
                    <td class=" ">@if($fac!=null) {{$fac->Nombre}} @endif</td>

                    <td class=" ">
                        @if(in_array(72, Session::get('actions')))
                            <a  onclick="show('{{$fac->IdEspecialidad}}')" title="Buscar"><i class="material-icons">visibility</i></a>
                        @endif

                        @if(in_array(71, Session::get('actions')))
                            <a  title="Editar" href="{{route('edit.faculty', ['facultyId' => $fac->IdEspecialidad])}}"><i class="material-icons">edit</i></a>
                        @endif
                        
                        @if(in_array(78, Session::get('actions')))
                            <a  data-toggle="modal" data-target=".bs-example-modal-sm" title="Eliminar"><i class="material-icons">delete</i></a>
                        @endif

                    </td>

                </tr>   

                @endforeach

            </tbody>
        </table>        
        

    </div>

 </div>


    <script type="text/javascript">
        function show(id){
            $.get(baseUrl+'/faculty/view/' + id , function(data){
                $('#modal-faculty #edit-button').attr("href", baseUrl + "/faculty/edit?facultyId=" + id );
                $('#modal-faculty #faculty-code').html(data.fac.Codigo);
                $('#modal-faculty #faculty-id').html(data.fac.IdEspecialidad);
                $('#modal-faculty #faculty-name').html(data.fac.Nombre);
                $('#modal-faculty #faculty-coordinator').html(data.coordinatorName + " " + data.coordinatorLastName + " " + data.coordinatorSLastName);
                $('#modal-faculty #faculty-desc').html(data.fac.Descripcion);
                $('#modal-faculty').modal();
            });
        }
    </script>
    <script type="text/javascript">
    $('.delete-faculty').on("click", function(event){
        var facultyId = $(this).closest('tr').find('.facultyId').text();
        $('#modal-button').attr("href", baseUrl + "/faculty/delete?facultyId=" + facultyId);
    });
    </script>
    @include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar la especialidad?', 'action' => '#', 'button' => 'Delete'])
    @include('faculty.view-modal', ['title' => 'Faculty #'])
@endsection