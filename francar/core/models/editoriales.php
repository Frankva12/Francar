<?php
class Editoriales extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $descripcion = null;

	//Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;z
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombre($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
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

	public function setDescripcion($value)
	{
		if ($value) {
			if ($this->validateAlphanumeric($value, 1, 200)) {
				$this->descripcion = $value;
				return true;
			} else {
				return false;
			}
		} else {
			$this->descripcion = null;
			return true;
		}
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	//Metodos para el manejo del CRUD
	public function readEditoriales()
	{
		$sql = 'SELECT id_editorial, nombre_editorial FROM editoriales ORDER BY nombre_editorial';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchEditoriales($value)
	{
		$sql = 'SELECT * FROM editoriales WHERE nombre_editorial LIKE ?  ORDER BY nombre_editorial';
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createEditorial()
	{
		$sql = 'INSERT INTO editoriales(nombre_editorial) VALUES(?)';
		$params = array($this->nombre);
		return Database::executeRow($sql, $params);
	}

	public function getEditorial()
	{
		$sql = 'SELECT id_editorial, nombre_editorial FROM editoriales WHERE id_editorial = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateEditorial()
	{
		$sql = 'UPDATE editoriales SET nombre_editorial = ? WHERE id_editorial = ?';
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteEditorial()
	{
		$sql = 'DELETE FROM editoriales WHERE id_editorial = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
