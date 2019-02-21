<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Reporte_'.date('Y_m_d_h_i_s').'.xls');

?>
<table width="100%" border="0">
  <tr>
    <td> <h2> Gobierno Autónomo Municipal de Potosí </h2>
    </td>
  </tr>
  <tr>
    <td> Reporte desde  el {{ date('d-m-Y', strtotime($inicio)) }} hasta el {{ date('d-m-Y', strtotime($fin)) }}</td>
  </tr>
  <tr>
    <td style="font-size:10px;"> Fecha de generacion del reporte : <?php echo date('Y-m-d'); ?> </td>
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
  <tbody><?php $nr = 1; $litrosTotal = $sumaTotal = 0; ?>
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
      </tr><?php $nr = $nr + 1;  $litrosTotal = $litrosTotal + $dato->litros; $sumaTotal = $sumaTotal + $dato->monto; ?>
    @endforeach
    <tr>
      <td colspan="6"> <b>Total:</b> </td>
      <td > <b> {{$litrosTotal}} L. </b> </td>
      <td > <b> {{$sumaTotal}} Bs. </b> </td>
    </tr>
  </tbody>
</table>
