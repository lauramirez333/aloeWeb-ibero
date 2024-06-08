<?php

require_once 'conexion.php';

class Ventas
{
    private ?int $id = null;
    private ?string $cliente = null;
    private ?string $producto = null;
    private ?string $direccion = null;
    private ?string $fecha = null;


    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    //metodos
    public function registrarVenta()
    {
        try {
            try {
                $query = "INSERT INTO ventas (cliente, producto, fecha, direccion) VALUES (?,?,?,?);";
                $this->connection->prepare($query)
                    ->execute(array(
                        $this->cliente,
                        $this->producto,
                        $this->fecha,
                        $this->direccion
                    )); //esto funciona bien hasta aca lo de abajo es solo otra forma de hacerlo para devolver el id
                $this->id = $this->connection->lastInsertId();
                return $this;
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function listarVenta()
    {
        try {
            try {
                // Preparar y ejecutar la consulta
                $query = $this->connection->prepare("SELECT * FROM ventas");
                $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);

                // Obtener y verificar el resultado
                $query->execute();
                return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    //getters y setters


    /**
     * Get the value of Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Cliente
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of Cliente
     *
     * @return  self
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of Producto
     *
     * @return  self
     */
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get the value of Fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of Fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of Direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of Direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }
}
