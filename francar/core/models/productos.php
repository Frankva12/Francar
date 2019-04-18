<?php
class Productos extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $nombre = null;
	private $descripcion = null;
	private $precio = null;
	private $imagen = null;
	private $categoria = null;
	private $estado = null;
	private $ruta = '../../resources/img/productos/';

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
		if ($this->validateAlphanumeric($value, 1, 50)) {
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
		if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->descripcion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setPrecio($value)
	{
		if ($this->validateMoney($value)) {
			$this->precio = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPrecio()
	{
		return $this->precio;
	}

	public function setImagen($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->imagen = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getImagen()
	{
		return $this->imagen;
	}

	public function setCategoria($value)
	{
		if ($this->validateId($value)) {
			$this->categoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCategoria()
	{
		return $this->categoria;
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

	public function getRuta()
	{
		return $this->ruta;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function setAutor(){
		return $this->autor;
	}

	public function getEditorial(){
		return $this->autor;
	}

	public function setEditorial(){
		return $this->autor;
	}

	//Metodos para el manejo del CRUD
	public function readProductosCategoria()
	{
		$sql = 'SELECT nombre_categoria, id_producto, id_categoria, id_editorial, nombre_libro, descripcion, imagen_libro, autor, precio FROM productos INNER JOIN categorias and editoriales USING(id_categoria) and (id_editorial) WHERE id_categoria = ? AND id_editoriales = ? AND estado = 1  ORDER BY nombre_libro';
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}

	public function readProductos()
	{
		$sql = 'SELECT id_libro, imagen_libro, nombre_libro, descripcion, precio, estado FROM productos INNER JOIN categorias and editoriales USING(id_categoria) and (id_editoriales) ORDER BY nombre_libro';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function readCategorias()
	{
		$sql = 'SELECT id_categoria, nombre_categoria, imagen_categoria, descripcion_categoria FROM categorias';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function readEditoriales()
	{
		$sql = 'SELECT id_editorial, nombre_editorial FROM editoriales';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createProducto()
	{
		$sql = 'INSERT INTO libros(id_editorial, id_categoria, nombre_libro, descripcion, precio, imagen_libro, estado) VALUES(?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria);
		return Database::executeRow($sql, $params);
	}

	public function getProducto()
	{
		$sql = 'SELECT id_libro, nombre_libro, descripcion, precio, imagen_libro, id_categoria, id_editorial, estado FROM productos WHERE id_libro = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE libros SET nombre_libro = ?, descripcion = ?, precio = ?, imagen_libro = ?, estado = ?, id_categoria = ?, id_editoriales = ? WHERE id_producto = ?';
		$params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto()
	{
		$sql = 'DELETE FROM libros WHERE id_libro = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
