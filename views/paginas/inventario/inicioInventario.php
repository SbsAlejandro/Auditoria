<!-- Begin Page Content -->
<!-- select -->


<?php

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




require_once 'models/InventarioModel.php';



$modelInventario = new InventarioModel();



$productos_listar = $modelInventario->listarProductos();
$id_producto_modificar = $modelInventario->listarProductos();







?>
<style>
    .file-upload {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 150px;
        padding: 30px;
        border: 1px dashed silver;
        border-radius: 8px;
    }

    .file-upload input {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .preview_img {
        height: 80px;
        width: 80px;
        border: 4px solid silver;
        border-radius: 100%;
        object-fit: cover;
    }

    .step-progress {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        position: relative;
    }

    .step-progress-item {
        width: 30px;
        height: 30px;
        background-color: #e9ecef;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #6c757d;
        z-index: 1;
    }

    .step-progress-item.active {
        background-color: #0d6efd;
        color: white;
    }

    .step-line {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #e9ecef;
        z-index: 0;
    }

    .step-line-progress {
        position: absolute;
        top: 50%;
        left: 0;
        width: 0%;
        height: 2px;
        background-color: #0d6efd;
        z-index: 0;
        transition: width 0.3s ease-in-out;
    }

    .form-control {
        background-color: #f8f9fa;
    }

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



    .number-input .btn {


        border-color: #0d6efd;
    }

    .number-input .btn-outline-secondary:hover {
        background-color: #0d6efd;
        color: #6c757d;
    }

    .btnsig {

        background: #0d6efd;
        color: #fff;
    }
</style>

<?php


if ($rol == 3) {
    echo "<h1>No tienes los permisos suficientes para ingresar en este modulo</h1>";
} else {
?>
    <div class="pagetitle">
        <h1>Inventario</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <p></p>
                        <!-- Button trigger modal  -->
                        <button title="Agregar Inventario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarInventario">
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable" id="tablainventario">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>estatus</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

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

<!-- Modal Agregar Inventario-->
<div class="modal fade" id="modalAgregarInventario" tabindex="-1" aria-labelledby="agregarInventarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarInventarioLabel">Agregar Inventario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="card-body">

                        <form id="formRegistrarEntradaProducto">
                            <p>
                                <strong><span class="badge bg-secondary text-white">Datos del Producto</span></strong>
                            </p>
                            <div class="container mt-5">
                                <form id="speciesForm">
                                    <div class="row mb-3 g-3">
                                        <div class="col-md-12">
                                            <label htmlFor="producto">Productos:</label>
                                            <select style="width: 100%" class="js-example-basic-single" id="id_producto" name="state">
                                                <option value="">seleccione</option>
                                                <?php
                                                foreach ($productos_listar as $productos) {
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
                                            <label for="modelo" class="form-label">Modelo</label>
                                            <input type="text" class="form-control" id="modelo" onkeyup="mayus(this);" placeholder="ingrese el modelo del equipo">
                                        </div>

                                        <div class="mb-3 col-sm-6">
                                            <label for="number_bien" class="form-label">Codigo de Bienes</label>
                                            <input type="text" class="form-control" id="number_bien" onkeyup="mayus(this);" placeholder="ingrese el codigo de bienes">
                                        </div>
                                    </div>
                                    <div class="row g-3">

                                        <div class="mb-3 col-sm-6">
                                            <label for="marca" class="form-label">Marca</label>
                                            <input type="text" class="form-control" id="marca" onkeyup="mayus(this);" placeholder="ingrese la marca del equipo">
                                        </div>

                                        <div class="mb-3 col-sm-6">
                                            <label for="serial" class="form-label">Serial</label>
                                            <input type="text" class="form-control" id="serial" onkeyup="mayus(this);" name="serial" placeholder="Ingrese el serial">
                                        </div>

                                    </div>
                                    <div class="row g-3">
                                        <div class="mb-3 col-sm-6">
                                            <div class="form-group">
                                                <label for="descripcion">Descripcion</label>
                                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" onkeyup="mayus(this);" placeholder="Ingrese la descripcion"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary mt-3" id="agregarProductos"><i class="fas fa-plus"></i></button>
                                    </div>
                                </form>
                            </div>
                        </form>
                        <div class="row" id="contenedor_datos_productos_multiples" style="display:none;">
                            <div class="col-sm-12 table-responsive" id="">
                                <table class="table table-bordered table-striped table-hover" id="multiples_productos">
                                    <tbody>
                                        <tr>
                                            <th>Productos</th>
                                            <th>Modelo</th>
                                            <th>Codigo de Bienes</th>
                                            <th>Marca</th>
                                            <th>Serial</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" title="Cerrar el modal" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="agregar_inventario" title="Guardar cambios"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<div class="modal fade" id="modalActualizarinventario" tabindex="-1" aria-labelledby="modalActualizarinventarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalActualizarinventarioLabel">Modificar Inventario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="card-body">
                        <form id="formActualizarinventario">
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
                            <div class="row">
                                <div class="col-sm-2" style="display: flex; align-items: flex-end; margin-bottom: 2px;">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-circle" id="agregarProductos_update" title="Agregar Producto"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-success btn-circle" style="display: none;" id="modificar_productos_update" title="Modificar"><i class="fas fa-edit"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-circle" style="display: none;" id="cancelar_productos_update" onclick="cancelarEspecieUpdate()" title="Cancelar"><i class="fas fa-ban"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row" id="contenedor_datos_productos_multiples_update">
                                    <div class="col-sm-12 table-responsive" id="">
                                        <p>Productos</p>
                                        <table class="table table-bordered table-striped table-hover" id="multiples_productos_update">
                                            <tr>
                                                <th>Productos</th>
                                                <th>Modelo</th>
                                                <th>Codigo de Bienes</th>
                                                <th>Marca</th>
                                                <th>Serial</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </table>
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