<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_empleado=$_POST['id_empleado'];
    $cargo=$_POST['cargo_empleado'];
    $dependencia=$_POST['dependencia_empleado'];
    $noEmpleado=$_POST['noEmpleado_empleado'];
    $nombre=$_POST['nombre_empleado'];
    $nombre=strtoupper($nombre);
    $apPaterno=$_POST['apPaterno_empleado'];
    $apPaterno=strtoupper($apPaterno);
    $apMaterno=$_POST['apMaterno_empleado'];
    $apMaterno=strtoupper($apMaterno);
    $sexo=$_POST['sexo_empleado'];
    $nip=$_POST['nip_empleado'];
    $estado=$_POST['estado_empleado'];

    $query_update = $pdo->prepare("UPDATE Empleado SET id_cargo=:id_cargo, id_dependencia=:id_dependencia, no_empleado=:no_empleado, nom_emp=:nom_emp, appat_emp=:appat_emp, apmat_emp=:apmat_emp, sexo_emp=:sexo_emp, nip=:nip, est_emp=:est_emp WHERE id_empleado=:id_empleado");
    $query_update->bindParam(':id_empleado', $id_empleado);
    $query_update->bindParam(':id_cargo',$cargo);
    $query_update->bindParam(':id_dependencia',$dependencia);
    $query_update->bindParam(':no_empleado',$noEmpleado);
    $query_update->bindParam(':nom_emp',$nombre);
    $query_update->bindParam(':appat_emp',$apPaterno);
    $query_update->bindParam(':apmat_emp',$apMaterno);
    $query_update->bindParam(':sexo_emp',$sexo);
    $query_update->bindParam(':nip',$nip);
    $query_update->bindParam(':est_emp',$estado);
    
    
    
    if($query_update->execute()){
        echo "<script>alert('EL USUARIO SE ACTUALIZO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/empleados/index.php');
        exit;
    }else{
        echo "<script>alert('EL USUARIO NO SE PUDO ACTUALIZAR');</script>";
        exit;
    }
?>