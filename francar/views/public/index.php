<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Con esta etiqueta de link se importa lo que es materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
  <!--Esta etiqueta de meta permite que la pagina web sea responsive, o sea que segun el dispositivo en el cual se navegue la pagina se adecua perfectamente el diseño-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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


  <!--Con esta primer etiqueta div se hizo lo que es un slider que contiene 4 imagenes que se van mostrando automaticamente cada 4 segundos-->
  <div class="carousel carousel-slider center">
    <div class="carousel-fixed-item center">
    </div>
    <div class="carousel-item red white-text" href="#one!">
      <img src="../../resources/img/slider.jpg">
    </div>
    <div class="carousel-item amber white-text" href="#two!">
      <img src="../../resources/img/slider2.jpg">
    </div>
    <div class="carousel-item green white-text" href="#three!">
      <img src="../../resources/img/slider3.jpg">
    </div>
    <div class="carousel-item blue white-text" href="#four!">
      <img src="../../resources/img/slider4.jpg">
    </div>
  </div>
  <!--Esta es la seccion de los libros recien llegados, donde el cliente puede visualizar los nuevos libros que tenemos disponibles con su respectivo resumen-->
  <h2 align="center" class="lang" key="Libros_Recien"> LIBROS RECIEN INGRESADOS</h2>
  <div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image responsive-img">
          <img src="../../resources/img/hp5.jpg" width="200" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="carrito.php">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Sintesis">Sintesis</h3>
          <p class="lang" key="Las_tediosas">Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más
            inquieto
            que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en
            Hogwarts.
            En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se
            vuelven
            realidad. </p>
          <br>
          <br>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="card-image responsive-img">
          <img src="../../resources/img/hp6.jpg" width="200" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="carrito.php">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Sintesis">Sintesis</h3>
          <p class="lang" key="Hogwards">Con dieciséis años cumplidos, Harry Potter inicia el sexto curso en Hogwarts en medio de terribles
            acontecimientos
            que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los exámenes y las
            chicas
            ocupan todo su tiempo, pero la tranquilidad dura poco.</p>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="card-image responsive-img">
          <img src="../../resources/img/hp7.jpg" width="200" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="carrito.php">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Sintesis">>Sintesis</h3>
          <p class="lang" key="Fecha_Crucial">La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento protector que lo
            mantiene
            a salvo. El anunciado enfrentamiento a muerte con lord Voldemort es inminente, y la casi imposible misión de
            encontrar y destruir los restantes Horrocruxes más urgente que nunca.</p>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
  <!--Esta etiqueta contiene el codigo para que en una seccion de la pagina haya una imagen con un efecto parallax que esto significa que la imagen se va moviendo conforme el usuario vaya bajando o subiendo-->
  <div class="parallax-container">
    <div class="parallax">
      <img src="../../resources/img/biblioteca.jpg">
    </div>
  </div>

  <!--Aqui esta otra seccion de la pagina web donde se mostraran las categorias de los libros en unas tarjetas con una imagen alusiva y la descripcion de esa categoria-->
  <a name="categorias"></a>
  <h2 align="center" class="header lang" key="Categorias">Categorias.
    <a class="btn-floating black pulse" id>
      <i class="material-icons">book</i>
    </a>
  </h2>
  <div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image responsive-img">
          <img src="../../resources/img/g21.jpg" width="300" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="carrito.php">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Misterio">Misterio</h3>
          <p class="lang" key="Novela">El término novela de misterio a menudo es utilizado como sinónimo de novela de detective o novela de
            crimen, es
            decir, una novela o cuento en la cual un detective (profesional o aficionado) investiga y resuelve un
            misterio
            criminal. </p>
          <br>
          <br>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="card-image responsive-img">
          <img src="../../resources/img/g31.jpg" width="300" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="carrito.php">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center" class="lang" key="Aventura">Aventura</h3>
          <p class="lang" key="Origenes">Se considera que los orígenes del género de aventuras se encuentran en La Odisea y en La Ilíada de Homero
            (siglo
            VIII a. d C.) y, por ende, en la épica clásica. En la primera, el héroe Ulises lucha por volver a su hogar
            en
            Ítaca tras la Guerra de Troya. He aquí el viaje iniciático del protagonista que será la base para las
            futuras
            aventuras narrativas. </p>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card ">
        <div class="card-image responsive-img">
          <img src="../../resources/img/g41.jpg" width="300" height="300">
          <span class="card-title"></span>
          <a class="btn-floating halfway-fab waves-effect waves-light red" href="carrito.php">
            <i class="material-icons">add_shopping_cart</i>
          </a>
        </div>
        <div class="card-content">
          <h3 align="center">Terror</h3>
          <p class="lang" key="Literatura_terror">La Literatura de terror es un género de ficción literario que pretende o tiene la capacidad de asustar,
            causar
            miedo o aterrorizar sus lectores o espectadores en inducir sentimientos de horror y terror. </p>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <h4 class="center blue-text" id="title"></h4>
    <div class="row" id="catalogo"></div>
  </div>


</body>
<!--Aqui esta la seccion del pie de pagina donde lleva nuestra informacion de la tienda-->
<?php
  require("../../core/helpers/dashboard/footer.php");
  Footer::foot();
  ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--Se importan lo que son los archivos de JavaScript-->
<script src="../../resources/js/jquery-3.3.1.min.js"></script>
<script src="../../resources/js/materialize.min.js"></script>
<script src="../../resources/js/initialize.js"></script>
<script src="../../resources/js/carousel.js"></script>
<script src="../../resources/js/parallax.js"></script>
<script src="../../resources/js/modal.js"></script>
<script src="../../resources/js/sweetalert.min.js"></script>
<script src="../../core/helpers/traductor.js"></script>
<script src="../../core/controllers/public/account.js"></script>

</html>