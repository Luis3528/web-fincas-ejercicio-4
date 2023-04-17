<?php
// Incluir el archivo de conexión
include '../../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';


// Verificar si se ha enviado el formulario de agregar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los valores del formulario
  $id = $_POST["id"];
  $clave = $_POST["clave"];
  $nombre = $_POST["nombre"];
  $numHectaras = $_POST["numHectaras"];
  $metrosCuadrados = $_POST["metrosCuadrados"];
  $propietario = $_POST["propietario"];
  $capataz = $_POST["capataz"];
  $pais = $_POST["pais"];
  $departamento = $_POST["departamento"];
  $ciudad = $_POST["ciudad"];
  $siProduceLeche = $_POST["siProduceLeche"] == "true" ? 1 : 0;
  $siProduceCereales = $_POST["siProduceCereales"] == "true" ? 1 : 0;
  $siProduceFrutas = $_POST["siProduceFrutas"] == "true" ? 1 : 0;
  $siProduceVerduras = $_POST["siProduceVerduras"] == "true" ? 1 : 0;
  $usuariocc = $_POST["usuariocc"];

  // Preparar la consulta SQL para agregar un nuevo registro a la tabla Fincas
  $sql = "INSERT INTO Fincas (id, clave, nombre, numHectaras, metrosCuadrados, propietario, capataz, pais, departamento, ciudad, siProduceLeche, siProduceCereales, siProduceFrutas, siProduceVerduras, usuariocc) VALUES ('$id', '$clave', '$nombre', '$numHectaras', '$metrosCuadrados', '$propietario', '$capataz', '$pais', '$departamento', '$ciudad', '$siProduceLeche', '$siProduceCereales', '$siProduceFrutas', '$siProduceVerduras', '$usuariocc')";

  // Ejecutar la consulta SQL
  if ($conn->query($sql) === TRUE) {
    echo "Registro agregado exitosamente";
  } else {
    echo "Error al agregar el registro: " . $conn->error;
  }

  // Cerrar la conexión
  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Agregar Registro - Fincas</title>
  
</head>
<body>
  <h1>Agregar Registro - Fincas</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>ID:</label>
    <input type="text" name="id"><br>
    <label>Clave:</label>
    <input type="text" name="clave"><br>
    <label>Nombre:</label>
    <input type="text" name="nombre"><br>
    <label>Número de Hectáreas:</label>
    <input type="text" name="numHectaras"><br>
    <label>Metros Cuadrados:</label>
    <input type="text" name="metrosCuadrados"><br>
    <label>Propietario:</label>
    <input type="text" name="propietario"><br>
    <label>Capataz:</label>
    <input type="text" name="capataz"><br>
    <label>País:</label>
    <input type="text" name="pais"><br>
    <label>Departamento:</label>
    <input type="text" name="departamento"><br>
    <label>Ciudad:</label>
    <input type="text" name="ciudad"><br>
    <label>¿Produce Leche?:</label>
    <input type="radio" name="siProduceLeche" value="true">Sí
    <input type="radio" name="siProduceLeche" value="false" checked>No<br>
    <label>¿Produce Cereales?:</label>
    <input type="radio" name="siProduceCereales" value="true">Sí
    <input type="radio" name="siProduceCereales" value="false" checked>No<br>
    <label>¿Produce Frutas?:</label>
    <input type="radio" name="siProduceFrutas" value="true">Sí
    <input type="radio" name="siProduceFrutas" value="false" checked>No<br>
    <label>¿Produce Verduras?:</label>
    <input type="radio" name="siProduceVerduras" value="true">Sí
    <input type="radio" name="siProduceVerduras" value="false" checked>No<br>
    <label>Usuario (CC):</label>
    <select name="usuariocc">
      <?php
        // Obtener la lista de usuarios para el dropdown
        $sql = "SELECT cc, nombre, apellido FROM Usuarios";
        $result = $conn->query($sql);

        // Mostrar cada usuario en el dropdown
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value=\"" . $row["cc"] . "\">" . $row["nombre"] . " " . $row["apellido"] . " (" . $row["cc"] . ")</option>";
          }
        }
      ?>
    </select><br>
    <input type="submit" value="Agregar">
  </form>
</body>
</html>
