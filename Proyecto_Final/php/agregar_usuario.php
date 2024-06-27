<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration2"; 

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];
$role = ''; // Asignar el rol de usuario por defecto

// Insertar datos en la base de datos
$sql = "INSERT INTO users (nombre, apellidos, usuario, email, telefono, password, fecha_nacimiento, direccion, role) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $nombre, $apellidos, $usuario, $email, $telefono, $password, $fecha_nacimiento, $direccion, $role);

if ($stmt->execute()) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
