<?php
include('../../../config/config.php');

// Verificar si el índice 'id_deporte' está presente en el array $_POST
if(isset($_POST['id_deporte'])) {
    // Obtener el valor seleccionado del elemento id_deporte enviado por la solicitud AJAX
    $idDeporte = $_POST['id_deporte'];

    // Realizar la consulta en la base de datos para buscar el mínimo y máximo de jugadores
    $query_deportes = $pdo->prepare("SELECT minjug_depo, maxjug_depo FROM Deporte WHERE id_deporte = :id_deporte");
    $query_deportes->bindParam(':id_deporte', $idDeporte);
    $query_deportes->execute();
    $deportes = $query_deportes->fetchAll(PDO::FETCH_ASSOC);
    foreach($deportes as $deporte) {
        // Obtener los valores mínimo y máximo de jugadores
        $minJugadores = $deporte['minjug_depo'];
        $maxJugadores = $deporte['maxjug_depo'];
    }

    // devolver el HTML generado
    echo "<script>
            $('#dinamic').attr('data-min', '$minJugadores').attr('data-max', '$maxJugadores'); 
        </script>";
} else {
    // Si el índice 'id_deporte' no está presente en el array $_POST, mostrar un mensaje de error o realizar alguna acción adecuada
    echo "Error: 'id_deporte' no se recibió en la solicitud AJAX.";
}
?>
