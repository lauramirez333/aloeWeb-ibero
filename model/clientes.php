<?php

require_once 'conexion.php';

class clientes
{
    private ?int $id = null;
    private ?string $Nombre = null;
    private ?string $identificacion = null;
    private ?string $telefono = null;
    private ?string $direccion = null;
    private ?string $ciudad = null;


    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }

    //metodos
    public function registrarcliente()
    {
        try {
            try {
                $query = "INSERT INTO clientes (Nombre, identificacion, telefono, direccion, ciudad) VALUES (?,?,?,?,?);";
                $this->connection->prepare($query)
                    ->execute(array(
                        $this->Nombre,
                        $this->identificacion,
                        $this->telefono,
                        $this->direccion,
                        $this->ciudad
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

    public function listarClientes()
    {
        try {
            try {
                // Preparar y ejecutar la consulta
                $query = $this->connection->prepare("SELECT * FROM clientes");
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
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }
    /**
     * Get the value of Cliente
     */
    public function getNombre()
    {
        return $this->Nombre;
    }
    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    /**
     * Set the value of Cliente
     *
     * @return  self
     */
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get the value of Producto
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of Producto
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of Fecha
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of Fecha
     *
     * @return  self
     */
 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of Fecha
     *
     * @return  self
     */
 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }
}
