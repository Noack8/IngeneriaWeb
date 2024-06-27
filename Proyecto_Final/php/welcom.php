<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ../recursos/login3.html");
    exit();
}

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration2"; // Ajuste para el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario de la sesión
$usuario_id = $_SESSION['usuario_id'];

if (!$usuario_id) {
    die("Error: No se ha encontrado el ID del usuario en la sesión.");
}

// Preparar y ejecutar la consulta SQL para obtener los detalles del usuario
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Error: Datos del usuario no encontrados.");
}

$user_data = $result->fetch_assoc();

// Obtener los trabajos
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

// Cerrar la conexión
$stmt->close();
$conn->close();
/*
// Obtener noticias del día usando NewsAPI
$apiKey = '7d748d82763445ceb8d1956204ba41c1';
$newsUrl = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=' . $apiKey;

$newsResponse = file_get_contents($newsUrl);
if ($newsResponse === false) {
    die("Error al obtener noticias: no se pudo acceder a la URL.");
}

$newsData = json_decode($newsResponse, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error al decodificar la respuesta de noticias: " . json_last_error_msg());
}

if ($newsData['status'] !== 'ok') {
    die("Error al obtener noticias: " . $newsData['message']);
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" href="">
    <title>Sell Services</title>

    <!--Boostrap CSS-->
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
       
                
</head>
<header class="container-fluid bg-danger d-flex justify-content-center">
    <p class="text-light mb-0 p-2 fs-6">Contactanos (+52)55 4216 2389</p>
    <p class="text-light mb-0 p-2 fs-6">Customers&Workers.com </p>
</header>
<body>
    <nav  class="navbar navbar-expand-lg navbar-light p-3"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="/index.html">
              <span class="fs-1  text-danger fw-bold">Customers & Workers</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          

        </div>
      </nav>

<body>
    <header>
        <div class="container">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        </div>
    </header>
    <div class="container">
        <section id="profile">
        
            <p>Email: <?php echo htmlspecialchars($user_data['email']); ?></p>
            <p>Teléfono: <?php echo htmlspecialchars($user_data['telefono']); ?></p>
        </section>
        
    </div>
    <div class="container">
        <div class="news-section">
            <h2>Últimas Noticias</h2>
            <ul>
               
            
            </ul>
        </div>
    </div>


    <section id="jobs">
            <h2>Trabajos Disponibles</h2>
            <div class="card-container">
                <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="card" style="width: 18rem;">
                    <img src="../imagenes/Imag_Trab/<?php echo htmlspecialchars($row['imagen']); ?>" class="card-img-top" height="100" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['titulo']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['descripcion']); ?></p>
                        <p><?php echo htmlspecialchars($row['detalles']); ?></p>
                        <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-phone-handset"></i> <?php echo htmlspecialchars($row['telefono']); ?></a></li>
                            <li><a href="#"><i class="lnr lnr-envelope"></i> <?php echo htmlspecialchars($row['email']); ?></a></li>
                            <li><a href="#"><i class="lnr lnr-apartment"></i> <?php echo htmlspecialchars($row['direccion']); ?></a></li>
                            <li><a href="#"><i class="lnr lnr-heart"></i> <?php echo htmlspecialchars($row['pago']); ?></a></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-primary">Contactar</a>
                    <div class="card-footer text-body-secondary">
                        <?php echo htmlspecialchars($row['fecha']); ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>


<a href="../index.html" class="button">Cerrar sesión</a>

<footer class="w-100 conteiner-fluid bg-danger d-flex  align-items-center justify-content-center flex-wrap">
<p class="fs-5 px-3  pt-3">C&W &copy; Todos Los Derechos Reservados 2022</p>
<div id="iconos" >
    <a href="#"><i class="bi bi-facebook"></i></a>
    <a href="#"><i class="bi bi-twitter"></i></a>
    <a href="#"><i class="bi bi-instagram"></i></a> 
</footer>





</body>
</html>


