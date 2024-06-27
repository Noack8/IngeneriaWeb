<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['role'] != 'administrador') {
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

$sql = "SELECT id, usuario, email, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrador - Gestión de Usuarios</title>
    <link rel="stylesheet" href="../css/style_admin.css">
</head>
<body>
<header>
        <div class="container">
            <h1>Panel de Administración</h1>
            <a href="logout.php" class="button">Cerrar sesión</a>
        </div>
    </header>
    <div class="container">
        <h2>Gestión de Usuarios</h2>
        <a href="../recursos/agregar_usuario.html" class="button">Agregar Nuevo Usuario</a>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                    <td class="actions">
                        <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                        <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
