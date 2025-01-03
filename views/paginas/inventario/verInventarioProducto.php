<!-- Begin Page Content -->

<?php

$id_producto = $_GET['id'];


require_once 'controllers/RolesController.php';
require_once 'models/InventarioModel.php';

$objeto                 = new RolesController();
$modelInventario = new InventarioModel();

$producto = $modelInventario->verInventarioProducto($id_producto);





$roles                  = $objeto->listaRoles();
$roles_update           = $objeto->listaRoles();


if (session_status() === PHP_SESSION_ACTIVE) {
    //echo "La sesión está activa.";
    $usuario            = $_SESSION['usuario'];
    $id_usuario         = $_SESSION['user_id'];
    $rol                = $_SESSION['rol_usuario'];
} else {
    //echo "La sesión no está activa.";
    session_start();
    $usuario            = $_SESSION['usuario'];
    $id_usuario         = $_SESSION['user_id'];
    $rol           = $_SESSION['rol_usuario'];
}


?>


<?php

if ($rol == 3) {
    echo "<h1>No tienes los permisos suficientes para ingresar en este modulo</h1>";
} else {
?>

    <div class="pagetitle">

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <br>
                    <div class="container" style=" display: flex;justify-content: space-between; align-items: center;">
                        <h3 style="width: 30%;">Producto</h3>
                        <a href="index.php?page=inicioInventario" title="regresar" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
                    </div>
                    <br>
                    <div style="position: relative;left: 4%;">
                            <a  class="btn btn-danger" 
                                title="Descargar Reporte inventario" 
                                href="?page=ReporteInventario&amp;id=<?= $id_producto ?>">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </div>
                    <br>
                    <div class="card-body">
                        <!-- Datos del producto -->
                        <div class="table-responsive">
                            <br>
                            <table class="table table-bordered table-hover" id="tableVerProductoInventario">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Serial</th>
                                        <th>Numero de bien</th>
                                        <th>descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($producto as $producto) {
                                    ?>
                                        <tr>
                                            <td><?= $producto['nombre'] ?></td>
                                            <td><?= $producto['modelo'] ?></td>
                                            <td><?= $producto['marca'] ?></td>
                                            <td><?= $producto['serial'] ?></td>
                                            <td><?= $producto['number_bien'] ?></td>
                                            <td><?= $producto['descripcion'] ?></td>
                                        </tr>
                                    <?php
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
}

?>
<!-- /.container-fluid -->