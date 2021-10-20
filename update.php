<?php

// Insert the content of connection.php file
include('connection.php');

// Update data into the database
if (isset($_POST['update'])) {
    $id = $_POST['updateId'];
    $nombres = $_POST['updateNombres'];
    $correo = $_POST['updateCorreo'];
    $fecha = $_POST['updateFecha'];
    $tipo_servicio = $_POST['updateTipo'];
    $sql = "UPDATE cliente SET     nombres ='$nombres', 
                                    correo ='$correo',
                                    fecha =' $fecha',
                                    tipo_servicio = '$tipo_servicio'
                                        WHERE id_venta ='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script> alert("Datos actualizados."); </script>';
        header("Location:menu.php");
    } else {
        echo '<script> alert("Los datos no se pudieron actualizar"); </script>';
    }
}
