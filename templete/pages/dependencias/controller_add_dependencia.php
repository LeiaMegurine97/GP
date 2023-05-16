<?php
    include('../../../config/config.php');
    
    //RECEPCIÓN DE VARIABLES
    $nombre=$_POST['nombre_dependencia'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_dependencia'];

    $nombre_BD="";
    $query_create = $pdo->prepare("SELECT * FROM Dependencia WHERE dependencia = :dependencia");
    $query_create->bindParam(':dependencia', $nombre);
    $query_create->execute();
    $resultados = $query_create->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resultados as $dependencia){
        $nombre_BD=$dependencia['dependencia'];
    }
    if($nombre_BD==$nombre){
        echo "<script>alert('LA DEPENDENCIA YA SE ENCUENTRA REGISTRADA EN LA BASE DE DATOS');</script>";
        header('Location: '.$URL.'/templete/pages/dependencias/index.php');
        exit;
    }else{
        $sentencia = $pdo ->prepare ('INSERT INTO Dependencia (dependencia, est_dep) VALUES (:dependencia, :est_dep)');
        
        /*ASIGNACION DE VARIABLES A PARAMETROS*/
        $sentencia->bindParam(':dependencia',$nombre);
        $sentencia->bindParam(':est_dep',$estado);
        
        if($sentencia->execute()){
            header('Location: '.$URL.'/templete/pages/dependencias/index.php');
            exit;
        }else{
            echo "<script>alet('No se pudo agregar la Dependencia a la BD')</script>";
            exit;
        }
    }
?>
