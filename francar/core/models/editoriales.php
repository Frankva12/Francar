<?php
class Editoriales extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombreEd = null;

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

	public function setNombreEditorial($value)
	{
		if($this->validateAlphanumeric($value, 1, 100)) {
			$this->nombreEd = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombreEditorial()
	{
		return $this->nombreEd;
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
		$params = array($this->nombreEd);
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
		$params = array($this->nombreEd, $this->id);
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
