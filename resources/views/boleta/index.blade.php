@extends('gamp')

@section('title') Boletas @endsection
@section('ventana') Boletas @endsection
@section('menuBoleta') class="active-menu" @endsection
@section('descripcion') De los gastos de los diferentes proyectos @endsection

@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Inicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a  style="color:#fff;" href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target=""> <li class="fa fa-plus"></li> Nuevo Boleta </a>
@endsection

@section('modal1')
<datalist id="lista-proyecto">
  @foreach($proyectos as $proyecto)
    <option value="{{ $proyecto->id }}| {{ $proyecto->apertura }} | {{ $proyecto->actividad }} | {{ number_format($proyecto->total, 2, ",", ".") }} Bs.">
  @endforeach
</datalist>

<datalist id="list-unidad">
  <option value='DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS'>
  <option value='DEPARTAMENTO DE FISCALIZACIÓN'>
  <option value='JEFATURA  LUCHA CONTRA LA CORRUPCION Y PART. CIUDADA'>
  <option value='DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS DE ILUMINACIÓN PÚBLICA'>
  <option value='DEPARTAMENTO DE FORESTACIÓN Y ÁREAS VERDES'>
  <option value='DEPARTAMENTO DE PROYECTOS URBANOS Y AMBIENTALES'>
  <option value='DEPARTAMENTO DE PROMOCIÓN CULTURAL'>
  <option value='CONCEJO MUNICIPAL'>
  <option value='DEPARTAMENTO DE POLICIA MUNICIPAL'>
  <option value='RELACIONES PUBLICAS'>
  <option value='ASESORIA LEGAL'>
  <option value='DIRECCIÓN DE PLANIFICACIÓN URBANA, MANTENIMIENTO Y MEJORAMIENTO DE VIAS'>
  <option value='DEPARTAMENTO DE CATASTRO URBANO'>
  <option value='DIRECCIÓN DE DESARROLLO HUMANO'>
  <option value='DEPARTAMENTO DE ASUNTOS GENERACIONALES'>
  <option value='DEPARTAMENTO DE TRÁMITES INTERNOS'>
  <option value='SUB ALCALDIA DE MANQUIRI'>
  <option value='DIRECCION DE RECURSOS HUMANOS'>
  <option value='DIRECCIÓN DE MANTENIMIENTO DE MAQUINARIA Y EQUIPOS PESADO Y LIVIANO'>
  <option value='HOSPITAL SAN CRISTOBAL'>
  <option value='SERVICIO DE SALUD MULTIDISTRITAL INCLUYE HOSPITAL SAN ROQUE SAN CRISTOBAL'>
  <option value='DEPARTAMENTO DE SUPERVISIÓN Y FISCALIZACIÓN DE OBRAS'>
  <option value='DIRECCION DE CULTURA'>
  <option value='DIRECCION DE PATRIMONIO HISTORICO'>
  <option value='DEPARTAMENTO DE CONTROL URBANO'>
  <option value='ADMINISTRACIÓN CEMENTERIO GENERAL'>
  <option value='DIRECCION DE GESTION DE SERVICIOS'>
  <option value='HOSPITAL SAN ROQUE'>
  <option value='DIRECCION DE DESARROLLO ECONOMICO'>
  <option value='DEPARTAMENTO DE PROMOCIÓN TURÍSTICA Y CONTROL DE C'>
  <option value='DIRECCION DE PLANIFICACION TERRITORIAL Y AMBIENTAL'>
  <option value='HONORABLE CONCEJO MUNICIPAL'>
  <option value='DEPARTAMENTO DE OBRAS CIVILES Y ACCIÓN COMUNAL'>
  <option value='DEPARTAMENTO DE REGISTRO CONTROL Y PLANILLAS'>
  <option value='DEPARTAMENTO DE SALUD'>
  <option value='DEPARTAMENTO DE TESORERIA'>
  <option value='DEPARTAMENTO DE ADMINISTRACIÓN DE BIENES Y MATERIAL'>
  <option value='JEFE DE CONTROL DE UNIDADES EDUCATIVAS MULTIDISTRITAL '>
  <option value='DIRECCION DE SEGURIDAD CIUDADANA'>
  <option value='UNIDAD DE PLANIFICACION MUNICIPAL'>
  <option value='DIRECCION DE DESARROLLO URBANO'>
  <option value='DEPARTAMENTO DE ADQUISICIONES LICITACIONES Y CONTRATACIONES'>
  <option value='DEPARTAMENTO DE REGISTROS'>
  <option value='DEPARTAMENTO DE ARCHIVOS'>
  <option value='AUDITORIA INTERNA'>
  <option value='METODOS Y SISTEMAS'>
  <option value='SUB ALCALDIA DE CHULLCHUCANI'>
  <option value='DIRECCION DE FINANZAS'>
  <option value='DIRECCION DE FINANZAS'>
  <option value='DIRECCION DE RECAUDACIONES'>
  <option value='DEPARTAMENTO DE EXTENSIÓN URBANA'>
  <option value='ADMINISTRACIÓN COMPLEJO RECREACIONAL TARAPAYA'>
  <option value='DIRECCION DE OBRAS PUBLICAS'>
  <option value='JEEFATURA DE AREAS VERDES'>
  <option value='SECRETARIA DE MOVIMIENTOS SOCIALES'>
  <option value='JEFATURA DE SALUD'>
  <option value='CENTRO DE ZOONOSIS'>
  <option value='JEFATURA DE AREAS VERDES'>
  <option value='INTENDENCIA MUNICIPAL'>
  <option value='DIRECCIÓN DE CATASTRO'>
  <option value='DIRECCIÓN DE OBRAS PUBLICAS (PREVENCIÓN DE RIESGOS)'>
  <option value='JEFATURA DE GENERO GENERACIONAL (CASA DE ACOGIDA)'>
  <option value='DIRECCIÓN DE MAESTRANZA'>
  <option value='SECRETARIA DE DESARROLLO  TURISTICO, PATRIMONIAL Y CULTURAL'>
  <option value='DIRECCION  DE TURISMO'>
  <option value='DIRECCIÓN DE SALUD'>
  <option value='DIRECCIÓN DE CULTURA'>
  <option value='SUB ALCLADIA DE TARAPAYA'>
  <option value='UNIDAD DE DEPORTES'>
  <option value='JEFATURA DE GENERO GENERACIONAL (SLIM)'>
  <option value='SECRETARIA ADMINISTRATIVA Y FINANCIERA'>  
  <option value=''''>
  <option value='SECRETARIA DE DESARROLLO HUMANO'>
  <option value='SUB ALCALDIA DE TARAPAYA'>
  <option value='DIRECCION DE PLANIFICACION URBANA MANTENIMIENTO Y MEJORAMIENTO DE VIAS'>
  <option value='SECRETARIA DE DESARROLLO TERRITORIAL Y MEDIO AMBIENTE'>
  <option value='DIRECCIÓN DE OBRAS (PREVENSION DE RIESGO)'>
  <option value='SECRETARIA DE ORDENAMIENTO TERRITORIAL  URBANO IPUP'>
  <option value='JEFATURA DE TRAFICO Y VIAVILIDAD'>
  <option value='DIRECCION DE OBRAS PUBLICAS - PREVENSION DE RIESGO'>
  <option value='SUB ALCALDIA DE HUARI HUARI'>
  <option value='UNIDAD DE COMUNICACION'>
  <option value='JEFATURA DE MANTENIMIENTO Y SERVICIOS'>
  <option value='JEFATURA DE GENERO GENERACIONAL (DEFENSORIAS DE LA NIÑES )'>
  <option value='DIRECCION DE MAESTRANZA'>
  <option value='CEMENTERIO GENERAL'>
  <option value='NUEVA TERMINAL'>
  <option value='SECRETARIA GENERAL'>
  <option value='DIRECCION DE AUDITORIA'>
  <option value='COMPLEJO DE TARAPAYA'>
  <option value='JEFATURA DE ADQUISICIONES'>
  <option value='UNIDAD DE DESAYUNO ESCOLAR'>
  <option value='CONCEJO MUNICIPAL DE TRANSAPORTE'>
  <option value='DIRECCION DE TURISMO'>
  <option value='JEFATURA DE PROYECTOS URBANOS Y AMBIENTALES'>
  <option value='JEFATURA DE PROYECTOS URBANOS  Y AMBIENTALES'>
  <option value='DIRECCIÓN DE OBRAS PUBLICAS'>
  <option value='DIRECCIÓN DE ASESORÍA LEGAL'>
  <option value='JEFATURA DE SISTEMAS'>
  <option value='CEMENTERIO'>
  <option value='JEFATURA DE GENERO GENERACIONAL ( ADULTO MAYOR)'>
  <option value='ADMINISTRACION CENTRO DE SALUD SAN ANCELMO'>
  <option value='ADMINISTRACION HOSPITAL SAN CRISTOBAL'>
  <option value='ADMINISTRACION INFRAESTRUCTURAS CULTURALES'>
  <option value='CONCEJO MUNICIPAL'>
  <option value='DEPARTAMENTO DE CONTABILIDAD'>
  <option value='DEPARTAMENTO DE LIQUIDACIONES'>
  <option value='DEPARTAMENTO DE PLANIFICION MUNICIPAL'>
  <option value='DEPARTAMENTO DE PRESUPUESTOS'>
  <option value='DEPARTAMENTO DE TRÁFICO Y VIALIDAD'>
  <option value='DESPACHO DEL ALCALDE'>
  <option value='DIRECCIONES DE RECAUDACIONES'>
  <option value='PREVENCION DE RIESGOS'>
  <option value='JEFATURA DE  SISTEMAS'>
  <option value='DIRECCIÓN DE AUDITORIA'>
  <option value='UNIDAD DE COMUNICACIÓN'>
  <option value='DIRECCIÓN DE OBRAS PUBLICAS (DPTO ELECTRICO)'>
  <option value='DIRECCIÓN DE OBRAS PUBLICAS (DPTO. ELÉCTRICO)'>
  <option value='MANTENIMIENTO ELECTRICO'>
  <option value='JEFATURA DE TESORERIA'>
  <option value='DIRECCION DE PLANIFICACION'>
  <option value='DIRECCIÓN DE DESARROLLO ECONÓMICO'>
  <option value='JEFATURA DE PLANIFICACION'>
  <option value='SECRETARIA DESARROLLO TURISTICO  CULTURAL Y PATRIMONIAL'>
  <option value='UNUDAD DE DEPORTES'>
  <option value='INTENDENCIA MUNCIPAL'>
  <option value='INTENDENCIA MUNICPAL'>
  <option value='INTENDENCIA MUNICIPAL '>
  <option value='DIRECCIÓN DE GESTIÓN DE SERVICIOS'>
  <option value='DIRECCIÓN DE SUPERVISION Y FISCALIZACIÓN DE PROYECTOS'>
  <option value='DIRECCIÓN DE TURISMO'>
  <option value='JEFATURA DE PRESUPUESTOS'>
  <option value='DIRECCIÓN DE PLANIFICACIÓN '>
  <option value='JEFATURA DE GENERO GENERACIONAL (DEFENSORIAS DE LA NIÑES)'>
  <option value='JEFATURA DE GENERO GENERACIONAL (UMADIS)'>
  <option value='JEFATURA DE  SEGURIDAD CIUDADANA'>
  <option value='JEFATRURA DE MANTENIMIENTO DE SERVICIOS'>
  <option value='JEFATURA DE MANTENIMIENTO DE SERVICIOS'>
  <option value='JEFATURA DE MANTENIMIENTO Y SEVICIOS'>
  <option value='JEFATURA DE MANTENIMIENTO Y SERVICOS'>
  <option value='UNIDAD DE TRANSPARENCIA'>
  <option value='ESCUELA DE PLATERIA'>
  <option value='JEFATURA DE TRAFICO Y VIALIDAD'>
  <option value='JEFATURA DE TRAFICO Y VILIDAD'>
  <option value='UNIDAD DE DESAYUNO Escolar'>
  <option value='JEFATURA DEGENERO GENERACIONAL (SLIM)'>
  <option value='JEFATURA DE GENERO GENERACIONAL ( SLIM)'>
  <option value='JEFATURA DE SUPERVISION '>
  <option value='JEFATURA DE ÁREAS VERDES'>
  <option value='CONSEJO DE TRANSPORTE '>
  <option value='UNIDAD DEL DESAYUNO ESCOLAR'>
  <option value='SECRETARIA ADMINISTRATIVA Y FINANCIERA'>
  <option value='DIRECCIÓN DE PATRIMONIO HISTÓRICO'>
  <option value='DIRECCION  DE MAESTRANZA'>
  <option value='DIRECCIÓN DE OBRAS PUBLICAS '>
  <option value='DIRECCION DE OBRAS PUBLICAS '>
  <option value='DIRECCIÓN  DE TURISMO'>
  <option value='JEFATURA DE TURISMO'>
  <option value='Centro de Zoonosis'>
  <option value='DIRECCIÓN DE OBRAS (CARPINTERÍA)'>
  <option value='DIRECCION DE DESARROLLLO ECONOMICO Y LA JEFATURA DE AREAS VERDES'>
  <option value='DIRECCION DE DESARROLLO ECONOMICO (CEMENTERIO)'>
  <option value='DIRECCION DE DESARROLLO ECONOMICO '>
  <option value='SECRETARIA DE ORDENAMIENTO TERRITORIAL  URBANO IPUP '>
  <option value='DEPARTAMENTO DE OBRAS CIVILES '>
  <option value='DIRECCIÓN DE SALUD (CENTRO INFANTILES)'>
  <option value='JEFATURA DE CONTABILIDAD'>
  <option value='DIRECCION DE DESARROLLO ECONOMICO (HUCHUNI)'>
</datalist>
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">
      <div class="modal-header panel-heading">
        <b>Nuevo</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

        <div class="row">
          <div class="col-md-3">
            <label for="boleta_" > <b><i>N° Boleta</i></b> </label>
            {!! Form::text('boleta', $max+1, ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'boleta_', 'required', 'readonly']) !!}
          </div>
          <div class="col-md-3">
            <label for="fecha_" > <b><i>Fecha</i></b> </label>
            {!! Form::date('fecha', date('d-m-Y'), ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'fecha_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="tipo_" > <b><i>Tipo</i></b> </label>
            {!! Form::select('tipo', [''=>'', 'combustible'=>'Combustible', 'personal'=>'Personal'], null, ['class'=>'form-control', 'id'=>'tipo_', 'required']) !!}
          </div>
          <div class="col-md-3">
            <label for="ffof_" > <b><i>FF-OF</i></b> </label>
            {!! Form::select('ffof', [''=>'', '20-210'=>'20-210 Rec. Especificos', '20-220'=>'20-220 Regalias', '41-111'=>'41-111 T.G.N.', '41-113'=>'41-113 T.G.N.-C.T.', '41-119'=>'41-119 IDH'], null, ['class'=>'form-control', 'id'=>'ffof_', 'required']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="id_proyecto_" > <b><i>Proyecto</i></b> </label>
            {!! Form::text('id_proyecto', null, ['class'=>'form-control', 'list'=>'lista-proyecto', 'id'=>'id_proyecto_', 'required']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="unidad_" > <b><i>Unidad Solicitante</i></b> </label>
            {!! Form::text('unidad', null, ['class'=>'form-control', 'list'=>'list-unidad', 'placeholder'=>'Presupuesto', 'id'=>'unidad_']) !!}
          </div>
        </div>

        <div class="row" id="uno"  style="display:none;">
          <br><b>Presios sacados de la ANH www.anh.gob.bo</b><br>
          <div class="col-md-4">
            <label for="litros_" > <b><i>Cant. Litros</i></b> </label>
            {!! Form::text('litros', null, ['class'=>'form-control', 'placeholder'=>'Cant. litros', 'id'=>'litros_']) !!}
          </div>
          <div class="col-md-4">
            <label for="costo_" > <b><i>Costo/Litro Bs/L</i></b> </label>
            {!! Form::select('costo', ['3.74'=>'Gasolina Especial 3,74 Bs/L', '3.72'=>'Diesel Oil 3,72 Bs/L'], null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'costo_']) !!}
          </div>
          <div class="col-md-4">
            <label for="monto_" > <b><i>Monto</i></b> </label>
            {!! Form::text('monto', null, ['class'=>'form-control', 'placeholder'=>'Monto', 'id'=>'monto_']) !!}
          </div>

        </div>

        <div class="row" id="dos" style="display:none;">
            {!! Form::hidden('litros1', '0') !!}
            {!! Form::hidden('costo1', '0') !!}
          <div class="col-md-6">
            <label for="monto1_" > <b><i>Monto</i></b> </label>
            {!! Form::text('monto1', null, ['class'=>'form-control', 'placeholder'=>'Monto', 'id'=>'monto1_']) !!}
          </div>
          <div class="col-md-6">
            <label for="unidad1_" > <b><i>Unidad</i></b> </label>
            {!! Form::text('unidad1', null, ['class'=>'form-control', 'list'=>'list-unidad', 'placeholder'=>'Presupuesto', 'id'=>'unidad1_']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <label for="observacion_" > <b><i>Observacion</i></b> </label>
            {!! Form::text('observacion', null, ['class'=>'form-control', 'id'=>'observacion_']) !!}
          </div>
        </div>

        <hr>
        {!! Form::hidden('id_user', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">
                <div class="modal-header panel-heading">
                    <b>Actualizar </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Proyecto.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                      <div class="col-md-3">
                        <label for="boleta" > <b><i>N° Boleta</i></b> </label>
                        {!! Form::text('boleta', $max+1, ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'boleta', 'required', 'readonly']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="fecha" > <b><i>Fecha</i></b> </label>
                        {!! Form::date('fecha', date('d-m-Y'), ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'fecha', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="tipo" > <b><i>Tipo</i></b> </label>
                        {!! Form::select('tipo', [''=>'', 'combustible'=>'Combustible', 'personal'=>'Personal'], null, ['class'=>'form-control', 'id'=>'tipo', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="ffof" > <b><i>FF-OF</i></b> </label>
                        {!! Form::select('ffof', [''=>'', '20-210'=>'20-210 Rec. Especificos', '20-220'=>'20-220 Regalias', '41-111'=>'41-111 T.G.N.', '41-113'=>'41-113 T.G.N.-C.T.', '41-119'=>'41-119 IDH'], null, ['class'=>'form-control', 'id'=>'ffof', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label for="id_proyecto" > <b><i>Proyecto</i></b> </label>
                        {!! Form::text('id_proyecto', null, ['class'=>'form-control', 'list'=>'lista-proyecto', 'id'=>'id_proyecto', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label for="unidad" > <b><i>Unidad Solicitante</i></b> </label>
                        {!! Form::text('unidad', null, ['class'=>'form-control', 'list'=>'list-unidad', 'placeholder'=>'Presupuesto', 'id'=>'unidad']) !!}
                      </div>
                    </div>

                    <div class="row" id="tres"  style="display:none;">
                      <br><b>Presios sacados de la ANH www.anh.gob.bo</b><br>
                      <div class="col-md-4">
                        <label for="litros" > <b><i>Cant. Litros</i></b> </label>
                        {!! Form::text('litros', null, ['class'=>'form-control', 'placeholder'=>'Cant. litros', 'id'=>'litros']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="costo" > <b><i>Costo/Litro Bs/L</i></b> </label>
                        {!! Form::select('costo', ['3.74'=>'Gasolina Especial 3,74 Bs/L', '3.72'=>'Diesel Oil 3,72 Bs/L'], null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'costo']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="monto" > <b><i>Monto</i></b> </label>
                        {!! Form::text('monto', null, ['class'=>'form-control', 'placeholder'=>'Monto', 'id'=>'monto']) !!}
                      </div>
                    </div>

                    <div class="row" id="cuatro" style="display:none;">
                        {!! Form::hidden('litros1', '0') !!}
                        {!! Form::hidden('costo1', '0') !!}
                      <div class="col-md-6">
                        <label for="monto1" > <b><i>Monto</i></b> </label>
                        {!! Form::text('monto1', null, ['class'=>'form-control', 'placeholder'=>'Monto', 'id'=>'monto1']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="unidad1" > <b><i>Unidad</i></b> </label>
                        {!! Form::text('unidad1', null, ['class'=>'form-control', 'list'=>'list-unidad', 'placeholder'=>'Presupuesto', 'id'=>'unidad1']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <label for="observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion', null, ['class'=>'form-control', 'id'=>'observacion']) !!}
                      </div>
                    </div>

                    <hr>
                    {!! Form::hidden('id_user', '1') !!}
                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('cuerpo')
<table id="tablaGamp" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Proyecto</th>
      <th>Fecha</th>
      <th>Tipo</th>
      <th>Monto</th>
      <th>Unidad</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
        <td>{{ $dato->id }}</td>
        <td>{{ $dato->apertura }}  - {{ $dato->actividad }}</td>
        <td>{{ $dato->fecha }}</td>
        <td>{{ strtoupper($dato->tipo) }}</td>
        <td>{{ $dato->monto }}</td>
        <td>{{ $dato->unidad }}</td>
        <td>
          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
          <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Eliminar</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{!! Form::open(['route'=>['Proyecto.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 0, 'desc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Buscar ",
        "infoFiltered": "(Busqueda de _MAX_ registros en total)",
        "oPaginate":{
          "sLast":"Final",
          "sFirst":"Principio",
          "sNext":"Siguiente",
          "sPrevious":"Anterior"
        }
      }
    });
  });

  $('#tipo_').change(function(event){
    var dato = $('#tipo_').val();
    if(dato == "combustible"){
      $('#uno').show();
      $('#dos').hide();
    }else{
      $('#uno').hide();
      $('#dos').show();
    }
  });

  $('#tipo').change(function(event){
    var dato = $('#tipo').val();
    if(dato == "combustible"){
      $('#tres').show();
      $('#cuatro').hide();
    }else{
      $('#tres').hide();
      $('#cuatro').show();
    }
  });


  $('#costo_').change(function(event){
    var costo = $('#costo_').val();
    var litros = $('#litros_').val();
    var monto = parseFloat(costo) * parseFloat(litros);
    $('#monto_').val(monto);
  });

  $('#costo').change(function(event){
    var costo = $('#costo').val();
    var litros = $('#litros').val();
    var monto = parseFloat(costo) * parseFloat(litros);
    $('#monto').val(monto);
  });

  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Proyecto/")}}/'+id;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#apertura').val(el.apertura);
          $('#actividad').val(el.actividad);
          $('#distrito').val(el.distrito);
          $('#presupuesto').val(el.presupuesto);
        });
      }
    });
  });

  /*$('.eliminar').click(function(event) {
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-delete');
    var url = form.attr('action').replace(':DATO_ID',id);
    var data = form.serialize();
    if(confirm('Esta seguro de eliminar el Proyecto')){
      $.post(url, data, function(result, textStatus, xhr) {
        alert(result);
        fila.fadeOut();
      }).fail(function(esp){
        fila.show();
      });
    }
  });*/
</script>
@endsection
