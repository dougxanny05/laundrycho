<?php

// Insert the content of connection.php file
require_once 'connection.php';

use Dompdf\Dompdf;

?>

<head>
  <html lang="en">
  <meta charset="UTF-8">
  <title>Lavandería</title>

  <img src="images/egm.jpg" width="100" height="90">

  <head>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;

      }

      td,
      th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      tr:nth-child(even) {
        background-color: #dddddd;
      }

      td.a {
        text-align: right;
        font-weight: bold;
      }
    </style>
  </head>

<body>

  <table width='100%'>
    <tr>
      <th>FACTURAS:</th>
    </tr>
  </table>
  <table width='100%'>
    <tr>
      <th>ID</th>
      <th>Nombres</th>
      <th>Correo</th>
      <th>Fecha</th>
      <th>Tipo de Servicio</th>
      <th>Total a pagar:</th>
    </tr>
    <?php
    $sql = "SELECT cliente.id_venta, cliente.nombres, cliente.correo, cliente.fecha, 
    cliente.tipo_servicio, servicios.id_servicios FROM cliente INNER JOIN servicios ON cliente.tipo_servicio = servicios.tipo";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($result)) {
    ?>
      <tr>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
      </tr>
    <?php

    }
    ?>
  </table>