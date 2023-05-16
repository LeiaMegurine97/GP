<?php
    include('../../../config/config.php');
    
    //RECEPCIÓN DE VARIABLES
    $nombre=strtoupper($_POST['nombre_rama']);    
    $estado=$_POST['estado_rama'];

    $nombre_BD="";
    $query_create = $pdo->prepare("SELECT * FROM Rama WHERE rama = :rama");
    $query_create->bindParam(':rama', $nombre);
    $query_create->execute();
    $resultados = $query_create->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resultados as $rama){
        $nombre_BD=$rama['rama'];
    }
    if($nombre_BD==$nombre){
        $response = array(
            "title" => "OCURRIO UN PROBLEMA",
            "text" => "LA RAMA YA SE ENCUENTRA REGISTRADA EN LA BASE DE DATOS",
            "icon" => "warning"
        );
        exit;
    }else{
        $sentencia = $pdo ->prepare ('INSERT INTO Rama (rama, est_rama) VALUES (:rama, :est_rama)');
        
        /*ASIGNACION DE VARIABLES A PARAMETROS*/
        $sentencia->bindParam(':rama',$nombre);
        $sentencia->bindParam(':est_rama',$estado);
        
        if($sentencia->execute()){   
            $response = array(
                "title" => "REGISTRO EXITOSO",
                "text" => "La rama se registro correctamente",
                "icon" => "success"
            );
        }else{
            $response = array(
                "title" => "OCURRIO UN PROBLEMA",
                "text" => "No se pudo agregar la Rama a la BD",
                "icon" => "error"
            );
        }
    }
    echo json_encode($response);
?>
