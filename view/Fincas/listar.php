<?php
// Incluir archivo de conexión
include '../../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';


// Obtener los registros de la tabla Fincas y unirlos con los registros de la tabla Usuarios
$sql = "SELECT f.*, u.nombre, u.apellido FROM Fincas f JOIN Usuarios u ON f.usuariocc = u.cc";
$result = $conn->query($sql);

// Crear la tabla HTML y mostrar los registros
if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Clave</th><th>Nombre</th><th>Número de Hectáreas</th><th>Metros Cuadrados</th><th>Propietario</th><th>Capataz</th><th>País</th><th>Departamento</th><th>Ciudad</th><th>Producción de Leche</th><th>Producción de Cereales</th><th>Producción de Frutas</th><th>Producción de Verduras</th><th>Usuario (CC)</th><th>Nombre del Usuario</th><th>Apellido del Usuario</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["clave"] . "</td>";
    echo "<td>" . $row["nombre"] . "</td>";
    echo "<td>" . $row["numHectaras"] . "</td>";
    echo "<td>" . $row["metrosCuadrados"] . "</td>";
    echo "<td>" . $row["propietario"] . "</td>";
    echo "<td>" . $row["capataz"] . "</td>";
    echo "<td>" . $row["pais"] . "</td>";
    echo "<td>" . $row["departamento"] . "</td>";
    echo "<td>" . $row["ciudad"] . "</td>";
    echo "<td>" . ($row["siProduceLeche"] ? "Sí" : "No") . "</td>";
    echo "<td>" . ($row["siProduceCereales"] ? "Sí" : "No") . "</td>";
    echo "<td>" . ($row["siProduceFrutas"] ? "Sí" : "No") . "</td>";
    echo "<td>" . ($row["siProduceVerduras"] ? "Sí" : "No") . "</td>";
    echo "<td>" . $row["usuariocc"] . "</td>";
    echo "<td>" . $row["nombre"] . "</td>";
    echo "<td>" . $row["apellido"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No hay registros.";
}

// Cerrar la conexión
$conn->close();
?>