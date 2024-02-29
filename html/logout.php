<?php
// Iniciar la sesión si aún no está iniciada
if (!session_id()) session_start();

// Destruir todas las variables de sesión.
$_SESSION = array();

// Si se desea destruir completamente la sesión, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión y no solo los datos de sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión.
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página
header("Location: index.php");
exit();
