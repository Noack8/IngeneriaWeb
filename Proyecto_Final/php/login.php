<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = htmlspecialchars($_POST['usuario']);
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "user_registration2";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT id, usuario, password, role FROM users WHERE usuario = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['role'] = $row['role']; // Asegúrate de guardar el rol en la sesión

            // Determinar el rol y redirigir según el rol
            switch ($row['role']) {
                case 'usuario':
                    header("Location: welcom.php");
                    break;
                case 'operador':
                    header("Location: operador.php");
                    break;
                case 'administrador':
                    header("Location: admin.php");
                    break;
                default:
                    echo "Rol desconocido.";
                    break;
            }
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>
