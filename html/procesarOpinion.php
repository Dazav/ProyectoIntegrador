<?php
include "../db/crear_tablas.php";
session_start();
if (isset($_SESSION["id"])) {
    # code...
    $id=$_SESSION["id"];
}
if (isset($_POST['numStar'])) {
    var_dump($_POST['numStar']);
}
var_dump($_POST['titulo']);
?>