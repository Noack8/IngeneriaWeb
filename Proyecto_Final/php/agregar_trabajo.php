// /php/agregar_trabajo.php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = htmlspecialchars($_POST['titulo']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $detalles = htmlspecialchars($_POST['detalles']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $pago = htmlspecialchars($_POST['pago']);
    $fecha = date("Y-m-d");

    $imagen = $_FILES['imagen']['name'];
    $target_dir = "../imagenes/Imag_Trab/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);

    $sql = "INSERT INTO jobs (titulo, descripcion, detalles, telefono, email, direccion, pago, imagen, fecha) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("sssssssss", $titulo, $descripcion, $detalles, $telefono, $email, $direccion, $pago, $imagen, $fecha);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        echo "Trabajo agregado exitosamente.";
    } else {
        echo "Error al agregar el trabajo.";
    }

    $stmt->close();
    $conn->close();

    header("Location: operador.php");
}
?>
