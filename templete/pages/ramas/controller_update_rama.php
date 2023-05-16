<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_rama=$_POST['id_rama'];
    $nombre=$_POST['nombre_rama'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_rama'];

    $query_create = $pdo->prepare("UPDATE Rama SET rama= :rama, est_rama=:est_rama WHERE id_rama= :id_rama");
    $query_create->bindParam(':id_rama', $id_rama);
    $query_create->bindParam(':rama', $nombre);
    $query_create->bindParam(':est_rama', $estado);
    
    
    if($query_create->execute()){
        $response = array(
            "title" => "ACTUALIZACIÓN EXITOSA",
            "text" => "La rama se actualizo correctamente",
            "icon" => "success"
        );
    }else{
        $response = array(
            "title" => "OCURRIO UN ERROR!",
            "text" => "La rama no se pudo actualizar",
            "icon" => "error"
        );
    }
    echo json_encode($response);
?>