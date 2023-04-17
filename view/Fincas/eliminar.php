<!DOCTYPE html>
<html>
<head>
	<title>Eliminar fincas</title>
</head>
<body>

	<form action="eliminar.php" method="post">
		<label for="id_fincas">Selecciona la finca que deseas eliminar:</label>
		<select name="id_fincas" id="id_fincas">
			<option value="1">FInca 1</option>
			<option value="2">FInca 2</option>
			<!-- Agrega aquí todas las opciones disponibles -->
		</select>
		<br>
		<input type="submit" value="Eliminar">
	</form>

	<?php if (isset($_GET["eliminado"])): ?>
		<p>El registro ha sido eliminado correctamente</p>
	<?php endif; ?>

</body>
</html>
