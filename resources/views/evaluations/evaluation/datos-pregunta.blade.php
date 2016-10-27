<div class="form-group">
    <label class="control-label col-md-4">Evaluador: </label>
    <div class="col-md-6">
       <select class="form-control" id="select_evaluador">           
           @foreach($evaluators as $evaluator)
           <option value="{{$evaluator->IdDocente}}">{{explode(' ',trim($evaluator->Nombre))[0].' '.$evaluator->ApellidoPaterno}}</option>
           @endforeach
       </select>
   </div>
</div>



