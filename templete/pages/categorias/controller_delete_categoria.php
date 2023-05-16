<?php
include('../../../config/config.php');

//RECEPCION DE VARIABLES
$id_categoria=$_POST['id_categoria'];

$query_delete = $pdo->prepare("DELETE FROM Categoria WHERE id_categoria= :id_categoria");
$query_delete->bindParam(':id_categoria', $id_categoria);

if($query_delete->execute()){
    $response = array(
        "title" => "ELIMINACIÓN EXITOSA",
        "text" => "LA CATEGORÍA SE ELIMINO CORRECTAMENTE",
        "icon" => "success"
    );
} else {
    $response = array(
        "title" => "ERROR!",
        "text" => "LA CATEGORÍA NO SE PUDO ELIMINAR",
        "icon" => "error"
    );
}
echo json_encode($response);
?>
