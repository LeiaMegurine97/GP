<?php
    define ('SERVIDOR','KURONEKO');
    define ('USUARIO','sa');
    define ('PASSWORD','12345');
    define ('BD','GarzasPlata');

    $URL ='http://localhost/GP';

    $servidor = "sqlsrv:Server=".SERVIDOR.";Database=".BD;
    try{
        $pdo= new PDO ($servidor, USUARIO, PASSWORD);
        //echo "<script>alert('La conexión a la base de datos fue exitosa.')</script>";
    }
    catch(PDOException $e){
        echo "<script>alert('Error a la conexión con la base de datos.')</script>";
    }
?>