<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "libros";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];


$sql = "INSERT INTO autor (nombre, apellidos) VALUES ('$nombre', '$apellidos')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit;
} else {
    echo "Error al registrar el autor: " . $conn->error;
}


$conn->close();
?>