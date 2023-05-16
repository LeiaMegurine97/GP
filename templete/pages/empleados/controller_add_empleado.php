<?php
    include('../../../config/config.php');
    
    //RECEPCIÓN DE VARIABLES
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

    $nombre_BD="";
    $noEmpleado_BD="";
    $apPaterno_BD="";
    $apMaterno_BD="";
    $query_create = $pdo->prepare("SELECT * FROM Empleado WHERE (no_empleado=:no_empleado) AND (nom_emp= :nom_emp) AND (appat_emp= :appat_emp) AND (apmat_emp= :apmat_emp) ");
    $query_create->bindParam(':no_empleado', $noEmpleado);
    $query_create->bindParam(':nom_emp',$nombre);
    $query_create->bindParam(':appat_emp',$apPaterno);
    $query_create->bindParam(':apmat_emp',$apMaterno);
    $query_create->execute();
    $resultados = $query_create->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resultados as $empleado){
        $noEmpleado_BD=$empleado['no_empleado'];
        $nombre_BD=$empleado['nom_emp'];
        $apPaterno_BD=$empleado['appat_emp'];
        $apMaterno_BD=$empleado['apmat_emp'];
    }
    if(($noEmpleado_BD==$noEmpleado)&&($nombre_BD==$nombre)&&($apPaterno_BD==$apPaterno)&&($apMaterno_BD==$apMaterno)){
        echo "<script>alert('EL EMPLEADO YA SE ENCUENTRA REGISTRADA EN LA BASE DE DATOS');</script>";
        header('Location: '.$URL.'/templete/pages/empleados/index.php');
        exit;

    }else{
        $sentencia = $pdo ->prepare ('INSERT INTO Empleado (id_cargo, id_dependencia, no_empleado, nom_emp, appat_emp, apmat_emp, sexo_emp, nip, est_emp) VALUES (:id_cargo, :id_dependencia, :no_empleado, :nom_emp, :appat_emp, :apmat_emp, :sexo_emp, :nip, :est_emp)');
        
        /*ASIGNACION DE VARIABLES A PARAMETROS*/
        $sentencia->bindParam(':id_cargo',$cargo);
        $sentencia->bindParam(':id_dependencia',$dependencia);
        $sentencia->bindParam(':no_empleado',$noEmpleado);
        $sentencia->bindParam(':nom_emp',$nombre);
        $sentencia->bindParam(':appat_emp',$apPaterno);
        $sentencia->bindParam(':apmat_emp',$apMaterno);
        $sentencia->bindParam(':sexo_emp',$sexo);
        $sentencia->bindParam(':nip',$nip);
        $sentencia->bindParam(':est_emp',$estado);
        
        if($sentencia->execute()){
            header('Location: '.$URL.'/templete/pages/empleados/index.php');
            exit;
        }else{
            echo "<script>alet('No se pudo agregar EL EMPLEADO a la BD')</script>";
            exit;
        }
    }
?>
