<?php
// Incluir el archivo de conexión
include '../co.edu.udec.act1.LuisZuñiga.modelo/BaseDeDatos.php';


// Obtener los datos del formulario
$id = $_POST['id'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$numHectaras = $_POST['numHectaras'];
$metrosCuadrados = $_POST['metrosCuadrados'];
$propietario = $_POST['propietario'];
$capataz = $_POST['capataz'];
$pais = $_POST['pais'];
$departamento = $_POST['departamento'];
$ciudad = $_POST['ciudad'];
$siProduceLeche = isset($_POST['siProduceLeche']) ? 1 : 0;
$siProduceCereales = isset($_POST['siProduceCereales']) ? 1 : 0;
$siProduceFrutas = isset($_POST['siProduceFrutas']) ? 1 : 0;
$siProduceVerduras = isset($_POST['siProduceVerduras']) ? 1 : 0;

// Preparar la sentencia SQL para agregar un nuevo registro a la tabla Fincas
$sql = "INSERT INTO Fincas (id, clave, nombre, numHectaras, metrosCuadrados, propietario, capataz, país, departamento, ciudad, siProduceLeche, siProduceCereales, siProduceFrutas, siProduceVerduras) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la sentencia SQL con "prepare statement"
$stmt = $conn->prepare($sql);

// Asignar los valores a los parámetros de la sentencia SQL
$stmt->bind_param("isssssssssiiii", $id, $clave, $nombre, $numHectaras, $metrosCuadrados, $propietario, $capataz, $pais, $departamento, $ciudad, $siProduceLeche, $siProduceCereales, $siProduceFrutas, $siProduceVerduras);

// Ejecutar la sentencia SQL
if ($stmt->execute() === TRUE) {
    echo "Finca agregada exitosamente";
} else {
    echo "Error al agregar la finca: " . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>