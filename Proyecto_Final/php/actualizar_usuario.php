<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['role'] != 'administrador') {
    header("Location: ../recursos/login3.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $usuario = htmlspecialchars($_POST['usuario']);
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_registration2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET usuario = ?, email = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("sssi", $usuario, $email, $role, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: ../php/admin.php");
    } else {
        echo "Error al actualizar el usuario.";
    }

    $stmt->close();
    $conn->close();
}
?>
