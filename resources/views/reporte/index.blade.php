@extends('gamp')


@section('title') Reportes @endsection

@section('ventana') Reportes @endsection
@section('descripcion') en formato HTML y PDF @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;"> <i class="fa fa-home"></i> Inicio </a>
 @endsection

@section('menuReporte')
 class="active-menu"
@endsection

@section('cuerpo')
{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

<div class="row">
  <div class="col-md-2">
    <label for="inicio" > <b><i>Fecha Inicio</i></b> </label>
    {!! Form::date('inicio', null, ['class'=>'form-control', 'placeholder'=>'Fecha Inicio', 'id'=>'inicio', 'required']) !!}
  </div>
  <div class="col-md-2">
    <label for="fin" > <b><i>Fecha Fin</i></b> </label>
    {!! Form::date('fin', null, ['class'=>'form-control', 'placeholder'=>'Fecha Final', 'id'=>'fin', 'required']) !!}
  </div>

  <div class="col-md-2">
    <label for="ffof" > <b><i>Fuente de Financiamiento</i></b> </label>
    {!! Form::select('ffof', ['todo'=>'todo', '20-210'=>'20-210 Rec. Especificos', '20-220'=>'20-220 Regalias', '41-111'=>'41-111 T.G.N.', '41-113'=>'41-113 T.G.N.-C.T.', '41-119'=>'41-119 IDH'], null, ['class'=>'form-control', 'id'=>'ffof']) !!}
  </div>

  <div class="col-md-2">
    <label for="tipo" > <b><i>Tipo<i></b> </label>
    {!! Form::select('tipo', ['todo'=>'todo', 'combustible'=>'Combustible', 'personal'=>'Personal'], null, ['class'=>'form-control', 'id'=>'tipo']) !!}
  </div>

  <div class="col-md-2">
    <label for="combustible" > <b><i>Combustible</i></b> </label>
    {!! Form::select('combustible', ['3.74'=>'Gasolina Especial 3,74 Bs/L', '3.72'=>'Diesel Oil 3,72 Bs/L'], null, ['class'=>'form-control', 'placeholder'=>'todo', 'id'=>'combustible']) !!}
  </div>

  <div class="col-md-2">
    <label for="usuario" > <b><i>Usuario</i></b> </label>
    {!! Form::select('usuario', \App\User::pluck('email', 'id'), null, ['class'=>'form-control', 'placeholder'=>'todo', 'id'=>'usuario']) !!}
  </div>

</div>
<div class="row">
  <div class="col-md-12">
    <label for="id_proyecto" > <b><i>Proyecto</i></b> </label>
    {!! Form::text('id_proyecto', 'todo', ['class'=>'form-control', 'list'=>'lista-proyecto', 'id'=>'id_proyecto']) !!}
    <datalist id="lista-proyecto">
      @foreach($proyectos as $proyecto)
        <option value="{{ $proyecto->id }}|{{ $proyecto->apertura }} | {{ $proyecto->actividad }} | {{ number_format($proyecto->total, 2, ",", ".") }} Bs.">
      @endforeach
    </datalist>
  </div>
</div>
<br><br>
<div class="row">
  <div class="col-md-6">
    <button type="submit" name="btn" value="pdf" class="btn btn-danger"> <i class="fa fa-download"></i> Reporte Generado en PDF</button>
  </div>
  <div class="col-md-6">
    <button type="submit" name="btn"  value="doc" class="btn btn-primary"> <i class="fa fa-file-text"></i> Reporte Generado en WORD</button>
  </div>
</div>
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 4, 'desc']],
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

  $('.eliminar').click(function(event) {
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
  });
</script>
@endsection
