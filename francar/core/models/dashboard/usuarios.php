<?php
class Usuarios extends Validator

{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $apellido = null;
	private $alias = null;
	private $contrasenia = null;
	private $direccion = null;
	private $telefono = null;
	private $correo = null;
	private $estado = null;
	private $token = null;

	//Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setToken($value)
	{
		$this->token = $value;
		return true;
	}

	public function getToken()
	{
		return $this->token;
	}

	public function setEstado($value)
	{
		if ($value == '1' || $value == '0') {
			$this->estado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function setNombre($value)
	{
		if ($this->validateAlphabetic($value, 1, 255)) {
			$this->nombre = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setApellido($value)
	{
		if ($this->validateAlphabetic($value, 1, 255)) {
			$this->apellido = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellido()
	{
		return $this->apellido;
	}
	
	public function setAlias($value)
	{
		if ($this->validateAlphanumeric($value, 1, 255)) {
			$this->alias = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function setContrasenia($value)
	{
		if ($this->validatePassword($value)) {
			$this->contrasenia = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getContrasenia()
	{
		return $this->contrasenia;
	}


	public function setDireccion($value)
	{
		if ($this->validateAlphabetic($value, 1, 255)) {
			$this->direccion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setTelefono($value)
	{
		if ($this->validateAlphanumeric($value, 1, 255)) {
			$this->telefono = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTelefono()
	{
		return $this->telefono;
	}


	public function setCorreo($value)
	{
		if ($this->validateEmail($value)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
	}


	//Métodos para manejar la sesión del usuario
	public function checkAlias()
	{
		$sql ='SELECT id_administrador FROM administrador WHERE alias_usuario = ?';
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id_administrador'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasenia FROM administrador WHERE id_administrador = ?  and estado = 1';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->contrasenia, $data['contrasenia'])) {
			return true;
		} else {
			return false;
		}
	}

	public function changePassword()
	{
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = 'UPDATE administrador SET contrasenia = ? WHERE id_administrador = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}


	//Metodos para manejar el CRUD
	public function readUsuarios()
	{
		$sql = 'SELECT id_administrador, nombre_administrador, apellido_administrador, alias_usuario, direccion, telefono, correo, estado FROM administrador ORDER BY nombre_administrador';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	
	//Metodos para manejar el CRUD
	public function Correo_contra()
	{
		$sql = 'SELECT id_administrador FROM administrador where correo = ? LIMIT 1';
		$params = array($this->correo);
		return Database::getRows($sql, $params);
	}

	public function updateToken()
	{
		$sql = 'UPDATE administrador SET token_usuario = ? WHERE correo = ?';
		$params = array($this->token, $this->correo);
		return Database::executeRow($sql, $params);
	}


	//Metodos para manejar el CRUD
	public function bloquearUsuario()
	{
		$sql = 'UPDATE administrador SET estado = ? WHERE alias_usuario = ?';
		$params = array(0, $this->alias);
		return Database::executeRow($sql, $params);
	}

	public function createUsuario()
	{
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO administrador(nombre_administrador, apellido_administrador, alias_usuario, contrasenia, direccion, telefono, correo, estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido, $this->alias, $hash, $this->direccion, $this->telefono, $this->correo, 1);
		return Database::executeRow($sql, $params);
	}


	public function getUsuario()
	{
		$sql = 'SELECT id_administrador, nombre_administrador, apellido_administrador, alias_usuario, direccion, telefono, correo, estado FROM administrador WHERE id_administrador = ? LIMIT 1';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE administrador SET nombre_administrador = ?, apellido_administrador = ?, alias_usuario = ?, direccion = ?, telefono = ?, correo = ?, estado = ?  WHERE id_administrador = ?';
		$params = array($this->nombre, $this->apellido, $this->alias, $this->direccion, $this->telefono, $this->correo, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM administrador WHERE id_administrador = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

}
?>