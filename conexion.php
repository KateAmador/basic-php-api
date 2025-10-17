<?php
function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "api";

    $conn = mysqli_connect($host, $user, $pass, $db);
    return $conn;

    if($conn->connect_errno){
        die("Fallo la conexion: " . $conn->connect_errno);
    }
}
?>