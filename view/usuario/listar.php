<!DOCTYPE html>
<html>
<head>
    <title>Listar Usuarios</title>
    <link rel="stylesheet" href="../../css/sileListar.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table>
        <tr>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Género</th>
            <th>Email</th>
        </tr>
        <?php
        // Incluir el archivo de conexión
        include '../../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';

        // Consultar los registros de la tabla "Usuarios"
        $sql = "SELECT * FROM Usuarios";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Imprimir cada registro en una fila de la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["cc"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["apellido"] . "</td>";
                echo "<td>" . $row["genero"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            // Si no hay registros, mostrar un mensaje
            echo "<tr><td colspan='5'>No hay usuarios registrados</td></tr>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </table>
</body>
</html