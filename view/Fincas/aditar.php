<?php
// Incluir archivo de conexión
include '../../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';

// Obtener el ID del registro a editar
$id = $_GET["id"];

// Obtener los datos del registro a editar
$sql = "SELECT * FROM Fincas WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos enviados por el formulario
  $clave = $_POST["clave"];
  $nombre = $_POST["nombre"];
  $numHectaras = $_POST["numHectaras"];
  $metrosCuadrados = $_POST["metrosCuadrados"];
  $propietario = $_POST["propietario"];
  $capataz = $_POST["capataz"];
  $pais = $_POST["pais"];
  $departamento = $_POST["departamento"];
  $ciudad = $_POST["ciudad"];
  $siProduceLeche = isset($_POST["siProduceLeche"]) ? 1 : 0;
  $siProduceCereales = isset($_POST["siProduceCereales"]) ? 1 : 0;
  $siProduceFrutas = isset($_POST["siProduceFrutas"]) ? 1 : 0;
  $siProduceVerduras = isset($_POST["siProduceVerduras"]) ? 1 : 0;
  $usuariocc = $_POST["usuariocc"];

  // Actualizar los datos del registro
  $sql = "UPDATE Fincas SET clave = '$clave', nombre = '$nombre', numHectaras = $numHectaras, metrosCuadrados = $metrosCuadrados, propietario = '$propietario', capataz = '$capataz', país = '$pais', departamento = '$departamento', ciudad = '$ciudad', siProduceLeche = $siProduceLeche, siProduceCereales = $siProduceCereales, siProduceFrutas = $siProduceFrutas, siProduceVerduras = $siProduceVerduras, usuariocc = $usuariocc WHERE id = $id";
  if ($conn->query($sql) === TRUE) {
    // Redireccionar a la página de listado de registros
    header("Location: listarcontratos.php");
    exit;
  } else {
    echo "Error al actualizar el registro: " . $conn->error;
  }
}

// Mostrar el formulario de edición
?>
<form method="POST">
  <label for="clave">Clave:</label>
  <input type="text" name="clave" value="<?php echo $row["clave"]; ?>"><br>

  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" value="<?php echo $row["nombre"]; ?>"><br>

  <label for="numHectaras">Número de Hectáreas:</label>
  <input type="number" name="numHectaras" value="<?php echo $row["numHectaras"]; ?>"><br>

  <label for="metrosCuadrados">Metros Cuadrados:</label>
  <input type="number" name="metrosCuadrados" value="<?php echo $row["metrosCuadrados"]; ?>"><br>

  <label for="propietario">Propietario:</label>
  <input type="text" name="propietario" value="<?php echo $row["propietario"]; ?>"><br>

  <label for="capataz">Capataz:</label>
  <input type="text" name="capataz" value="<?php echo $row["capataz"]; ?>"><br>

  <label for="pais">País:</label>
  <input type="text" name="pais" value="<?php echo $row["pais"]; ?>"><br>

  <label for="departamento">Departamento:</label>
  <input type="text" name="departamento" value="<?php echo $row["departamento"]; ?>"><br>

  <label for="ciudad">Ciudad:</label>
  <input type="text" name="ciudad" value="<?php echo $row["ciudad"]; ?>"><br>

  <label for="siProduceLeche">¿Produce leche?</label>
  <input type="checkbox" name="siProduceLeche" <?php if ($row["siProduceLeche"]) { echo "checked"; } ?>><br>

  <label for="siProduceCereales">¿Produce cereales?</label>
  <input type="checkbox" name="siProduceCereales" <?php if ($row["siProduceCereales"]) { echo "checked"; } ?>><br>

  <label for="siProduceFrutas">¿Produce frutas?</label>
  <input type="checkbox" name="siProduceFrutas" <?php if ($row["siProduceFrutas"]) { echo "checked"; } ?>><br>

  <label for="siProduceVerduras">¿Produce verduras?</label>
  <input type="checkbox" name="siProduceVerduras" <?php if ($row["siProduceVerduras"]) { echo "checked"; } ?>><br>

  <label for="usuariocc">Usuario:</label>
  <select name="usuariocc">
    <?php
    // Obtener la lista de usuarios
    $sql = "SELECT cc, nombre, apellido FROM Usuarios";
    $result = $conn->query($sql);

    // Mostrar la lista de usuarios en el select
    while ($user_row = $result->fetch_assoc()) {
      $selected = ($row["usuariocc"] == $user_row["cc"]) ? "selected" : "";
      echo "<option value='{$user_row['cc']}' $selected>{$user_row['nombre']} {$user_row['apellido']}</option>";
    }
    ?>
  </select><br>

  <input type="submit" value="Actualizar">
</form>