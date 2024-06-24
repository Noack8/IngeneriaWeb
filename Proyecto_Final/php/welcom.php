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
                <?php foreach ($newsData['articles'] as $article): ?>
                    <li>
                        <a href="<?php echo $article['url']; ?>" target="_blank">
                            <?php echo htmlspecialchars($article['title']); ?>
                        </a>
                        <p><?php echo htmlspecialchars($article['description']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


    <section>

<div class="card-group">
<div class="card" style="width: 18rem;">
  <ul></ul>
  <img src="../imagenes/Imag_Trab/Carpintero1.png" class="card-img-top" height="100" style="width: 100%">
    <div class="card-body">
      <h5 class="card-title">Carpintero </h5>
      <p class="card-text">Armar un mueble de IKEA que no pudimos armar</p>
      <p>Compramos este mueble y seguimos las instruccciones del mueble pero al final no logramos obtener su correcto armado. Tenemos todas las piezas y el manual para guiarse.</p>
      <ul class="list basic_info">
        <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 4573 4178</a></li>
        <li><a href="#"><i class="lnr lnr-envelope"></i> juancarlosramireznoack@gmail.com</a></li>
        <li><a href="#"><i class="lnr lnr-apartment"></i> Toltecas 183 int B104</a></li>
        <li><a href="#"><i class="lnr lnr-heart"></i> $150.00</a></li>
      </ul>
    </div>
    <a href="#" class="btn btn-primary">Contactar</a>
    <div class="card-footer text-body-secondary">
      15 de Mayo, 2024
      </div>
  </div>
  
  <div class="card" style="width: 18rem;">
    <ul></ul>
    <img src="../imagenes/Imag_Trab/maestroPersonal.jpg" class="card-img-top" height="100" style="width: 100%">
      <div class="card-body">
        <h5 class="card-title">Maestro Personal</h5>
        <p class="card-text">Profesor de matematicas de secundaria</p>
        <p>Mi hijo tiene mucho problemas con las matematicas y requiere de un profesor que lo ayude a regularse este verano.</p>
        <ul class="list basic_info">
          <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 5843 1245</a></li>
          <li><a href="#"><i class="lnr lnr-envelope"></i> mamiAlumno@gmail.com</a></li>
          <li><a href="#"><i class="lnr lnr-apartment"></i> Zacatecas 84</a></li>
          <li><a href="#"><i class="lnr lnr-heart"></i> $300.00</a></li>
        </ul>
      </div>
      <a href="#" class="btn btn-primary">Contactar</a>
      <div class="card-footer text-body-secondary">
        10 de Junio, 2024
        </div>
    </div>

    <div class="card" style="width: 18rem;">
      <ul></ul>
      <img src="../imagenes/Imag_Trab/conversa.jpg" class="card-img-top" height="100" style="width: 100%">
        <div class="card-body">
          <h5 class="card-title">Escuela de Lenguas</h5>
          <p class="card-text">Se necesitan profesores con especialidad en ingles</p>
          <p>Queremos abrir un nuevo intintuto cerca de la escuela UPIITA y necesitamos a varios candidatos para poder abrir una nueva curricula</p>
          <ul class="list basic_info">
            <li><a href="#"><i class="lnr lnr-phone-handset"></i> (56) 4928 6245</a></li>
            <li><a href="#"><i class="lnr lnr-envelope"></i> corversa_GA@hotmail.com</a></li>
            <li><a href="#"><i class="lnr lnr-apartment"></i> Avenida Politecnico 5231</a></li>
            <li><a href="#"><i class="lnr lnr-heart"></i> $6800.00 por quincena</a></li>
          </ul>
        </div>
        <a href="#" class="btn btn-primary">Contactar</a>
        <div class="card-footer text-body-secondary">
          14 de Noviebre de 2023 hasta 30 de Junio de 2024 
          </div>
      </div>
  
</div>

<div class="card-group">
  <div class="card" style="width: 18rem;">
    <ul></ul>
    <img src="../imagenes/Imag_Trab/vocho.jpg" class="card-img-top" height="100" style="width: 100%">
      <div class="card-body">
        <h5 class="card-title">Mecanico</h5>
        <p class="card-text">Mi vocho tiene una falla de motor</p>
        <p>Tengo unos cuantos meses con el auto detenido y no consigo hacerlo arrancar, ya lo lleve a otros mecanicos y le han cambiado piezas pero continua sin funcionar, necesito alguien que me de una solucion</p>
        <ul class="list basic_info">
          <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 1262 9900</a></li>
          <li><a href="#"><i class="lnr lnr-envelope"></i> J.C.Roco@hotmail.com</a></li>
          <li><a href="#"><i class="lnr lnr-apartment"></i> Apolinar 312 col. La taquera</a></li>
          <li><a href="#"><i class="lnr lnr-heart"></i> $200.00 por revision</a></li>
        </ul>
      </div>
      <a href="#" class="btn btn-primary">Contactar</a>
      <div class="card-footer text-body-secondary">
        20 de Abril de 2023
        </div>
    </div>
      
    <div class="card" style="width: 18rem;">
      <ul></ul>
      <img src="../imagenes/Imag_Trab/boda.jpg" class="card-img-top" height="100" style="width: 100%">
        <div class="card-body">
          <h5 class="card-title">Organizador(a) de eventos</h5>
          <p class="card-text">Mi boda sera dentro de un año</p>
          <p>No tengo nada de experiencia en ningun tipo de fiesta y quisiera que alguien pudiese organizar todo lo relacionado a mi boda, como dije es dentro de un año y quiero planificar varias cosas</p>
          <ul class="list basic_info">
            <li><a href="#"><i class="lnr lnr-phone-handset"></i> (42) 5832 5112</a></li>
            <li><a href="#"><i class="lnr lnr-envelope"></i> mujer_bonita@yahoo.com</a></li>
            <li><a href="#"><i class="lnr lnr-apartment"></i> Porvenir 212 col. La arboleda</a></li>
            <li><a href="#"><i class="lnr lnr-heart"></i> A tratar con el worker</a></li>
          </ul>
        </div>
        <a href="#" class="btn btn-primary">Contactar</a>
        <div class="card-footer text-body-secondary">
          A mas tardar 15 de Julio de 2024
          </div>
      </div>

      <div class="card" style="width: 18rem;">
        <ul></ul>
        <img src="../imagenes/Imag_Trab/beat.jpg" class="card-img-top" height="100" style="width: 100%">
          <div class="card-body">
            <h5 class="card-title">Taxista</h5>
            <p class="card-text">Flotilla de autos beat para aplicacion uber</p>
            <p>Eh comprado varios autos de proposito uber, quiero abrir un estilo de base de taxi para puros autos beat. Dependiendo de como sea la organizacion final podemos disponer de mas autos</p>
            <ul class="list basic_info">
              <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 4231 1242</a></li>
              <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 5232 5231</a></li>
              <li><a href="#"><i class="lnr lnr-envelope"></i> whitexican@gmail.com</a></li>
              <li><a href="#"><i class="lnr lnr-apartment"></i> La nice 24 del. Benito Juarez</a></li>
              <li><a href="#"><i class="lnr lnr-heart"></i>Desde $2000 hasta $5000 dependiendo del horario</a></li>
            </ul>
          </div>
          <a href="#" class="btn btn-primary">Contactar</a>
          <div class="card-footer text-body-secondary">
            Finaliza hasta el año 2025
            </div>
        </div>
      
    </div>

    <div class="card-group">
      <div class="card" style="width: 18rem;">
        <ul></ul>
        <img src="../imagenes/Imag_Trab/baño.jpg" class="card-img-top" height="100" style="width: 100%">
          <div class="card-body">
            <h5 class="card-title">Plomero</h5>
            <p class="card-text">Se rompio mi escusado por accidente</p>
            <p>Por accidente rompo el inodoro, por desgracia es el unico que hay en la casa y necesito que alguein pueda venirme apoyar lo mas rapido posible</p>
            <ul class="list basic_info">
              <li><a href="#"><i class="lnr lnr-phone-handset"></i> (54) 2341 5821</a></li>
              <li><a href="#"><i class="lnr lnr-envelope"></i> elcaca@hotmail.com</a></li>
              <li><a href="#"><i class="lnr lnr-apartment"></i> El roble del. Iztapalapa</a></li>
              <li><a href="#"><i class="lnr lnr-heart"></i>$800</a></li>
            </ul>
          </div>
          <a href="#" class="btn btn-primary">Contactar</a>
          <div class="card-footer text-body-secondary">
            Lo mas pronto posible
            </div>
        </div>
          
        <div class="card" style="width: 18rem;">
          <ul></ul>
          <img src="../imagenes/Imag_Trab/cesar_millan.avif" class="card-img-top" height="100" style="width: 100%">
            <div class="card-body">
              <h5 class="card-title">Educador de perros</h5>
              <p class="card-text">Tienes problemas con la educacion de tu mascota?</p>
              <p>Te ayudamos a educar a tu mascota entre los problemas mas tipicos hasta lo problemas de actitud de algunos canes. Tenemos una escuela muy completa y damos displomas a los perros graduados.</p>
              <ul class="list basic_info">
                <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 0092 5182</a></li>
                <li><a href="#"><i class="lnr lnr-envelope"></i> encantadorDPerros@hotmail.com</a></li>
                <li><a href="#"><i class="lnr lnr-apartment"></i> Popoteco Del. Zaragoza</a></li>
                <li><a href="#"><i class="lnr lnr-heart"></i>$ 1500</a></li>
              </ul>
            </div>
            <a href="#" class="btn btn-primary">Contactar</a>
            <div class="card-footer text-body-secondary">
              Todo el año menos en noviembre
              </div>
          </div>

          <div class="card" style="width: 18rem;">
            <ul></ul>
            <img src="../imagenes/Imag_Trab/bufete.jpg" class="card-img-top" height="100" style="width: 100%">
              <div class="card-body">
                <h5 class="card-title">Bufete de abogados</h5>
                <p class="card-text">Algun problema legal con el cual tienes que lidear?</p>
                <p>Nuestro bufete cuenta con varios abogados con distintas especialidades ue podran ajustarse a tus diferentes situaciones. Ya sea divorsios como una demanda hacia su persona. Nosotros nos encargamos</p>
                <ul class="list basic_info">
                  <li><a href="#"><i class="lnr lnr-phone-handset"></i> (56) 3241 6481</a></li>
                  <li><a href="#"><i class="lnr lnr-envelope"></i> ElmejorbufetAbogados@mexico.com</a></li>
                  <li><a href="#"><i class="lnr lnr-apartment"></i> Homero 42 col. Polanco</a></li>
                  <li><a href="#"><i class="lnr lnr-heart"></i>$ 20,000.00</a></li>
                </ul>
              </div>
              <a href="#" class="btn btn-primary">Contactar</a>
              <div class="card-footer text-body-secondary">
                Disponibles todo el año
                </div>
            </div>
            </div>
        <div class="card-group">
          <div class="card" style="width: 18rem;">
            <ul></ul>
            <img src="../imagenes/Imag_Trab/seguros.jpg" class="card-img-top" height="100" style="width: 100%">
              <div class="card-body">
                <h5 class="card-title">Seguros inbursa</h5>
                <p class="card-text">Seguros de auto, vida o inmueble</p>
                <p>Tenemos las mejores ofertas y cubrimos hasta lo que menos te imaginas. Tenemos promociones por epocas y diferentes tipos de covertura. Pregunta por las promociones sin compromiso que alguno de nuestros operadores te atenderan con gusto</p>
                <ul class="list basic_info">
                  <li><a href="#"><i class="lnr lnr-phone-handset"></i> (800) 542 6842</a></li>
                  <li><a href="#"><i class="lnr lnr-envelope"></i> inbursa@gmail.com.mx</a></li>
                  <li><a href="#"><i class="lnr lnr-apartment"></i> plateros 75, col. Plateros</a></li>
                  <li><a href="#"><i class="lnr lnr-heart"></i>Dependiendo del paquete son los precios</a></li>
                </ul>
              </div>
              <a href="#" class="btn btn-primary">Contactar</a>
              <div class="card-footer text-body-secondary">
                Disponibles todo el año
                </div>
            </div>
              
              <div class="card" style="width: 18rem;">
                <ul></ul>
                <img src="../imagenes/Imag_Trab/ninera.jpg" class="card-img-top" height="100" style="width: 100%">
                  <div class="card-body">
                    <h5 class="card-title">Solicito niñer@</h5>
                    <p class="card-text">Tengo 3 hijos que necesito que cuiden</p>
                    <p>Tengo un evento familiar que no permiten el acceso a infantes. Necesito que cuiden a mis hijos por lo menos unas 5 horas. El trato se haria inbox junto con los detalles extras</p>
                    <ul class="list basic_info">
                      <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 8632 5732</a></li>
                      <li><a href="#"><i class="lnr lnr-envelope"></i> mamasCal@gmail.com</a></li>
                      <li><a href="#"><i class="lnr lnr-apartment"></i> Del. Tlalpan</a></li>
                      <li><a href="#"><i class="lnr lnr-heart"></i>$ 150 X hr</a></li>
                    </ul>
                  </div>
                  <a href="#" class="btn btn-primary">Contactar</a>
                  <div class="card-footer text-body-secondary">
                    28 de Junio de 2024
                    </div>
                </div>

                  <div class="card" style="width: 18rem;">
                    <ul></ul>
                    <img src="../imagenes/Imag_Trab/programador.jpg" class="card-img-top" height="100" style="width: 100%">
                      <div class="card-body">
                        <h5 class="card-title">Programador de paginas WEB</h5>
                        <p class="card-text">Se solicita progrmador para diseñar la ingeneria web de una pagina</p>
                        <p>Nos dejaron un proyecto final donde debemos desarollar todo un proyecto de una pagina WEB</p>
                        <ul class="list basic_info">
                          <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 1234 7890</a></li>
                          <li><a href="#"><i class="lnr lnr-envelope"></i> nosotros@gmail.com.mx</a></li>
                          <li><a href="#"><i class="lnr lnr-apartment"></i> av politecnico 1652</a></li>
                          <li><a href="#"><i class="lnr lnr-heart"></i>$100 bien sueltos</a></li>
                        </ul>
                      </div>
                      <a href="#" class="btn btn-primary">Contactar</a>
                      <div class="card-footer text-body-secondary">
                        26 de Junio de 2024
                        </div>
                    </div>
              
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


