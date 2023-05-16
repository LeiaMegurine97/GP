<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_empleado=$_POST['id_empleado'];

    $query_delete = $pdo->prepare("DELETE FROM Empleado WHERE id_empleado= :id_empleado");
    $query_delete->bindParam(':id_empleado', $id_empleado);
    
    if($query_delete->execute()){
        echo "<script>alert('EL EMPLEADO SE ELIMINO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/empleados/index.php');
        exit;
    }else{
        echo "<script>alert('EL EMPLEADO NO SE PUDO ELIMINAR');</script>";
        exit;
    }
?>