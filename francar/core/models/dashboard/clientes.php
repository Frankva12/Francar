<?php
class Clientes extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $apellido = null;
	private $alias = null;
	private $direccion = null;
	private $telefono = null;
	

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

	//Metodos para manejar el CRUD
	public function readClientes()
	{
		$sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, alias_cliente, direccion, telefono FROM clientes ORDER BY nombre_cliente';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
?>