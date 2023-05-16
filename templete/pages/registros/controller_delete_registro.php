<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_deporte=$_POST['id_deporte'];

    $query_delete = $pdo->prepare("DELETE FROM Deporte WHERE id_deporte= :id_deporte");
    $query_delete->bindParam(':id_deporte', $id_deporte);
    
    if($query_delete->execute()){
        echo "<script>alert('EL DEPORTE SE ELIMINO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/deportes/index.php');
        exit;
    }else{
        echo "<script>alert('EL DEPORTE NO SE PUDO ELIMINAR');</script>";
        exit;
    }
?>