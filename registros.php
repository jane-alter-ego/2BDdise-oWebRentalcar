<?php
$servername = "localhost";
$username = "root"; // Usuario por defecto de XAMPP
$password = ""; // Contraseña vacía por defecto
$dbname = "RENTALCAR";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nombre_usuario = $_POST['nombre_usuario'];
$email = $_POST['email'];
$numero_celular = $_POST['numero_celular'];

// Insertar datos en la base de datos
$sql = "INSERT INTO REGISTROS (nombre, apellido, nombre_usuario, email, numero_celular)
VALUES ('$nombre', '$apellido', '$nombre_usuario', '$email', '$numero_celular')";

if ($conn->query($sql) === TRUE) {
    header("Location: confirmacion.php"); // Redirigir a página de confirmación
} else {
    header("Location: rechazo.php"); // Redirigir a página de rechazo
}

$conn->close();
?>
