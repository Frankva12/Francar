<?php
class Libros extends Validator
{
	//Declaración de propiedades
	private $id = null;
	private $id_ed = null;
	private $nombre = null;
	private $descripcion = null;
	private $imagen = null;
	private $ruta = '../../../resources/img/libros/';
	private $autor = null;
	private $precio = null;
	private $categoria = null;
	private $editorial = null;
	private $estado = null;
	private $libro = null;
	private $cantidad = null;

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

	public function setId_ed($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId_ed()
	{
		return $this->id;
	}

	public function setNombre($value)
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

	public function setCantidad($value)
	{
		if ($this->validateId($value)) {
			$this->cantidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCantidad()
	{
		return $this->cantidad;
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
		$sql = 'SELECT id_categoria, nombre_categoria from categoria';
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}

	public function readLibroEditorial()
	{
		$sql = 'SELECT id_editorial, nombre_editorial from editoriales';
		$params = array($this->editorial);
		return Database::getRows($sql, $params);
	}

	public function readLibros()
	{
		$sql = 'SELECT id_libro, nombre_libro, descripcion, imagen_libro, autor, precio, cantidad, categoria.nombre_categoria, editoriales.nombre_editorial, estado FROM libros INNER JOIN categoria USING(id_categoria) INNER JOIN editoriales USING(id_editorial) ORDER BY nombre_libro';
		$params = array(null);
		return Database::getRows($sql, $params);
	}


	public function createlibros()
	{
		$sql = 'INSERT INTO libros(nombre_libro, descripcion, imagen_libro, autor, precio, id_categoria, id_editorial, estado, cantidad) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->libro, $this->descripcion, $this->imagen, $this->autor, $this->precio, $this->categoria, $this->editorial, $this->estado, $this->cantidad);
		return Database::executeRow($sql, $params);
	}

	public function getlibros()
	{
		$sql = 'SELECT id_libro, nombre_libro, descripcion, imagen_libro, autor, precio, id_categoria, id_editorial, estado, cantidad FROM libros WHERE id_libro = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updatelibros()
	{
		$sql = 'UPDATE libros SET nombre_libro = ?, descripcion = ?, imagen_libro = ?, autor = ?, precio = ?, id_categoria = ?, id_editorial = ?, estado = ?, cantidad = ? WHERE id_libro = ?';
		$params = array($this->libro, $this->descripcion, $this->imagen, $this->autor, $this->precio, $this->categoria, $this->editorial, $this->estado, $this->cantidad, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deletelibros()
	{
		$sql = 'DELETE FROM libros WHERE id_libro = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
	
	public function cantidad_libros_editoriales()
	{
		$sql = 'SELECT SUM(cantidad) as cantidad, nombre_editorial from libros INNER JOIN editoriales USING (id_editorial) where estado = 1 GROUP BY nombre_editorial';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function cantidad_libros_categorias()
	{
		$sql = 'SELECT SUM(cantidad) as cantidad, nombre_categoria from libros INNER JOIN categoria USING (id_categoria) where estado = 1 GROUP BY nombre_categoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
?>
