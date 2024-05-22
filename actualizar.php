<!DOCTYPE html>
<html>
<head>
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Editar Libro</h2>
    <form action="editar_libro.php" method="post">
        <label for="nombre_libro">Nombre del Libro:</label>
        <input type="text" id="nombre_libro" name="nombre_libro" required><br><br>
        <label for="titulo">Nuevo Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>
        <label for="fecha">Nueva Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>
        <label for="nuevo_autor">Nuevo Autor:</label>
        <select id="nuevo_autor" name="nuevo_autor" required>
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

            // Consulta para obtener la lista de autores
            $sql = "SELECT id, nombre, apellidos FROM autor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada autor como una opción en el menú desplegable
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . " " . $row['apellidos'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay autores disponibles</option>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Editar Libro">
    </form>
    <h2>Editar Autor</h2>
    <form action="editar_autor.php" method="post">
        <label for="id_autor">Seleccione el autor a editar:</label>
        <select id="id_autor" name="id_autor" required>
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

            // Consulta para obtener la lista de autores
            $sql = "SELECT id, nombre, apellidos FROM autor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada autor como una opción en el menú desplegable
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . " " . $row["apellidos"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay autores disponibles</option>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select><br><br>
        
        <label for="nombre">Nuevo Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="apellidos">Nuevos Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br><br>
        
        <input type="submit" value="Editar Autor">
    </form>
</body>
</html>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>