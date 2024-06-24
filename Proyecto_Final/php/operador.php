<?php
session_start();

// Verificar si el usuario ha iniciado sesión y es operador
if (!isset($_SESSION['usuario']) || $_SESSION['role'] !== 'operador') {
    header("Location: ../recursos/login3.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" href="">
    <title>Sell Services</title>

    <!--Boostrap CSS-->
    <link rel="stylesheet" href="src/css/main.css">
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

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
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
            <img src="../imagenes/Default_Customers_workers_2.jpg" class="card-img-top" height="100" style="width: 100%">
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
                    
        <div class="card-group">
          <div class="card" style="width: 18rem;">
            <ul></ul>
            <img src="../imagenes/Imag_Trab/Carpintero1.png" class="card-img-top" height="100" style="width: 100%">
              <div class="card-body">
                <h5 class="card-title">Carpintero </h5>
                <p class="card-text">Armar un mueble de IKEA que no pudimos armar</p>
                <ul class="list basic_info">
                  <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 4573 4178</a></li>
                  <li><a href="#"><i class="lnr lnr-envelope"></i> juancarlosramireznoack@gmail.com</a></li>
                  <li><a href="#"><i class="lnr lnr-apartment"></i> Toltecas 183 int B104</a></li>
                </ul>
              </div>
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
                  <ul class="list basic_info">
                    <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 5843 1245</a></li>
                    <li><a href="#"><i class="lnr lnr-envelope"></i> mamiAlumno@gmail.com</a></li>
                    <li><a href="#"><i class="lnr lnr-apartment"></i> Zacatecas 84</a></li>
                  </ul>
                </div>
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
                    <ul class="list basic_info">
                      <li><a href="#"><i class="lnr lnr-phone-handset"></i> (56) 4928 6245</a></li>
                      <li><a href="#"><i class="lnr lnr-envelope"></i> corversa_GA@hotmail.com</a></li>
                      <li><a href="#"><i class="lnr lnr-apartment"></i> Avenida Politecnico 5231</a></li>
                    </ul>
                  </div>
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
                  <ul class="list basic_info">
                    <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 1262 9900</a></li>
                    <li><a href="#"><i class="lnr lnr-envelope"></i> J.C.Roco@hotmail.com</a></li>
                    <li><a href="#"><i class="lnr lnr-apartment"></i> Apolinar 312 col. La taquera</a></li>
                  </ul>
                </div>
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
                    <ul class="list basic_info">
                      <li><a href="#"><i class="lnr lnr-phone-handset"></i> (42) 5832 5112</a></li>
                      <li><a href="#"><i class="lnr lnr-envelope"></i> mujer_bonita@yahoo.com</a></li>
                      <li><a href="#"><i class="lnr lnr-apartment"></i> Porvenir 212 col. La arboleda</a></li>
                    </ul>
                  </div>
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
                      <ul class="list basic_info">
                        <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 4231 1242</a></li>
                        <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 5232 5231</a></li>
                        <li><a href="#"><i class="lnr lnr-envelope"></i> whitexican@gmail.com</a></li>
                        <li><a href="#"><i class="lnr lnr-apartment"></i> La nice 24 del. Benito Juarez</a></li>
                      </ul>
                    </div>
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
                      <ul class="list basic_info">
                        <li><a href="#"><i class="lnr lnr-phone-handset"></i> (54) 2341 5821</a></li>
                        <li><a href="#"><i class="lnr lnr-envelope"></i> elcaca@hotmail.com</a></li>
                        <li><a href="#"><i class="lnr lnr-apartment"></i> El roble del. Iztapalapa</a></li>
                      </ul>
                    </div>
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
                        <ul class="list basic_info">
                          <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 0092 5182</a></li>
                          <li><a href="#"><i class="lnr lnr-envelope"></i> encantadorDPerros@hotmail.com</a></li>
                          <li><a href="#"><i class="lnr lnr-apartment"></i> Popoteco Del. Zaragoza</a></li>
                        </ul>
                      </div>
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
                          <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-phone-handset"></i> (56) 3241 6481</a></li>
                            <li><a href="#"><i class="lnr lnr-envelope"></i> ElmejorbufetAbogados@mexico.com</a></li>
                            <li><a href="#"><i class="lnr lnr-apartment"></i> Homero 42 col. Polanco</a></li>
                          </ul>
                        </div>
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
                          <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-phone-handset"></i> (800) 542 6842</a></li>
                            <li><a href="#"><i class="lnr lnr-envelope"></i> inbursa@gmail.com.mx</a></li>
                            <li><a href="#"><i class="lnr lnr-apartment"></i> plateros 75, col. Plateros</a></li>
                          </ul>
                        </div>
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
                              <ul class="list basic_info">
                                <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 8632 5732</a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> mamasCal@gmail.com</a></li>
                                <li><a href="#"><i class="lnr lnr-apartment"></i> Del. Tlalpan</a></li>
                              </ul>
                            </div>
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
                                  <ul class="list basic_info">
                                    <li><a href="#"><i class="lnr lnr-phone-handset"></i> (55) 1234 7890</a></li>
                                    <li><a href="#"><i class="lnr lnr-envelope"></i> nosotros@gmail.com.mx</a></li>
                                    <li><a href="#"><i class="lnr lnr-apartment"></i> av politecnico 1652</a></li>
                                  </ul>
                                </div>
                                <div class="card-footer text-body-secondary">
                                  26 de Junio de 2024
                                  </div>
                              </div>
                        
                      </div>
  
                      

      </section>

      <footer class="w-100 conteiner-fluid bg-danger d-flex  align-items-center justify-content-center flex-wrap">
        <p class="fs-5 px-3  pt-3">C&W &copy; Todos Los Derechos Reservados 2022</p>
        <div id="iconos" >
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a> 
      </footer>
  


      
</body>
</html>

