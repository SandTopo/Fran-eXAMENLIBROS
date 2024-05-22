<!DOCTYPE html>
<html>
<head>
    <title>Borrar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Borrar Libro</h2>
    <form action="" method="post">
        <label for="id_libro">Selecciona el libro:</label>
        <select id="id_libro" name="id_libro" required>
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

            // Consulta para obtener la lista de libros
            $sql = "SELECT id, titulo FROM libro";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada libro como una opción en el menú desplegable
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["titulo"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay libros disponibles</option>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </select><br><br>
        
        <input type="submit" value="Borrar Libro">
    </form>

    <?php
    // Borrar el libro seleccionado si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_libro'])) {
        // Conectar a la base de datos
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $id_libro = $_POST['id_libro'];

        // Borrar el libro de la base de datos
        $sql = "DELETE FROM libro WHERE id = $id_libro";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error al borrar el libro: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>