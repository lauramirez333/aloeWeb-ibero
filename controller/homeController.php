<?php
class HomeController
{
    protected $usuario;

    public function __CONSTRUCT()
    {
        $this->usuario = new Usuario();
    }

    public function index($errorMessage = null)
    {
        require "view/login.php";
    }

    public function login()
    {
        $data = $_POST;

        try {
            $respuesta = $this->usuario->login($data['usuario'], $data['contrasena']);

            if ($respuesta) {
                require "view/dashboard.php";
            } else {
                $this->index("Credenciales incorrectas.");
            }
        } catch (Exception $e) {
            $this->index("Error: " . $e->getMessage());
        }
    }

    function test()
    {
        var_dump(Database::Connect());
    }
}
?>

