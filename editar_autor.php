<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "libros";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar el ID del autor y los nuevos datos del formulario
$id_autor = $_POST['id_autor'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];

// Actualizar los detalles del autor en la base de datos
$sql = "UPDATE autor SET nombre='$nombre', apellidos='$apellidos' WHERE id=$id_autor";

if ($conn->query($sql) === TRUE) {
    echo "Autor actualizado correctamente";
} else {
    echo "Error al actualizar el autor: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>