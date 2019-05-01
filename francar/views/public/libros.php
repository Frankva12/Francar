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

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper black">
        <div class="container">
          <a href="index.php" class="brand-logo"></a>
          <ul class="right hide-on-med-and-down">
            <li>
              <a class="waves-effect waves-light btn modal-trigger black" href="index.php">REGRESAR A PAGINA
                PRINCIPAL</a>
            </li>
        </div>
      </div>
    </nav>
  </div>

  <h3 align="center">LIBROS
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
          <h3 align="center">Informacion</h3>
          <p> Título: Harry Potter y la Orden del Fenix</p>
          <br>
          <p> Precio: $25.00</p>
          <br>
          <p> Editorial: Salamandra</p>
          <br>
          <p> Descripcion: Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se
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
          <h3 align="center">Informacion:</h3>
          <p> Título: Harry Potter y el misterio del principe</p>
          <br>
          <p> Precio: $25.00</p>
          <br>
          <p> Editorial: Salamandra</p>
          <br>
          <p>Descripcion: Con dieciséis años cumplidos, Harry Potter inicia el sexto curso en Hogwarts en medio de
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
          <h3 align="center">Informacion</h3>
          <p> Título: Harry Potter y las reliquias de la muerte</p>
          <br>
          <p> Precio: $25.00</p>
          <br>
          <p> Editorial: Salamandra</p>
          <br>
          <p>Descripcion: La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento
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
  require("../../resources/pages/footer.php");
  Footer::foot();
  ?>

  <!--Se llaman todos los archivos JavaScript-->
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/carousel.js"></script>
  <script src="../../resources/js/initialize.js"></script>
</body>

</html>