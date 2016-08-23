<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"  id="modal-source">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> Seleccionar Instrumentos de Medición a usar </h4>
            </div>

            <div class="modal-body">
                

                    @if(!$sources->isEmpty())
                    @foreach($sources as $src)        
                        <div class="row" style="margin-top: 10px;">
                            <div class="form-group">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <div class="pull-right">
                                        <input value="{{$src->IdFuenteMedicion}}" type="checkbox" class="flat srcCheck" id="srcCheck" name="srcCheck" checked>
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <label for="middle-name">{{$src->measurement->Nombre}}</label>
                                </div>                                
                            </div>
                        </div>        
                    @endforeach
                    @endif

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-9 col-sm-6 col-xs-12 text-right">
                            <button  class="btn btn-success" id="save-source">Guardar</button>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

<script src="{{ URL::asset('js/intranetjs/measurementSource/view-course-script.js')}}"></script>