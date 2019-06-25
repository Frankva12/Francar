<?php
  class inicio{
      public static function navigate(){
        session_start();
        if (isset($_SESSION['id_administrador'])) {
          $filename = basename($_SERVER['PHP_SELF']);
          if ($filename != 'index.php') {
            self::modals();
            print('

            <div class="navbar-fixed col s6 m12 l12"">
            <nav>
              <div class="nav-wrapper black">
                <div class="container">
                  <a href="private.php" class="brand-logo"></a>
                  <ul class="right hide-on-med-and-down">
                    <!--Opciones del menu-->
                    <li><a class="waves-effect waves-light btn modal-trigger black" href="private.php">Estadisticas</a></li>
                    <li><a class="waves-effect waves-light btn modal-trigger black" href="libros.php">libros</a></li>
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="editoriales.php">Editoriales</a></li>
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="categorias.php">Categorias</a></li>
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="usuarios.php">Usuarios</a></li>  
                    <li> <a class="waves-effect waves-light btn modal-trigger black" href="#" onclick="signOff()" > <i class="material-icons">settings_power</i></a> 
                    </nav> 
              </div>
          </div>
      </div>');
    } else {
      header('location: ../../views/index.php');
    }
  } else {
    $filename = basename($_SERVER['PHP_SELF']);
    if ($filename != 'index.php' && $filename != 'register.php') {
      header('location: index.php');
    } else {
      print('
        <header>
          <div class="navbar-fixed">
            <nav class="teal">
              <div class="nav-wrapper">
                <a href="index.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
              </div>
            </nav>
          </div>
        </header>
        <main class="container">
          <h3 class="center-align">'.$title.'</h3>
      ');
    }
  }
}

private function modals()
	{
		print('
			<div id="modal-profile" class="modal">
				<div class="modal-content">
					<h4 class="center-align">Editar perfil</h4>
					<form method="post" id="form-profile">
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person</i>
								<input id="profile_nombres" type="text" name="profile_nombres" class="validate" required/>
								<label for="profile_nombres">Nombres</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person</i>
								<input id="profile_apellidos" type="text" name="profile_apellidos" class="validate" required/>
								<label for="profile_apellidos">Apellidos</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">email</i>
								<input id="profile_correo" type="email" name="profile_correo" class="validate" required/>
								<label for="profile_correo">Correo</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">person_pin</i>
								<input id="profile_alias" type="text" name="profile_alias" class="validate" required/>
								<label for="profile_alias">Alias</label>
							</div>
						</div>
						<div class="row center-align">
							<a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
							<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
						</div>
					</form>
				</div>
			</div>
			<div id="modal-password" class="modal">
				<div class="modal-content">
					<h4 class="center-align">Cambiar contraseña</h4>
					<form method="post" id="form-password">
						<div class="row center-align">
							<label>CLAVE ACTUAL</label>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_actual_1" type="password" name="clave_actual_1" class="validate" required/>
								<label for="clave_actual_1">Clave</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_actual_2" type="password" name="clave_actual_2" class="validate" required/>
								<label for="clave_actual_2">Confirmar clave</label>
							</div>
						</div>
						<div class="row center-align">
							<label>CLAVE NUEVA</label>
						</div>
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
								<label for="clave_nueva_1">Clave</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">security</i>
								<input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
								<label for="clave_nueva_2">Confirmar clave</label>
							</div>
						</div>
						<div class="row center-align">
							<a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
							<button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Cambiar"><i class="material-icons">save</i></button>
						</div>
					</form>
				</div>
			</div>
		');
	}
  }
?>