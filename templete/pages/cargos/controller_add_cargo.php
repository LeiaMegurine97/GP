<?php
    include('../../../config/config.php');
    
    //RECEPCIÓN DE VARIABLES
    $nombre=$_POST['nombre_cargo'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_cargo'];

    $nombre_BD="";
    $query_create = $pdo->prepare("SELECT * FROM Cargo WHERE cargo = :cargo");
    $query_create->bindParam(':cargo', $nombre);
    $query_create->execute();
    $resultados = $query_create->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resultados as $cargo){
        $nombre_BD=$cargo['cargo'];
    }
    if($nombre_BD==$nombre){
        echo "<script>alert('LA CARGO YA SE ENCUENTRA REGISTRADA EN LA BASE DE DATOS');</script>";
        header('Location: '.$URL.'/templete/pages/cargos/index.php');
        exit;

    }else{
        $sentencia = $pdo ->prepare ('INSERT INTO Cargo (cargo, est_car) VALUES (:cargo, :est_car)');
        
        /*ASIGNACION DE VARIABLES A PARAMETROS*/
        $sentencia->bindParam(':cargo',$nombre);
        $sentencia->bindParam(':est_car',$estado);
        
        if($sentencia->execute()){
            header('Location: '.$URL.'/templete/pages/cargos/index.php');
            exit;
        }else{
            echo "<script>alet('No se pudo agregar la Cargo a la BD')</script>";
            exit;
        }
    }
?>
