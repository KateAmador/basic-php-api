<?php
require_once "conexion.php";
require_once "consultas.php";
$con = conectar();

header("Content-Type: application/json");
$metodo = $_SERVER["REQUEST_METHOD"];

$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($metodo) {
    case "GET":
        consultar($con, $id);
        break;
    case "POST":
        insertar($con);
        break;
    case "PUT":
        actualizar($con, $id);
        break;
    case "DELETE":
        eliminar($con, $id);
        break;
    default:
        echo "Metodo no soportado";
        break;
}
?>