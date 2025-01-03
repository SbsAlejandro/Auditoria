<!-- Begin Page Content -->


<style>
    .select2-selection--single {
        background-color: #fff !important;
        border: 1px solid #d1d3e2 !important;
        border-radius: 4px !important;


    }

    .select2-selection--single {
        height: 38px !important;
        display: flex !important;
        align-items: center !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #6e707e !important;
        line-height: 28px !important;

    }
</style>
<?php

$id_producto = $_GET['id'];


require_once 'controllers/RolesController.php';
require_once 'models/InventarioModel.php';

$objeto                 = new RolesController();

$modelInventario = new InventarioModel();


$id_producto_modificar = $modelInventario->listarProductos();

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
                    <div class="container" style="display: flex;justify-content: space-between; align-items: center;">
                        <h3 style="width: 30%;">Producto</h3>
                        <a href="index.php?page=inicioInventario" title="regresar" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i></a>
                    </div>
                    <br>

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
                                        <th>Accciones</th>
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
                                            <td style="text-align: center;">
                                                <button class="btn btn-warning btn-sm" onclick="getProductoActualizacion(<?= $producto['id']  ?>);">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </td>
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

    <div class="modal fade" id="getProductoActualizacion" tabindex="-1" aria-labelledby="getProductoActualizacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="getProductoActualizacionLabel">Modificar Inventario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="card-body">
                            <form id="formActualizargetProducto">
                                <p>
                                    <strong><span class="badge bg-secondary text-white">Datos del Producto a Modificar</span></strong>
                                </p>
                                <div class="container mt-5">
                                    <div class="row">
                                        <input type="hidden" id="id_inventario_update" value="">
                                    </div>
                                    <div class="row mb-3 g-3">
                                        <div class="col-md-12">
                                            <label for="id_producto_update">Productos:</label>
                                            <select style="width: 100%" class="js-example-basic-single" id="id_producto_update" name="state">
                                                <option value="">Seleccione</option>
                                                <?php
                                                foreach ($id_producto_modificar as $productos) {
                                                ?>
                                                    <option value="<?= $productos['id'] ?>"><?= $productos['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3 g-3">
                                        <div class="mb-3 col-sm-6">
                                            <label for="modelo_update" class="form-label">Modelo</label>
                                            <input type="text" class="form-control" id="modelo_update" onkeyup="mayus(this);" placeholder="Ingrese el modelo del equipo">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label for="number_bien_update" class="form-label">Código de Bienes</label>
                                            <input type="text" class="form-control" id="number_bien_update" onkeyup="mayus(this);" placeholder="Ingrese el código de bienes">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="mb-3 col-sm-6">
                                            <label for="marca_update" class="form-label">Marca</label>
                                            <input type="text" class="form-control" id="marca_update" onkeyup="mayus(this);" placeholder="Ingrese la marca del equipo">
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <label for="serial_update" class="form-label">Serial</label>
                                            <input type="text" class="form-control" id="serial_update" onkeyup="mayus(this);" placeholder="Ingrese el serial">
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="mb-3 col-sm-6">
                                            <label for="descripcion_update">Descripción</label>
                                            <textarea class="form-control" id="descripcion_update" rows="3" onkeyup="mayus(this);" placeholder="Ingrese la descripción"></textarea>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" title="Cerrar el modal" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="guardar_cambios_inventario" title="Guardar cambios"><i class="fas fa-save"></i> Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}

?>
<!-- /.container-fluid -->