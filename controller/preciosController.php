<?php

require_once 'model/precios.php';

class PreciosController
{
    protected $precios;

    public function __CONSTRUCT()
    {
        $this->precios = new Precios();
    }

    public function registrarPrecio()
    {
        require "view/registrarPrecio.php";
    }

    public function guardarPrecio() 
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $valor = $_POST['valor'];
        $marca = $_POST['marca'];
        $this->precios->setNombre($nombre);
        $this->precios->setDescripcion($descripcion);
        $this->precios->setValor($valor);
        $this->precios->setMarca($marca);
        $idPrecio = $this->precios->registrarPrecio();
        if ($idPrecio) {
            header("Location: view/registrarPrecio.php?success=true");
            exit();
        }
    }

    public function listarPrecio() {
        $precios = $this->precios->listarPrecio(); //objet de tipo list
        require "view/verPrecios.php";
    }
}
