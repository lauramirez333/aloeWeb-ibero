<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #c2c2c2;
            height: 100%;
        }

        .container-fluid {
            background-color: #BFF7DC;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }

        .nav-pills>li.active>a,
        .nav-pills>li.active>a:focus,
        .nav-pills>li.active>a:hover {
            background-color: #808080;
            /* Color de fondo gris */
            color: white;
            /* Color del texto */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Aloe</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="?c=ventas&a=registrarVenta">Registrar venta</a></li>
                    <li><a href="#">Ver ventas</a></li>
                    <li><a href="#">Registrar precio</a></li>
                    <li><a href="?c=precios&a=listarPrecio">Ver lista de precios</a></li>
                    <li><a href="?c=clientes&a=registrarClientes">Registrar cliente</a></li>
                    <li><a href="?c=clientes&a=verClientes">Ver clientes</a></li>
                    <li><a href="view/logout.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Aloe</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li ><a href="?c=ventas&a=registrarVenta">Registrar ventas</a></li>
                    <li><a href="?c=ventas&a=verVenta">Ver ventas</a></li>
                    <li><a href="?c=precios&a=registrarPrecio">Registrar precio</a></li>
                    <li><a href="?c=precios&a=listarPrecio">Ver lista de precios</a></li>
                    <li class="active"><a href="?c=clientes&a=registrarClientes">Registrar cliente</a></li>
                    <li><a href="?c=clientes&a=verClientes">Ver clientes</a></li>
                    <li><a href="view/logout.php">Cerrar Sesión</a></li>
                </ul><br>
            </div>
            <br>
            <br>
            <!-- AQUI VA EL CONTAINER -->
            <form action="?c=clientes&a=guardarCliente" method="post">
                    <label for="nombreCliente">Cliente</label>
                    <input name="nombreCliente" type="text" id="nombreCliente" placeholder="Nombre Cliente">

                    <label for="identificacionCliente">Identificación del Cliente</label>
                    <input name="identificacionCliente" type="text" id="identificacionCliente" placeholder="Documento">
                    <br>
                    <label for="telefonoCliente">Telefono</label>
                    <input name="telefonoCliente" type="text" id="telefonoCliente" placeholder="Numero Telefonico">

                    <label for="direccionCliente">Direccion</label>
                    <input name="direccionCliente" type="text" id="direccionCliente" placeholder="Direccion del cliente">
                    
                    <label for="ciudadCliente">Ciudad</label>
                    <input name="ciudadCliente" type="text" id="ciudadCliente" placeholder="Ciudad del cliente">
                    <br>
                    <button type="submit" class="btn btn-default">Registrar</button>
            </form>
            <!-- AQUI VA EL CONTAINER -->
        </div>
    </div>
    </div>
    <?php if (isset($_GET['success']) && $_GET['success'] == 'true'): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Registro exitoso!',
                text: 'El cliente se ha registrado correctamente.',
                confirmButtonText: 'Aceptar'
                
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../?c=clientes&a=registrarClientes';
                }
            });
        </script>
    <?php endif; ?>
</body>

</html>