<?php
class Productos extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $libro = null;
	private $descripcion = null;
	private $imagen = null;
	private $ruta = '../../resources/img/productos/';
	private $autor = null;
	private $precio = null;
	private $categoria = null;
	private $editorial = null;
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

	public function setLibro($value)
	{
		if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->libro = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getLibro()
	{
		return $this->libro;
	}

	public function setDescripcion($value)
	{
		if ($this->validateAlphanumeric($value, 1, 255)) {
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

	public function getRuta()
	{
		return $this->ruta;
	}

	public function setAutor($value)
	{
		if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->autor = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAutor()
	{
		return $this->autor;
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

	public function setEditorial($value)
	{
		if ($this->validateId($value)) {
			$this->editorial = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEditorial()
	{
		return $this->editorial;
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


	//Metodos para el manejo del CRUD
	public function readLibroCategoria()
	{
		$sql = 'SELECT nombre_categoria, id_libro, id_categoria, nombre_libro, descripcion, imagen_libro, autor, precio FROM libros INNER JOIN categorias USING(id_categoria)  WHERE id_categoria = ?  AND estado = 1  ORDER BY nombre_libro';
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}

	public function readLibroEditorial()
	{
		$sql = 'SELECT nombre_editorial, id_libro, id_editorial, nombre_libro, descripcion, imagen_libro, autor, precio FROM libros INNER JOIN editoriales USING(id_editorial)  WHERE id_editorial = ?  AND estado = 1  ORDER BY nombre_libro';
		$params = array($this->editorial);
		return Database::getRows($sql, $params);
	}

	public function readProductos()
	{
		$sql = 'SELECT id_libro, nombre_libro, descripcion, imagen_libro, autor, precio, nombre_categoria, nombre_editorial, estado FROM libros INNER JOIN categorias and editoriales USING(id_categoria) and (id_editorial) WHERE id_categoria = ? AND id_editorial = ?  ORDER BY nombre_libro';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProductos($value)
	{
		$sql = 'SELECT id_libro, imagen_libro, nombre_libro, descripcion, precio, autor, nombre_categoria, nombre_editorial, estado FROM libros INNER JOIN categorias and editoriales USING(id_categoria) and (id_editorial) WHERE nombre_libro LIKE ?  ORDER BY nombre_libro';
		$params = array("%$value%", "%$value%","%$value%", "%$value%","%$value%", "%$value%","%$value%", "%$value%","%$value%");
		return Database::getRows($sql, $params);
	}

	public function readCategorias()
	{
		$sql = 'SELECT id_categoria, nombre_categoria, descripcion_categoria, imagen_categoria FROM categoria ORDER BY nombre_categoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function readEditoriales()
	{
		$sql = 'SELECT id_editorial, nombre_editorial FROM editoriales ORDER BY nombre_editorial';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createProducto()
	{
		$sql = 'INSERT INTO libros(nombre_libro, descripcion, imagen_libro, autor, precio, id_categoria, id_editorial, estado) VALUES(?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->libro, $this->descripcion, $this->imagen, $this->autor, $this->precio, $this->categoria, $this->editorial, $this->estado);
		return Database::executeRow($sql, $params);
	}

	public function getProducto()
	{
		$sql = 'SELECT id_libro, nombre_libro, descripcion, imagen_libro, autor, precio, id_categoria, id_editorial, estado FROM libros WHERE id_libro = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE libros SET nombre_libro = ?, descripcion = ?, imagen_libro = ?, autor = ?, precio = ?, id_categoria = ?, id_editorial = ?, estado = ?WHERE id_libro = ?';
		$params = array($this->libro, $this->descripcion, $this->imagen, $this->autor, $this->precio, $this->categoria, $this->editorial, $this->estado, $this->id);
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