<?php
    include('../../../config/config.php');
    
    //RECEPCIÓN DE VARIABLES
    $nombre=$_POST['nombre_categoria'];
    $nombre=strtoupper($nombre);
    $estado=$_POST['estado_categoria'];

    $nombre_BD="";
    $query_create = $pdo->prepare("SELECT * FROM Categoria WHERE categoria = :categoria");
    $query_create->bindParam(':categoria', $nombre);
    $query_create->execute();
    $resultados = $query_create->fetchAll (PDO:: FETCH_ASSOC);
    foreach($resultados as $categoria){
        $nombre_BD=$categoria['categoria'];
    }
    if($nombre_BD==$nombre){
        $response = array(
            "title" => "OCURRIO UN PROBLEMA",
            "text" => "LA CATEGORÍA YA SE ENCUENTRA REGISTRADA EN LA BASE DE DATOS",
            "icon" => "warning"
        );
        exit;

    }else{
        $sentencia = $pdo ->prepare ('INSERT INTO Categoria (categoria, est_cat) VALUES (:categoria, :est_cat)');
        
        /*ASIGNACION DE VARIABLES A PARAMETROS*/
        $sentencia->bindParam(':categoria',$nombre);
        $sentencia->bindParam(':est_cat',$estado);
        
        if($sentencia->execute()){
            $response = array(
                "title" => "REGISTRO EXITOSO",
                "text" => "La Categoría se agrego satisfactoriamente",
                "icon" => "success"
            );
        }else{
            $response = array(
                "title" => "ERROR!",
                "text" => "No se pudo agregar la Categoria a la BD",
                "icon" => "error"
            );
        }
    }
    echo json_encode($response);
?>
