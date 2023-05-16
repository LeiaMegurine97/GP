<?php
    include('../../../config/config.php');

    // realizar la consulta SQL
    $query_dependencias = $pdo->prepare("SELECT id_dependencia, dependencia FROM Dependencia ");
    $query_dependencias->execute();
    $resultados = $query_dependencias->fetchAll(PDO::FETCH_ASSOC);

    // generar el HTML de las opciones del select
    $dependencia_opciones = '<option selected="true" disabled="disabled" value="" >SELECCIONAR...</option>';
    foreach ($resultados as $dependencia) {
        $dependencia_opciones .= '<option value="'.$dependencia['id_dependencia'].'">'.$dependencia['dependencia'].'</option>';
    }

    // devolver el HTML generado
    echo $dependencia_opciones;
?>
