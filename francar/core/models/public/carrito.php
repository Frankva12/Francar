<?php
class Carrito extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $libro= null;
	private $cliente = null;
	private $cantidad = null;
    private $precio = null;
    private $imagen = null;
	private $ruta = '../../../resources/img/carrito/';

	// Métodos para sobrecarga de propiedades
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
		if ($this->validateId($value)) {
			$this->libro = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getLibro()
	{
		return $this->categoria;
    }
    


    public function setCliente($value)
	{
		if ($this->validateId($value)) {
			$this->cliente = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCliente()
	{
		return $this->cliente;
	}
	
	
    
	public function setCantidad($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
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

	public function getRuta()
	{
		return $this->ruta;
	}

	//Metodos para el manejo del SCRUD
	public function readProductosCategoria()
	{
		$sql = 'SELECT nombre_categoria, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto FROM productos INNER JOIN categorias USING(id_categoria) WHERE id_categoria = ? AND estado_producto = 1 ORDER BY nombre_producto';
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}

	public function readProductos()
	{
		$sql = 'SELECT id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto, nombre_categoria, estado_producto FROM productos INNER JOIN categorias USING(id_categoria) ORDER BY nombre_producto';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function getProducto()
	{
		$sql = 'SELECT id_producto, nombre_producto, descripcion_producto, precio_producto, imagen_producto, id_categoria, estado_producto FROM productos WHERE id_producto = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
    }
    
    public function createProducto()
	{
		$sql = 'INSERT INTO productos(nombre_producto, descripcion_producto, precio_producto, imagen_producto, estado_producto, id_categoria) VALUES(?, ?, ?, ?, ?, ?)';
		$params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria);
		return Database::executeRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE productos SET nombre_producto = ?, descripcion_producto = ?, precio_producto = ?, imagen_producto = ?, estado_producto = ?, id_categoria = ? WHERE id_producto = ?';
		$params = array($this->nombre, $this->descripcion, $this->precio, $this->imagen, $this->estado, $this->categoria, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto()
	{
		$sql = 'DELETE FROM compra WHERE id_compra = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
