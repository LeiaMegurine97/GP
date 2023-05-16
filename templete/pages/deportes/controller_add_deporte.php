<?php
    include('../../../config/config.php');
    
    //RECEPCIÓN DE VARIABLES
    $nombre=$_POST['nombre_deporte'];
    $nombre=strtoupper($nombre);
    $categoria=$_POST['categoria_deporte'];
    $rama=$_POST['rama_deporte'];
    $tipo=$_POST['tipo_deporte'];
    $minjugadores=$_POST['minjugadores_deporte'];
    $maxjugadores=$_POST['maxjugadores_deporte'];
    $estado=$_POST['estado_deporte'];

    $nombre_BD="";
    $query_create = $pdo->prepare("SELECT deporte, id_categoria, id_rama, tipo_depo FROM Deporte WHERE (deporte= :deporte) AND (id_categoria= :id_categoria) AND (id_rama= :id_rama) AND (tipo_depo= :tipo_depo)");
    $query_create->bindParam(':deporte', $nombre);
    $query_create->bindParam(':id_categoria',$categoria);
    $query_create->bindParam(':id_rama',$rama);
    $query_create->bindParam(':tipo_depo',$tipo);
    $query_create->execute();
    $resultados = $query_create->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resultados as $deporte){
        $nombre_BD=$deporte['deporte'];
    }
    if($nombre_BD==$nombre){
        echo "<script>alert('EL DEPORTE YA SE ENCUENTRA REGISTRADA EN LA BASE DE DATOS');</script>";
        header('Location: '.$URL.'/templete/pages/deportes/index.php');
        exit;

    }else{
        $sentencia = $pdo ->prepare ('INSERT INTO Deporte (id_categoria, id_rama, deporte, tipo_depo, minjug_depo, maxjug_depo, est_depo) VALUES (:id_categoria, :id_rama, :deporte, :tipo_depo, :minjug_depo, :maxjug_depo, :est_depo)');
        
        /*ASIGNACION DE VARIABLES A PARAMETROS*/
        $sentencia->bindParam(':id_categoria',$categoria);
        $sentencia->bindParam(':id_rama',$rama);
        $sentencia->bindParam(':deporte',$nombre);
        $sentencia->bindParam(':tipo_depo',$tipo);
        $sentencia->bindParam(':minjug_depo',$minjugadores);
        $sentencia->bindParam(':maxjug_depo',$maxjugadores);
        $sentencia->bindParam(':est_depo',$estado);
        
        if($sentencia->execute()){
            header('Location: '.$URL.'/templete/pages/deportes/index.php');
            exit;
        }else{
            echo "<script>alet('No se pudo agregar EL DEPORTE a la BD')</script>";
            exit;
        }
    }
?>
