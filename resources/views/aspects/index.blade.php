@extends('app')
@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>{{ $title }}</h3>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <form action="{{ route('create.aspects')}}" method="GET" id="formAspect" name="formAspect" novalidate="true" class="form-horizontal">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-horizontal">
            <div class="row" style="margin-top: 10px;margin-bottom: 10px;">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Resultado Estudiantil (RE)</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="studentsResult" class="form-control col-md-7 col-xs-12" type="text" name="resultado-estudiantil" >
                  <option value="">-- Seleccione --</option>

                  @foreach($studentsResults as $stdRslt)
                  <option value="{{$stdRslt->IdResultadoEstudiantil}}">
                    {{ $stdRslt->Identificador }} - {{ $stdRslt->Descripcion }} 
                  </option> 
                  @endforeach
                  
                </select>
              </div>
            </div>
            <div class="row">
                
                   <button class="btn btn-success pull-right" type="submit"> Nuevo Aspecto</button>
                
              </div>
        </div>
      </form>
      @if($aspects==null)

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="alert alert-warning">
            <strong>Advertencia: </strong> No hay Aspectos asociados
          </div>
        </div>
      </div>

      @else
      <table class="table table-striped responsive-utilities jambo_table bulk_action" id="aspect-table">
        <thead>
          <tr class="headings">
            <th class="col-sm-3  column-title">Resultado Estudiantil</th>
            <th class="col-sm-5 column-title">Nombre del Aspecto</th>
            <th class="col-sm-2 column-title">Estado</th>
            <th class="col-sm-2 column-title last">Acciones</th>
          </tr>
        </thead>

        <tbody>

          @foreach($aspects as $asp)
          <tr class="even pointer aspect {{ $asp->studentsResult->IdResultadoEstudiantil }}">
            <td class="aspect_code" hidden="true">{{ $asp->IdAspecto}}</td>
            <td class="aspect_studentsResult" hidden="true">{{ $asp->studentsResult->IdResultadoEstudiantil}}</td>
            <td class="aspect_studentsResultName" hidden="true">{{$asp->studentsResult->Identificador}} - {{$asp->studentsResult->Descripcion}}</td>        
            <td class="aspect_re">{{$asp->studentsResult->Identificador}}</td>
            <td class="aspect_name">{{ str_limit($asp->Nombre,40)}}</td>
            @if($asp->Estado == 1)
            <td class=""><span class="label label-success"> Activo </span></td>
            @else
            <td class=""><span class="label label-danger"> Inactivo </span></td>
            @endif
            <td class="aspect-actions">
              <a href="{{ route('view.aspects', ['aspect-code' => $asp->IdAspecto]) }}" class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></a>
              <a class="btn btn-primary btn-xs edit-aspect" data-toggle="modal" data-target="#aspect-edit"><i class="fa fa-pencil"></i></a>
              <a class="btn btn-danger btn-xs delete-aspect" data-toggle="modal" data-target=".bs-example-modal-sm" href=""><i class="fa fa-remove"></i></a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      @endif

    </div>
  </div>
</div>

<script src="{{ URL::asset('js/intranetjs/aspects/index-aspect-script.js')}}"></script>

@include('aspects.aspect-new-modal', ['title' => 'Nuevo Aspecto'])
@include('aspects.aspect-edit-modal', ['title' => 'Editar Aspecto'])

@include('modals.delete-modal', ['message' => '¿Esta seguro que desea eliminar el aspecto?', 'action' => '#', 'button' => 'Delete'])

<script type="text/javascript">
  @if( @Session::has('error') )
     toastr.error('{{ @Session::get('error') }}');
  @endif
</script>

@endsection