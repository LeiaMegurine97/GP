<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_cargo=$_POST['id_cargo'];

    $query_delete = $pdo->prepare("DELETE FROM Cargo WHERE id_cargo= :id_cargo");
    $query_delete->bindParam(':id_cargo', $id_cargo);
    
    if($query_delete->execute()){
        echo "<script>alert('EL CARGO SE ELIMINO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/cargos/index.php');
        exit;
    }else{
        echo "<script>alert('EL CARGO NO SE PUDO ELIMINAR');</script>";
        exit;
    }
?>