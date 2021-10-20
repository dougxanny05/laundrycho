<?php
    include('connection.php');
    if(ISSET($_POST['delete']))
    {
        $id = $_POST['deleteId']; 

        $sql = "DELETE FROM cliente WHERE id_venta='$id'";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo '<script> alert("Datos eliminados."); </script>';
            header('Location:menu.php');
        }else{
            echo '<script> alert("Los datos no se pudieron eliminar."); </script>';
        }
    }
?>