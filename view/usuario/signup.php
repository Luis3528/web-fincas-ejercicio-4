<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/styleSignup.php"> 
	<title>Registro de Usuario</title>
</head>
<body>
	
	<h1>Registro de Usuario</h1>
	<form method="post" action="signup.php">
		<label for="cc">Cédula:</label>
		<input type="text" name="cc" required>
		<br>
		<label for="pass">Contraseña:</label>
		<input type="password" name="pass" required>
		<br>
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" required>
		<br>
		<label for="apellido">Apellido:</label>
		<input type="text" name="apellido" required>
		<br>
		<label for="genero">Género:</label>
		<input type="radio" name="genero" value="Masculino" required> Masculino
		<input type="radio" name="genero" value="Femenino" required> Femenino
		<br>
		<label for="email">Email:</label>
		<input type="email" name="email" required>
		<br>
		<input type="submit" value="Registrarse">
	</form>
	<?php
	// Incluir el archivo de conexión
	include '../../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';

	// Verificar si se ha enviado el formulario
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Obtener los datos del formulario
		$cc = $_POST['cc'];
		$pass = $_POST['pass'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$genero = $_POST['genero'];
		$email = $_POST['email'];

		// Verificar si el usuario ya existe en la base de datos
		$sql = "SELECT cc FROM Usuarios WHERE cc='$cc'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // El usuario ya existe, mostrar un mensaje de error
		    echo "<p style='color:red'>El usuario con cédula $cc ya está registrado</p>";
		} else {
		    // El usuario no existe, insertar los datos en la base de datos
		    $sql = "INSERT INTO Usuarios (cc, pass, nombre, apellido, genero, email)
		    VALUES ('$cc', '$pass', '$nombre', '$apellido', '$genero', '$email')";

		    if ($conn->query($sql) === TRUE) {
		        // La inserción fue exitosa, mostrar un mensaje de éxito
		        echo "<p style='color:green'>Registro exitoso</p>";
		    } else {
		        // La inserción falló, mostrar un mensaje de error
		        echo "<p style='color:red'>Error al registrar el usuario: " . $conn->error . "</p>";
		    }
		}
	}

	// Cerrar la conexión
	$conn->close();
	?>
</body>
</html>