<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "libros";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>La biblioteca online</title>
</head>
<body>
    <h1>La biblioteca online</h1>

    <form action="agregar.php">
        <button type="submit">Agregar</button>
    </form>
    <form action="actualizar.php">
        <button type="submit">Editar</button>
    </form>
    <form action="borrarLibro.php">
        <button type="submit">borrar libro</button>
    </form>
    <form action="borrarAutor.php">
        <button type="submit">borrar autor</button>
    </form>

    <h2>Lista de Libros</h2>
    <table class="tabla" border="1">
        <tr>
            <th>Título</th>
            <th>Publicación</th>
            <th>Autor</th>
            
        </tr>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $database = "libros";

        $conn = new mysqli($servername, $username, $password, $database);

        
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        
        $sql = "SELECT libro.titulo, libro.publicacion, autor.nombre, autor.apellidos 
                FROM libro 
                INNER JOIN autor ON libro.id_autor = autor.id";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["titulo"] . "</td>";
                echo "<td>" . $row["publicacion"] . "</td>";
                echo "<td>" . $row["nombre"] . " " . $row["apellidos"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay libros registrados</td></tr>";
        }

        
        $conn->close();
        ?>
    </table>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>