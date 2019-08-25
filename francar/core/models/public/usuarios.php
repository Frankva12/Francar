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


	//Metodos para manejar el CRUD
	public function readUsuarios()
	{
		$sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, alias_cliente, direccion, telefono, estado FROM clientes ORDER BY nombre_cliente';
		$params = array(null);
		return Database::getRows($sql, $params);
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