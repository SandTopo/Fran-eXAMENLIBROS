<!DOCTYPE html>
<html>
<head>
    <title>Borrar Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Borrar Autor</h2>
    <form action="" method="post">
        <label for="id_autor">Selecciona el autor:</label>
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
            $sql = "SELECT id, nombre FROM autor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada autor como una opción en el menú desplegable
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay autores disponibles</option>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select><br><br>
        
        <input type="submit" value="Borrar Autor">
    </form>

    <?php
    // Borrar el autor seleccionado si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_autor'])) {
        // Conectar a la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $id_autor = $_POST['id_autor'];

        // Borrar el autor de la base de datos
        $sql = "DELETE FROM autor WHERE id = $id_autor";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error al borrar el autor: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>