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

	public function setToken($value)
	{
		$this->token = $value;
		return true;
	}

	public function getToken()
	{
		return $this->token;
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
	 	$validator = $this->validatePassword($value);
		if ($validator[0]) {
			$this->contrasenia = $value;
			return array(true, '');
		} else {
			return array(false, $validator[1]);
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
		$sql ='SELECT id_cliente FROM clientes WHERE alias_cliente = ?';
		$params = array($this->alias);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['id_cliente'];
			return true;
		} else {
			return false;
		}
	}

	public function checkPassword()
	{
		$sql = 'SELECT contrasenia FROM clientes WHERE id_cliente = ?  and estado = 1';
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
		$sql = 'UPDATE clientes SET contrasenia = ? WHERE id_cliente = ?';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function Correo_contraCliente()
	{
		$sql = 'SELECT id_cliente FROM clientes where correo = ? LIMIT 1';
		$params = array($this->correo);
		return Database::getRows($sql, $params);
	}

	public function updateTokenCliente()
	{
		$sql = 'UPDATE clientes SET token_cliente = ? WHERE correo = ?';
		$params = array($this->token, $this->correo);
		return Database::executeRow($sql, $params);
	}

	public function getDatosToken()
	{
		$sql = 'SELECT id_cliente FROM clientes WHERE token_cliente = ?';
		$params = array($this->token);
		$datos = Database::getRow($sql, $params);
	}

	public function tokenPass()
	{
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = 'UPDATE clientes SET contrasenia = ? WHERE token_cliente = ?';
		$params = array($hash, $this->token);
		return Database::executeRow($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function readUsuarios()
	{
		$sql = 'SELECT * FROM clientes ORDER BY nombre_cliente';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function Intentos()
	{
		$sql = 'UPDATE clientes SET intentos = intentos + 1 WHERE alias_cliente = ?';
		$params = array($this->alias);
		return Database::executeRow($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function BloquearIntentos()
	{
		$sql = 'UPDATE clientes SET estado = 0, intentos = 0 WHERE alias_cliente = ? and intentos >= 3';
		$params = array($this->alias);
		return Database::executeRow($sql, $params);
	}

	//Metodos para manejar el CRUD
	public function UpdateLogin()
	{
		$sql = 'UPDATE clientes SET intentos = 0';
		$params = array(null);
		return Database::executeRow($sql, $params);
	} 


	//Metodos para manejar el CRUD
	public function bloquearUsuario()
	{
		$sql = 'UPDATE clientes SET estado = ? WHERE alias_cliente = ?';
		$params = array(0, $this->alias);
		return Database::executeRow($sql, $params);
	}

	public function createUsuario()
	{
		$hash = password_hash($this->contrasenia, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO clientes(nombre_cliente, apellido_cliente, alias_cliente, contrasenia, direccion, telefono, correo, estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->apellido, $this->alias, $hash, $this->direccion, $this->telefono, $this->correo, 1);
		return Database::executeRow($sql, $params);
	}


	public function getUsuario()
	{
		$sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, alias_cliente, contraseña, direccion, telefono, correo, estado FROM clientes WHERE id_cliente = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE cliente SET nombre_cliente = ?, apellido_cliente = ?, alias_cliente = ?, direccion = ?, telefono = ?, correo = ?, estado = ?  WHERE id_cliente = ?';
		$params = array($this->nombre, $this->apellido, $this->alias, $this->direccion, $this->telefono, $this->correo, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM cliente WHERE id_cliente = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>