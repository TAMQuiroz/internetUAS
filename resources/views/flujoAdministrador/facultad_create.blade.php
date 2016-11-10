@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Nueva Especialidad</h3>
  </div>
</div>
  
<div class="clearfix"></div>
<form action="{{ route('facultad_store.flujoAdministrador') }}" method="POST" id="formFaculty" name="formFaculty" novalidate="true" class="form-horizontal"> 
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" id="validarCode" name="validarCode" hidden>
<input type="text" id="validarName" name="validarName" hidden>  
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12"> 
    <div class="x_panel">
      <div class="x_content">
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="error">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="code" class="form-control col-md-7 col-xs-12" type="text" name="code" required="true" >
          </div>
        </div>
      
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="error">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="name" class="form-control col-md-7 col-xs-12" type="text" name="name" required="true" >
          </div>
        </div>
      
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción <span class="error">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea id="description" name="description" class="resizable_textarea form-control" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;" required="true"></textarea>
          </div>
        </div>

        <div class="separator"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-success pull-right" type="submit">Siguiente</button>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
</form>

<script src="{{ URL::asset('js/myvalidations/faculty.js')}}"></script>
@include('modals.delete-modal', ['message' => 'Do you want to delete this faculty?', 'action' => '#', 'button' => 'Delete'])
@endsection