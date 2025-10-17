<?php
require_once "conexion.php";
$con = conectar();

function consultar($con, $id)
{
    $sql = ($id===null) ? "SELECT * FROM usuarios" : "SELECT * FROM usuarios WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $datos = array();
        while ($row = $result->fetch_assoc()) {
            $datos[] = $row;
        }
        echo json_encode($datos);
        mysqli_free_result($result);
    } else {
        echo json_encode(["error" => "Error en la consulta"]);
    }
}

function insertar($con)
{
    $dato = json_decode(file_get_contents("php://input"), true);
    $nombre = $dato["nombre"];

    $sql = "INSERT INTO usuarios (nombre) VALUES ('$nombre')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $dato["id"] = $con->insert_id;
        echo json_encode($dato);
        mysqli_free_result($result);
    } else {
        echo json_encode(array("error" => "Error al insertar el usuario"));
    }
}

function eliminar($con, $id)
{
    $sql = "DELETE FROM usuarios WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo json_encode(array("mensaje" => "Usuario eliminado"));
        mysqli_free_result($result);
    } else {
        echo json_encode(array("error" => "Error al eliminar el usuario"));
    }
}

function actualizar($con, $id){
    $dato = json_decode(file_get_contents("php://input"), true);
    $nombre = $dato["nombre"];

    $sql = "UPDATE usuarios SET nombre = '$nombre' WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo json_encode(array("mensaje" => "Usuario actualizado"));
        mysqli_free_result($result);
    } else {
        echo json_encode(array("error" => "Error al actualizar el usuario"));
    }
}
?>