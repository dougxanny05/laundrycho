<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Lavandería</title>
</head>

<body>

  <!--NAVAR-->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">ADMINISTRADOR</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="menu.php">Home</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="bd/logout.php">Cerrar sesion</a>
    </li>
  </ul>
</nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <h4 class="text-center">Bienvenido a TU LAVANDERÍA</h4>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i>Agregar Nueva Cita
            </a>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="pdf.php" target="_blank" class="btn btn-success btn-block">
              <i class="fas fa-print"></i>Imprimir
            </a>
          </div>
          <br><br><br>
          <table class="table table-striped">
            <thead class="bg-secondary text-white">
              <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Fecha</th>
                <th>Tipo de Servicio</th>
                <th>Total a pagar:</th>
                <th>View</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $sql = "SELECT cliente.id_venta, cliente.nombres, cliente.correo, cliente.fecha, 
              cliente.tipo_servicio, servicios.id_servicios FROM cliente INNER JOIN servicios ON cliente.tipo_servicio = servicios.tipo";
              $result = mysqli_query($conn, $sql);

              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <tr>
                    <td><?php echo $row['id_venta']; ?></td>
                    <td><?php echo $row['nombres']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['tipo_servicio']; ?></td>
                    <td><?php echo $row['id_servicios']; ?></td>
                    <td>
                      <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i> View </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i> Update </button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i> Delete </button>
                    </td>
                  </tr>
              <?php
                }
              } else {
                echo "<script> alert('No Record Found');</script>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- INSERT REGIS -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Añadir nueva cita</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insert.php" method="POST">
            <div class="form-group">
              <label for="title">ID</label>
              <input type="text" name="idventa" class="form-control" placeholder="Ingrese ID" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">Nombres</label>
              <input type="text" name="nombres" class="form-control" placeholder="Ingrese sus nombres" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">Correo</label>
              <input type="text" name="correo" class="form-control" placeholder="Ingrese su correo" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="fecha">Fecha de la Cita:</label>
              <input name="fecha" type="date" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="title">Tipo de servicio</label>
              <input type="number" name="tiposervicio" min="1" max="3" class="form-control" placeholder="1-Lavado completo, 2-Semi lavado, 3-Lavado Rapido" maxlength="3" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="datos">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- VIEW MODAL -->
    <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">Ficha de la cita</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>ID:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewId"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Nombres:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewNombre"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Correo:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewCorreo"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Fecha:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewFecha"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Tipo de Servicio:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewServicio"></div>
            </div>        
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- EDITAR REGIS -->
  <form action="update.php" method="POST">
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Editar Cita:</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="title">ID</label>
              <input type="text" name="updateId" id="updateId" class="form-control" placeholder="Ingrese su ID" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">Nombres:</label>
              <input type="text" name="updateNombres" id="updateNombres" class="form-control" placeholder="Ingrese sus nombres" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">Correo:</label>
              <input type="text" name="updateCorreo" id="updateCorreo" class="form-control" placeholder="Correo" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="fecha">Fecha de la Cita:</label>
              <input id="insertFecha" name="updateFecha" id="updateFecha" type="date" class="form-control" required="required">
            </div>
            <div class="form-group">
              <label for="title">Tipo de servicio</label>
              <input type="number" name="updateTipo" id="updateTipo" class="form-control" min="1" max="3" maxlength="50" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="update">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ELIMINAR REGIS -->
  <form action="delete.php" method="POST">
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Estas seguro que quieres eliminar este registro?</h4>

          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="delete">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    $(document).ready(function() {
      $('.updateBtn').on('click', function() {

        $('#updateModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#updateId').val(data[0]);
        $('#updateNombres').val(data[1]);
        $('#updateCorreo').val(data[2]);
        $('#updateFecha').val(data[3]);
        $('#updateTipo').val(data[4]);
      });

    });
  </script>

  <script>
    $(document).ready(function() {
      $('.viewBtn').on('click', function() {

        $('#viewModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#viewId').text(data[0]);
        $('#viewNombre').text(data[1]);
        $('#viewCorreo').text(data[2]);
        $('#viewFecha').text(data[3]);
        $('#viewServicio').text(data[4]);
      });

    });
  </script>

  <script>
    $(document).ready(function() {
      $('.deleteBtn').on('click', function() {

        $('#deleteModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

      });

    });
  </script>
</body>

</html>