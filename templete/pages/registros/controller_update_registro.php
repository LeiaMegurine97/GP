<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_deporte=$_POST['id_deporte'];
    $id_categoria=$_POST['categoria_deporte'];
    $id_rama=$_POST['rama_deporte'];
    $nombre=$_POST['nombre_deporte'];
    $nombre=strtoupper($nombre);
    $tipo=$_POST['tipo_deporte'];
    $jugadores=$_POST['jugadores_deporte'];
    $estado=$_POST['estado_deporte'];

    $query_update = $pdo->prepare("UPDATE Deporte SET id_categoria=:id_categoria, id_rama=:id_rama, deporte=:deporte, tipo_depo=:tipo_depo, nojug_depo=:nojug_depo, est_depo=:est_depo WHERE id_deporte=:id_deporte");
    $query_update->bindParam(':id_deporte', $id_deporte);
    $query_update->bindParam(':id_categoria', $id_categoria);
    $query_update->bindParam(':id_rama', $id_rama);
    $query_update->bindParam(':deporte', $nombre);
    $query_update->bindParam(':tipo_depo', $tipo);
    $query_update->bindParam(':nojug_depo', $jugadores);
    $query_update->bindParam(':est_depo', $estado);
    
    
    if($query_update->execute()){
        echo "<script>alert('EL DEPORTE SE ACTUALIZO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/deportes/index.php');
        exit;
    }else{
        echo "<script>alert('EL DEPORTE NO SE PUDO ACTUALIZAR');</script>";
        exit;
    }
    echo json_encode($response);
?>