<?php
session_start();

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
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT id, password, role FROM users WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        // Redirigir según el rol del usuario
        if ($row['role'] == 'administrador') {
            header("Location: admin.php");
        } elseif ($row['role'] == 'operador') {
            header("Location: operador.php");
        } else {
            header("Location: welcom.php");
        }
        exit();
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}

$stmt->close();
$conn->close();
?>




