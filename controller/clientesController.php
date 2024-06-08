<?php

require_once 'model/clientes.php';

class ClientesController
{
    protected $clientes;

    public function __CONSTRUCT()
    {
        $this->clientes = new clientes();
    }

    public function registrarClientes()
    {
        require "view/registrarCliente.php";
    }

    public function guardarCliente()
    {
        $Nombre = $_POST['nombreCliente'];
        $identificacion = $_POST['identificacionCliente'];
        $telefono = $_POST['telefonoCliente'];
        $direccion = $_POST['direccionCliente'];
        $ciudad = $_POST['ciudadCliente'];
        $this->clientes->setNombre($Nombre);
        $this->clientes->setIdentificacion($identificacion);
        $this->clientes->setTelefono($telefono);
        $this->clientes->setDireccion($direccion);
        $this->clientes->setCiudad($ciudad);
        $idCliente = $this->clientes->registrarcliente();
        if ($idCliente) {
            header("Location: view/registrarCliente.php?success=true");
            exit();
        }
    }

    public function verClientes() {
        $clientes = $this->clientes->listarClientes(); //objet de tipo list
        require "view/verClientes.php";
    }
}