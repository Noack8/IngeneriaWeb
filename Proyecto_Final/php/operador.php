
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

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);
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
<body>
    <nav  class="navbar navbar-expand-lg navbar-light p-3"  id="menu">
        <div class="container">
          <a class="navbar-brand" href="/index.html">
              <span class="fs-1  text-danger fw-bold">Customers & Workers</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

<body>
<header>
        <div class="container">
            <h1>Panel de Operador</h1>
            <a href="logout.php" class="button">Cerrar sesión</a>
        </div>
    </header>
    <div class="container">
        <h2>Gestión de Tarjetas</h2>
                <li class="nav-item ">
                  <p>Recuerda contactar a los dueños de las tarjetas con mas tiempo y cerciorar que el servicio o el trabajor estan diponibles</p>
              </li>
            
              
              </li>
              </ul>
          </div>

        </div>
      </nav>


      <section>

        <div class="card-group">
        <div class="card" style="width: 18rem;">
          </div>
          
          <div class="card" style="width: 18rem;">
            <ul></ul>
            <img src="../imagenes/workers.jpg" class="card-img-top" height="100" style="width: 100%">
              <div class="card-body">
                <h5 class="card-title">Nombre del tipo de profesion</h5>
                <p class="card-text">Tipo de trabajador que se requiere o que labora</p>
                <p>Descripcion breve sobre el trabajo a realizar o del trabajo que realiza. Esta tarjeta es la que se usa como default para los espacios disponibles</p>
                <ul class="list basic_info">
                  <li><a href="#"><i class="lnr lnr-phone-handset"></i> Numero telefonico de contacto a 10 cifras</a></li>
                  <li><a href="#"><i class="lnr lnr-envelope"></i>Correo electronico de contacto</a></li>
                  <li><a href="#"><i class="lnr lnr-apartment"></i> Direccion aproximada del lugar de trabajo</a></li>
                  <li><a href="#"><i class="lnr lnr-heart"></i> Precio fijo o precio de consulta estimulado por el usuario</a></li>
                </ul>
              </div>
              <div class="card-footer text-body-secondary">
                Fecha en la que se desea realizar trabajo o que esta disponible el trabajador
                </div>
            </div>

            <div class="card" style="width: 18rem;">  
        </div>
        </div>
    <div class="container">
        <h2>Gestión de Trabajos</h2>
        <a href="../recursos/agregar_trabajo.html" class="button">Agregar Nuevo Trabajo</a>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Pago</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['direccion']); ?></td>
                    <td><?php echo htmlspecialchars($row['pago']); ?></td>
                    <td><img src="../imagenes/Imag_Trab/<?php echo htmlspecialchars($row['imagen']); ?>" width="100"></td>
                    <td><?php echo htmlspecialchars($row['fecha']); ?></td>
                    <td class="actions">
                        <a href="editar_trabajo.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                        <a href="eliminar_trabajo.php?id=<?php echo $row['id']; ?>">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="../index.html" class="button">Cerrar sesión</a>
</body>
</html>

<?php
$conn->close();
?>
