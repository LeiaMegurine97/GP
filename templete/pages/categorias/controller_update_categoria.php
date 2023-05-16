<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_categoria=$_POST['id_categoria'];
    $nombre=$_POST['nombre_categoria'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_categoria'];

    $query_create = $pdo->prepare("UPDATE Categoria SET categoria=:categoria, est_cat=:est_cat WHERE id_categoria= :id_categoria");
    $query_create->bindParam(':id_categoria', $id_categoria);
    $query_create->bindParam(':categoria', $nombre);
    $query_create->bindParam(':est_cat', $estado);
    
    
    if($query_create->execute()){
        echo "<script>alert('LA CATEGORÍA SE ACTUALIZO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/categorias/index.php');
        exit;
    }else{
        echo "<script>alert('LA CATEGORÍA NO SE PUDO ACTUALIZAR');</script>";
        exit;
    }
?>