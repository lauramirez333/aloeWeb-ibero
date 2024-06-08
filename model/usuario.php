<?php

require_once 'conexion.php';

class Usuario
{
    private ?int $id = null;
    private ?string $usuario = null;
    private ?string $contrasena = null;


    private $connection;

    public function __CONSTRUCT()
    {
        $this->connection = Database::Connect();
    }
    
    //metodos
    public function login($usuario, $Contrasena_Usuario)
    {
        try {

            // Preparar y ejecutar la consulta
            $query = $this->connection->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
           // $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
            $query->execute(array($usuario, md5($Contrasena_Usuario)));

            // Obtener y verificar el resultado
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $_SESSION['user'] = $result;
                return $result;
            } else {
                return false;
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
     * Get the value of Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of Contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of Contrasena
     *
     * @return  self
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }
}
