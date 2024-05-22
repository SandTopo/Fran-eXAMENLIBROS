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

// Recuperar datos del formulario
$nombre_libro = $_POST['nombre_libro'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$nuevo_autor = $_POST['nuevo_autor'];

// Actualizar el libro en la base de datos
$sql = "UPDATE libro SET titulo='$titulo', publicacion='$fecha', id_autor='$nuevo_autor' WHERE titulo='$nombre_libro'";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit;
} else {
    echo "Error al actualizar el libro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>