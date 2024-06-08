<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

require_once 'model/ventas.php';

class VentasController
{
    protected $ventas;

    public function __CONSTRUCT()
    {
        $this->ventas = new Ventas();
    }

    public function registrarVenta()
    {
        require "view/registrarVenta.php";
    }

    public function guardarVenta()
    {
        $cliente = $_POST['cliente'];
        $producto = $_POST['producto'];
        $fecha = $_POST['fecha'];
        $direccion = $_POST['direccion'];
        $this->ventas->setCliente($cliente);
        $this->ventas->setProducto($producto);
        $this->ventas->setFecha($fecha);
        $this->ventas->setDireccion($direccion);
        $idVenta = $this->ventas->registrarVenta();
        if ($idVenta) {
        
            header("Location: view/registrarVenta.php?success=true");
            exit();
   
        }
    }

    public function verVenta() {
        $ventas = $this->ventas->listarVenta(); //objet de tipo list
        require "view/verVenta.php";
    }
}
