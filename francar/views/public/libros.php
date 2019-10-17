<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Se importa el css de materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
  <!--Deja que la pagina web sea responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/highcharts.js"></script>
  <script src="../../resources/js/modules.js"></script>

  <title>Libreria Francar</title>
</head>

<body>
  <?php
     require("../../core/helpers/public/menu.php");
     Iniciar::navigate();
  ?>
 <!-- Este es otro modal pero ahora en la opcion de contáctanos donde aparecera un formulario que automaticamente una persona deja ir un mensjae, al instante nos cae en nuestro correo electronico-->
 <div id="modal1" class="modal">
    <div class="modal-content">
      <blockquote>
        <h3 class="header lang" key="Contactanos_publica">Contactanos
          <a class="btn-floating black pulse">
            <i class="material-icons">group</i>
          </a>
        </h3>
      </blockquote>
      </blockquote>
      <hr>
      <h5>
        <p align="left" class="lang" key="Nuestros_telefonos">Nuestros telefonos son: 2121-2828 y 2277-7777
        </p>
      </h5>
      <h5>
        <p align="left" class="lang" key="Nuestro_Correo">
          Nuestro correo: libreriafrancar@gmail.com.
        </p>
      </h5>
      <hr>
      <blockquote>
    </div>
  </div>
  </div>

  <!--Con este div se crea lo que es un modal que significa que dentro de la misma pagina web va a salir uun recuadro con todo lo que 
      nosotros le queramos poner para que le de un estilo Ajax a la pagina web en este caso seria en la opcion de ¿Quiénes somos?-->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <div class="row container">
        <h2 align="center" class="lang" key="Quienes_somos">¿Quiénes somos?</h2>
        <hr>
        <blockquote>
          <h3 class="header lang" key="mision">Misión
            <a class="btn-floating black pulse">
              <i class="material-icons">group</i>
            </a>
          </h3>
        </blockquote>
        <p align="left" class="lang" key="Somos_empresa">Somos una empresa que busca fomentar la lectura en los jóvenes, apoyados de la
          ayuda de la tecnología, 
          para obtenerlos de manera más efectiva virtualmente.</p>

        <blockquote>
          <h3 class="header lang" key="Vision"  >Visión
            <a class="btn-floating black   pulse">
              <i class="material-icons">lightbulb_outline</i>
            </a>
          </h3>
        </blockquote>
        <p align="left" class="lang" key="lograr_Ser">Lograr ser la mejor librería a nivel nacional con ayuda de la tecnología.</p>
      </div>
    </div>
  </div>



  <h3 align="center" class="lang" key="Libros_Disponibles">LIBROS
    <a class="btn-floating black pulse">
      <i class="material-icons">book</i>
    </a>
  </h3>
  <!--En cada carta lleva iformacion de los libros disponibles-->
  <div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image responsive-img">
          <img src="../../resources/img/hp5.jpg" width="300" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Informacion">Informacion </h3>
          <p class="lang" key="Titulo_harry"> Título: Harry Potter y la Orden del Fenix</p>
          <br>
          <p class="lang" key="Precio_25"> Precio: $25.00</p>
          <br>
          <p class="lang" key="Editorial_sala"> Editorial: Salamandra</p>
          <br>
          <p class="lang" key="descripcion_1"> Descripcion: Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se
            encuentra
            más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está
            sucediendo
            en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus
            temores
            se vuelven realidad.</p>
          <br>
          <br>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="card-image responsive-img">
          <img src="../../resources/img/hp6.jpg" width="300" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Informacion">Informacion:</h3>
          <p class="lang" key="Titulo_harry2"> Título: Harry Potter y el misterio del principe</p>
          <br>
          <p class="lang" key="Precio_25"> Precio: $25.00</p>
          <br>
          <p class="lang" key="Editorial_sala"> Editorial: Salamandra</p>
          <br>
          <p class="lang" key="descripcion_2">Descripcion: Con dieciséis años cumplidos, Harry Potter inicia el sexto curso en Hogwarts en medio de
            terribles
            acontecimientos que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los
            exámenes
            y las chicas ocupan todo su tiempo, pero la tranquilidad dura poco. A pesar de los férreos controles de
            seguridad
            que protegen la escuela, dos alumnos son brutalmente atacados. </p>
          <br>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="card-image responsive-img">
          <img src="../../resources/img/hp7.jpg" width="300" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Informacion">Informacion</h3>
          <p class="lang" key="Titulo_harry3"> Título: Harry Potter y las reliquias de la muerte</p>
          <br>
          <p class="lang" key="Precio_25"> Precio: $25.00</p>
          <br>
          <p class="lang" key="Editorial_sala"> Editorial: Salamandra</p>
          <br>
          <p  class="lang" key="descripcion_3">Descripcion: La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento
            protector
            que lo mantiene a salvo. El anunciado enfrentamiento a muerte con lord Voldemort es inminente, y la casi
            imposible
            misión de encontrar y destruir los restantes Horrocruxes más urgente que nunca. Ha llegado la hora final, el
            momento de tomar las decisiones más difíciles. </p>
          <br>
        </div>
      </div>
    </div>
  </div>
  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <?php
  require("../../core/helpers/dashboard/footer.php");
  Footer::foot();
  ?>

  <!--Se llaman todos los archivos JavaScript-->
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/carousel.js"></script>
  <script src="../../resources/js/initialize.js"></script>
  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../core/controllers/public/account.js"></script>
  <script src="../../core/helpers/traductor.js"></script>
</body>

</html>