<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../../css/styleLogin.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="post" action="login.php">
        <label for="cc">Cédula:</label>
        <input type="text" name="cc" required>
        <br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <?php
    // Incluir el archivo de conexión
    include '../../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $cc = $_POST['cc'];
        $pass = $_POST['pass'];

        // Verificar si las credenciales son válidas
        $sql = "SELECT * FROM Usuarios WHERE cc='$cc' AND pass='$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Las credenciales son válidas, mostrar un mensaje de éxito
            echo "<p style='color:green'>Inicio de sesión exitoso</p>";
        } else {
            // Las credenciales son inválidas, mostrar un mensaje de error
            echo "<p style='color:red'>Cédula o contraseña incorrectas</p>";
        }
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>