<style>
  ul#menu_arbol, ul#menu_arbol ul {
       list-style-type: none;
    }
  ul#menu_arbol li {
       padding: 0 10px;
    }
    ul#menu_arbol ul {
       margin-left: 10px;
    }

    ul#menu_arbol2, ul#menu_arbol2 ul {
       list-style-type: none;
    }
  ul#menu_arbol2 li {
       padding: 0 10px;
    }
    ul#menu_arbol2 ul {
       margin-left: 10px;
    }

</style>

@extends('appWithoutHamburger')
@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Confirmación del Usuario</h3>
  </div>  
</div>

<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <form action="{{ route('period_store2.flujoCoordinador',$idEspecialidad) }}" method="POST" id="formEditPeriod"  name="formEditPeriod" novalidate="true" class="form-horizontal">

    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

    <div class="x_title">
      <h2>Creación de un nuevo periodo en la especialidad con nombre {{$especialidad->Nombre}}</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
           
      <div class="row" style="margin-top: 10px;">
        <div class="form-group">
          <div class="col-md-12 col-sm-12"></div>
          <p>CICLOS</p>
          <p>Ciclo inicio: {{$fechaCicloInicio}} - Ciclo Fin: {{$fechaCicloFin}}</p>
          <p> A partir de estos ciclos se podrá iniciar un Ciclo Académico en la siguiente ventana.</p>
          <p> Si el ciclo a empezar no se encuentra entre estos ciclos, se debe crear finalizar este Periodo y crear uno Nuevo.</p>
          <br>
          <p>CARACTERISTICAS DEL PERIODO</p>
          <p>Nivel de criterio: {{$criteriaLevel}}</p>
          <p>Aceptación %: {{$facultyAgreement}}</p>
          <br>
          <?php $a = 0; ?>
          <p>INSTRUMENTOS</p>
          <p>Los instrumentos seleccionados para este periodo son los siguientes:</p>
          @if($measuresAll!=null)
          @foreach($measuresAll as $mes)
            @if (in_array($mes->IdFuenteMedicion, $measures))
            <?php $a++; ?>  
            <p>{{$a}}. {{$mes->Nombre}}</p>
            @endif
          @endforeach
          @endif
          <br>
          <?php $b = 0; ?>
          <p> OBJETIVOS</p>
          @if($educationalObjetivesAll!=null)
          @foreach($educationalObjetivesAll as $obj)
            @if (in_array($obj->IdObjetivoEducacional, $educationalObjetives)) 
            <?php $b++; ?> 
              <p>{{$b}}. {{$obj->Descripcion}}</p>
            @endif
          @endforeach
          @endif
          <br>
          <p>RESULTADOS-CRITERIOS-ASPECTOS</p>
          <p> Los resultados, aspectos y criterios seleccionados para este periodo son los siguientes:</p>
          <?php $l = 0; ?>
          <?php $m = 0; ?> 
          <?php $n = 0; ?>  
          <ul id="menu_arbol"> 
          @if($studentResultAll!=null)
          @foreach($studentResultAll as $strst)
            @if(in_array($strst->IdResultadoEstudiantil, $studentsResults))
              <?php $l++; ?> 
               
             <li><a href="#" title="No hacer click">{{$l}}. {{$strst->Descripcion}}</a>
                <ul id="menu_arbol2">
                @if($strst->aspects!=null)
                @foreach ($strst->aspects as $asp)
                  @if(in_array($asp->IdAspecto, $aspects))
                  <?php $m++; ?>

                  
                  <li><a href="#" title="No hacer click">{{$l}}.{{$m}}. {{$asp->Nombre}}</a>
                  <ul>
                    @if($asp->criterion!=null)
                    @foreach ($asp->criterion as $crt)
                      @if(in_array($crt->IdCriterio, $criterions))
                      <?php $n++; ?>
                      
                      <li><a href="#" title="No hacer click">{{$l}}.{{$m}}.{{$n}}. {{$crt->Nombre}}</a></li>
                      @endif
                    @endforeach
                    <?php $n=0; ?>
                    @endif
                  </ul>
                  </li>
                  @endif
                @endforeach
                <?php $m=0; ?>
                @endif
                </ul>
             </li>
             @endif
          @endforeach
          @endif
          </ul>
          <br>
        </div>
      </div>        
      
    </div>

    <div class="row"></div>
    <div class="separator"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-success pull-right submit" type="submit" >SIGUIENTE > </button>
            <a  href="{{ route('period_create.flujoCoordinador', $idEspecialidad) }}"  class="btn btn-default pull-left">< Atras</a>
        </div>
    </div>
    </form>
  </div>
</div>
@endsection

  <script type="text/javascript">
   window.onload = function () {
     var tree = document.getElementById("menu_arbol");
     var lists = [ menu_arbol ];
     for (var i = 0; i < tree.getElementsByTagName("ul").length; i++)
          lists[lists.length] = tree.getElementsByTagName("ul")[i];
     for (var i = 0; i < lists.length; i++) {
          var item = lists[i].lastChild;
          while (!item.tagName || item.tagName.toLowerCase() != "li")
          item = item.previousSibling;
          item.className += " cierre";
     }
    };
    
  </script>