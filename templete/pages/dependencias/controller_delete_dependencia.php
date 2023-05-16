<?php
    include('../../../config/config.php');

    //RECEPCION DE VARIABLES
    $id_dependencia=$_POST['id_dependencia'];

    $query_delete = $pdo->prepare("DELETE FROM Dependencia WHERE id_dependencia= :id_dependencia");
    $query_delete->bindParam(':id_dependencia', $id_dependencia);
    
    if($query_delete->execute()){
        echo "<script>alert('LA DEPENDENCIA SE ELIMINO CORRECTAMENTE');</script>";
        header('Location: '.$URL.'/templete/pages/dependencias/index.php');
    }else{
        echo "<script>alert('LA DEPENDENCIA NO SE PUDO ELIMINAR');</script>";
    }
?>