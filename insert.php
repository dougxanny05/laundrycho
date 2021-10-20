<?php
    include('connection.php');
    if(ISSET($_POST['datos']))
    {
        $id = $_POST['idventa'];
        $nombres = $_POST['nombres'];
        $correo = $_POST['correo'];
        $fecha = $_POST['fecha'];
        $servicio = $_POST['tiposervicio'];

        $sql = "INSERT INTO `cliente` (`id_venta`, `nombres`, `correo`, `fecha`, `tipo_servicio`) VALUES ('$id', '$nombres', '$correo', '$fecha', '$servicio')";       
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script> alert("Datos insertados"); </script>';
            header('Location: menu.php');
        }else{
            echo '<script> alert("No se insertaron los datos"); </script>';
        }
    }
?>