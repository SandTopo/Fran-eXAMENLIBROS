<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$database = "libros";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$fecha = $_POST['publicacion'];
$autor_id = $_POST['autor'];


$sql = "INSERT INTO libro (titulo, publicacion, id_autor) VALUES ('$titulo', '$fecha', '$autor_id')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit;
} else {
    echo "Error al registrar el libro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>