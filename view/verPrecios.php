<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    
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
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
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
                    <li><a href="?c=ventas&a=verVenta">Ver ventas</a></li>
                    <li><a href="?c=precios&a=registrarPrecio">Registrar precio</a></li>
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
                    <li class="active"><a href="?c=precios&a=listarPrecio">Ver lista de precios</a></li>
                    <li><a href="?c=clientes&a=registrarClientes">Registrar cliente</a></li>
                    <li><a href="?c=clientes&a=verClientes">Ver clientes</a></li>
                    <li><a href="view/logout.php">Cerrar Sesión</a></li>
                </ul><br>
            </div>
            <div class="col-sm-9">
                <h2>Lista de Precios</h2>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Valor</th>
                            <th>Marca</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($precios as $precio): ?>
                        <tr>
                            <td><?= $precio->getNombre() ?></td>
                            <td><?= $precio->getDescripcion() ?></td>
                            <td><?= $precio->getValor() ?></td>
                            <td><?= $precio->getMarca() ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
