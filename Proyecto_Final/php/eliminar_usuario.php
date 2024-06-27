<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['role'] != 'administrador') {
    header("Location: ../recursos/login3.html");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$id = htmlspecialchars($_GET['id']);

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: admin.php");
} else {
    echo "Error al eliminar el usuario.";
}

$stmt->close();
$conn->close();
?>
