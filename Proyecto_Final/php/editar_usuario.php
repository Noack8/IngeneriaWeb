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

$sql = "SELECT usuario, email, role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    header("Location: admin.php");
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" href="">
    <title>Sell Services</title>

    <!--Boostrap CSS-->
    <link rel="stylesheet" href="../style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
                
</head>
<header class="container-fluid bg-danger d-flex justify-content-center">
    <p class="text-light mb-0 p-2 fs-6">Contactanos (+52)55 4216 2389</p>
    <p class="text-light mb-0 p-2 fs-6">Customers&Workers.com </p>
</header>
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <form action="../php/actualizar_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($row['usuario']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="usuario" <?php if ($row['role'] == 'usuario') echo 'selected'; ?>>Usuario</option>
                <option value="operador" <?php if ($row['role'] == 'operador') echo 'selected'; ?>>Operador</option>
                <option value="administrador" <?php if ($row['role'] == 'administrador') echo 'selected'; ?>>Administrador</option>
            </select>

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
