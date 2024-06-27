// /php/eliminar_trabajo.php
<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['role'] != 'operador') {
    header("Location: ../recursos/login3.html");
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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM jobs WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        echo "Trabajo eliminado exitosamente.";
    } else {
        echo "Error al eliminar el trabajo.";
    }

    $stmt->close();
}

$conn->close();

header("Location: operador.php");
?>
