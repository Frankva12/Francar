<?php
class Bitacora extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $fecha = null;
	private $accion = null;


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

	public function setFecha($value)
	{
		if ($this->validateAlphabetic($value, 1, 255)) {
			$this->fecha = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setAccion($value)
	{
		if ($this->validateAlphabetic($value, 1, 255)) {
			$this->accion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAccion()
	{
		return $this->accion;
	}
	


	//Metodos para manejar el CRUD
	public function readBitacora()
	{
		$sql = 'SELECT fecha, accion FROM bitacora ORDER BY fecha';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
?>