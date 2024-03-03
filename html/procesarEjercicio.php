<?php
include "../db/crear_tablas.php";

//conseguir id ejercicio y numero de pregunta desde ajax
if (isset($_POST["id_eje"])) {
    $id_eje = $_POST["id_eje"];

    $select = "SELECT p.pregunta AS pre, p.seleccionA AS a,p.seleccionB AS b,p.seleccionC AS c 
    FROM pregunta p 
    INNER JOIN ejercicio eje ON eje.id=p.id_ejercicio 
    WHERE p.id_ejercicio= $id_eje";
    
    $resulta = mysqli_query($conexion, $select);
    //es que tenemos 3 preguntas de cada ejercicio,necesito un array para poner cada uno a su pagina
    $data = array();
    while ($pregunta = $resulta->fetch_assoc()) {
        $html= "<h3>" . htmlspecialchars($pregunta['pre']) . "</h3>
                           <p><input type='radio' name='{$pregunta['pre']}' value='" . htmlspecialchars($pregunta['a']) . "'>" . htmlspecialchars($pregunta['a']) . "</p>
                           <p><input type='radio' name='{$pregunta['pre']}' value='" . htmlspecialchars($pregunta['b']) . "'>" . htmlspecialchars($pregunta['b']) . "</p>
                           <p><input type='radio' name='{$pregunta['pre']}' value='" . htmlspecialchars($pregunta['c']) . "'>" . htmlspecialchars($pregunta['c']) . "</p>";
        array_push($data,$html);
    }
}

header('Content-Type: application/json');
echo json_encode($data);
?>
