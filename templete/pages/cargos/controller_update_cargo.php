<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_cargo=$_POST['id_cargo'];
    $nombre=$_POST['nombre_cargo'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_cargo'];

    $query_create = $pdo->prepare("UPDATE Cargo SET cargo= :cargo, est_car=:est_car WHERE id_cargo= :id_cargo");
    $query_create->bindParam(':id_cargo', $id_cargo);
    $query_create->bindParam(':cargo', $nombre);
    $query_create->bindParam(':est_car', $estado);
    
    
    if($query_create->execute()){
        echo "<script>alert('EL CARGO SE ACTUALIZO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/cargos/index.php');
        exit;
    }else{
        echo "<script>alert('EL CARGO NO SE PUDO ACTUALIZAR');</script>";
        exit;
    }
?>