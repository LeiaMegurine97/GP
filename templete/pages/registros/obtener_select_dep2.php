<?php
    include('../../../config/config.php');

    // obtener los valores enviados por AJAX
    $id_rama = $_POST['id_rama'];
    $id_categoria = $_POST['id_categoria'];
    $tipo_deporte = $_POST['tipo_deporte'];

    // realizar la consulta SQL
    $query_deportes = $pdo->prepare("SELECT id_deporte, deporte FROM Deporte WHERE (id_rama =:id_rama) AND (id_categoria =:id_categoria) AND (tipo_depo =:tipo_depo) AND (est_depo=1)");
    $query_deportes->bindParam(':id_rama', $id_rama);
    $query_deportes->bindParam(':id_categoria', $id_categoria);
    $query_deportes->bindParam(':tipo_depo', $tipo_deporte);
    $query_deportes->execute();
    $resultados = $query_deportes->fetchAll(PDO::FETCH_ASSOC);

    // generar el HTML de las opciones del select
    $html_opciones = '<option selected="true" disabled="disabled" value=0 >SELECCIONAR...</option>';
    foreach ($resultados as $deporte) {
        $html_opciones .= '<option value="'.$deporte['id_deporte'].'">'.$deporte['deporte'].'</option>';
    }

    // devolver el HTML generado
    echo $html_opciones;
?>