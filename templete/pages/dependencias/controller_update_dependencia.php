<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_dependencia=$_POST['id_dependencia'];
    $nombre=$_POST['nombre_dependencia'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_dependencia'];

    $query_create = $pdo->prepare("UPDATE Dependencia SET dependencia=:dependencia, est_dep=:est_dep WHERE id_dependencia= :id_dependencia");
    $query_create->bindParam(':id_dependencia', $id_dependencia);
    $query_create->bindParam(':dependencia', $nombre);
    $query_create->bindParam(':est_dep', $estado);
    
    
    if($query_create->execute()){
        echo "<script>alert('LA DEPENDENCIA SE ACTUALIZO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/dependencias/index.php');
    }else{
        echo "<script>alert('LA DEPENDENCIA NO SE PUDO ACTUALIZAR');</script>";
    }
?>