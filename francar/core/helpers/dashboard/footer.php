<?php
  class Footer{
      public static function foot(){
            echo('
          <footer class="page-footer black">
            <div class="container">
              <div class="row">
                <div class="col s12 m6 l6">
                    <h5 class="white-text">Ubicacion:</h5>
                      <p  class="white-text text-lighten-4"> Nos ubicamos en avenida Aguilares 218, San Salvador</p>
                      <h5 class="white-text text-lighten-4"> Correo: </h5><p class="white-text text-lighten-4"> libreriafrancar@gmail.com </p>
                      <h5 class="white-text">Telefono:</h5><p class="white-text text-lighten-4">2235-2345</p>
                </div>
                <div class="col s12 m6 l6">
                      <h5 class="white-text" align="center">Redes Sociales</h5>
                      <br>
                      <br>
                      <img src="../../resources/img/facebook.png"><a class="white-text text-lighten-4"  href="https://www.facebook.com/LibreriaFrancar-2047494525551474/"  target=”_blank”> FACEBOOK </a>
                      <br>
                      <br>
                      <img src="../../resources/img/instagram.png"><a class="white-text text-lighten-4" href="https://www.instagram.com/libreriafrancar/?hl=es-la"  target=”_blank”> INSTAGRAM </a>
                </div>
              </div>
            </div>
              <div class="footer-copyright black">
                <div class="container">
                <p class="white-text text-lighten-4">© 2019 Copyright</p>
                </div>
              </div>
          </footer>
          ');
      }
  }
?>