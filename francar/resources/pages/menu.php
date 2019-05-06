<?php
  class inicio{
      public static function navigate(){
            echo('
            <div class="navbar-fixed col s6 m12 l12"">
            <nav>
              <div class="nav-wrapper black">
                <div class="container">
                  <a href="private.php" class="brand-logo"></a>
                  <ul class="right hide-on-med-and-down">
                    <!--Opciones del menu-->
                    <li><a class="waves-effect waves-light btn modal-trigger black" href="private.php">Estadisticas</a></li>
                    <li><a class="waves-effect waves-light btn modal-trigger black" href="productos.php">Productos</a></li>
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="editoriales.php">Editoriales</a></li>
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="categorias.php">Categorias</a></li>
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="usuarios.php">Usuarios</a></li>  
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="index.php"> <i class="material-icons">settings_power</i></a> 
                    </nav> 
              </div>
          </div>
      </div>');
      }
  }
?>