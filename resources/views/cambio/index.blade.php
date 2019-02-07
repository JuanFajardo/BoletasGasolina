@extends('gamp')

@section('title') Cambios de Proyectos @endsection
@section('ventana') Cambios @endsection
@section('descripcion') del Presupuesto de los Proyectos @endsection
@section('menuCambio') class="active-menu" @endsection

@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Inicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@endsection

@section('cuerpo')
<table id="tablaGamp" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Proyecto</th>
      <th>Fecha Modificado</th>
      <th>Monto Angituo</th>
      <th>Monto Nuevo</th>
      <th>Observacion</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
        <td>{{ $dato->apertura }} - {{ $dato->actividad }}</td>
        <td>{{ $dato->fecha }}</td>
        <td>{{ $dato->monto_antiguo }}</td>
        <td>{{ $dato->monto_nuevo }}</td>
        <td>{{ $dato->observacion }}</td>
        <td>
          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-list"></li> Listar</a> &nbsp;&nbsp;&nbsp;
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

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

</script>
@endsection
