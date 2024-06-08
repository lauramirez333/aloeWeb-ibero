<?php

require_once 'conexion.php';

class Precios
{
    private ?int $id = null;
    private ?string $nombre = null;
    private ?string $descripcion = null;
    private ?string $valor = null;
    private ?string $marca = null;


    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    //metodos
    public function registrarPrecio()
    {
        try {
            try {
                $query = "INSERT INTO precios (nombre, descripcion, marca, valor) VALUES (?,?,?,?);";
                $this->connection->prepare($query)
                    ->execute(array(
                        $this->nombre,
                        $this->descripcion,
                        $this->marca,
                        $this->valor
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

    public function listarPrecio()
    {
        try {
            try {
                // Preparar y ejecutar la consulta
                $query = $this->connection->prepare("SELECT * FROM precios");
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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }
}
