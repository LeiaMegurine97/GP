<?php
    include('../../../config/config.php');
    
    //RECEPCION DE VARIABLES
    $id_rama=$_POST['id_rama'];

    $query_delete = $pdo->prepare("DELETE FROM Rama WHERE id_rama= :id_rama");
    $query_delete->bindParam(':id_rama', $id_rama);
    
    if($query_delete->execute()){
        $response = array(
            "title" => "ELIMINACIÓN EXITOSA",
            "text" => "LA RAMA SE ELIMINO CORRECTAMENTE",
            "icon" => "success"
        );        
    }else{
        $response = array(
            "title" => "ERROR!",
            "text" => "NO SE PUDO ELIMINAR LA RAMA",
            "icon" => "error"
        );        
    }
    echo json_encode($response);
?>