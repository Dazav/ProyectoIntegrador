<?php
include "../db/crear_tablas.php"; // Incluye el archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_cita'])) {
    $id_cita = $_POST['id_cita']; // Obtiene el ID de la cita a cancelar

    // Prepara la consulta para eliminar la cita de la base de datos
    $query_eliminar_cita = "DELETE FROM cita WHERE id = $id_cita";

    // Ejecuta la consulta
    if (mysqli_query($conexion, $query_eliminar_cita)) {
        // La consulta se ejecutó correctamente, puedes devolver una respuesta si es necesario
        echo "Cita cancelada correctamente";
    } else {
        // Maneja el error si la consulta no se ejecuta correctamente
        echo "Error al cancelar la cita: " . mysqli_error($conexion);
    }
} else {
    // Si no se reciben datos POST o el ID de la cita no está presente, devuelve un mensaje de error
    echo "No se recibieron datos válidos para cancelar la cita";
}
?>
