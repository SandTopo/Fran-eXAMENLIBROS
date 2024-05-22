<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Autores y Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestión de Autores y Libros</h1>

    <h2>Agregar autor</h2>
    <form action="agregarAutor.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>
        <input type="submit" value="Registrar">
    </form>

    <h2>Agregar libro</h2>
    <form action="agregarLibro.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        <label for="publicacion">Fecha de publicación:</label>
        <input type="date" id="publicacion" name="publicacion" required><br><br>
        <label for="autor">Autor:</label>
        <select id="autor" name="autor" required>
        <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "1234";
            $database = "libros";

            $conn = new mysqli($servername, $username, $password, $database);

            
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            
            $sql = "SELECT id, nombre, apellidos FROM autor";
            $result = $conn->query($sql);

            
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . " " . $row['apellidos'] . "</option>";
            }

            
            $conn->close();
            ?>
        </select><br><br>
        <input type="submit" value="Registrar">
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>