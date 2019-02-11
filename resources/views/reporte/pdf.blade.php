<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>G.A.M.P. <?php echo date('Y-m-d'); ?> - Reporte </title>
  </head>
  <body>
    <table width="100%" border="0">
      <tr>
        <td width="10%">
          <img src="{{asset('img/escudogmp.jpg')}}" alt="">
        </td>
        <td> <h2> Gobierno Autónomo Municipal de Potosí </h2>
        </td>
      </tr>
      <tr>
        <td colspan="2"> Reporte desde  el {{ date('d-m-Y', strtotime($inicio)) }} hasta el {{ date('d-m-Y', strtotime($fin)) }}</td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:10px;"> Fecha de generacion del reporte : <?php echo date('Y-m-d'); ?> </td>
      </tr>
    </table>

    <table width="100%" border="1">
      <thead>
        <tr>
          <th> Nro</th>
          <th> Apertura </th>
          <th> Actividad </th>
          <th> Distrito </th>
          <th> Tipo </th>
          <th> FFOF </th>
          <th> Litros </th>
          <th> Monto </th>
          <th> Usuario </th>
          <th> Unidad </th>
        </tr>
      </thead>
      <tbody><?php $nr = 1;?>
        @foreach($datos as $dato)
          <tr>
            <td> {{$nr}}</td>
            <td> {{ $dato->apertura }}  </td>
            <td> {{ $dato->actividad }} </td>
            <td> {{ $dato->distrito }}  </td>
            <td> {{ $dato->tipo }}      </td>
            <td> {{ $dato->ffof }}      </td>
            <td> {{ $dato->litros }}    </td>
            <td> {{ $dato->monto }} Bs. </td>
            <td> {{ $dato->name }}      </td>
            <td> {{ $dato->unidad }}    </td>
          </tr><?php $nr = $nr + 1; ?>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
