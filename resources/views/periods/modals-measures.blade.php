<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"  id="modal-measures">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h3>Instrumentos de Medición</h3>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-top: 10px;" id="professors_table">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action" name="table-objs" id="tblIntrumentosModal">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Seleccionar</th>
                                <th class="column-title">Instrumentos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($measures as $m)
                                <tr>
                                    <td hidden>
                                        <input type="hidden" value="{{ $m->IdFuenteMedicion }}">
                                    </td>
                                    
                                    <td>
                                        <input class="measures_input" type="checkbox" value="1">
                                    </td>
                                    <td>
                                        {{ $m->Nombre }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12 col-sm-6 col-xs-12 text-right">
                            <div class="btn btn-success" id="select-measures"><i class="fa fa-check"></i> Seleccionar Fuente</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>