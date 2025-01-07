<!-- Begin Page Content -->

<?php


require_once 'controllers/RolesController.php';
$objeto                 = new RolesController();

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
</style>



<?php

if ($rol == 3) {
    echo "<h1>No tienes los permisos suficientes para ingresar en este modulo</h1>";
} else {
?>

    <div class="pagetitle">
        <h1>Usuarios</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <p></p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable" id="tablaUsuario">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cédula</th>
                                        <th>Correo</th>
                                        <th>Usuario</th>
                                        <th>Estatus</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

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





<!-- Modal Agregar Usuario -->
<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" aria-labelledby="agregarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarUsuarioModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formRegistrarUsuario">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cedula">Cédula</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        name="cedula"
                                        id="cedula"
                                        maxlength="11"
                                        placeholder="Ingrese su cédula"
                                        required>
                                    <span id="cedulaError" class="error"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input class="form-control" type="email" name="correo" id="correo" onkeyup="mayus(this);" maxlength="60" onkeyup="mayus(this);" placeholder="Ingresa la dirección">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contrasena">Contraseña</label>
                                    <input class="form-control" type="password" name="contrasena" id="contrasena" maxlength="60" placeholder="Ingresa la contraseña">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="confirmar_contrasena">Confirmar Contraseña</label>
                                    <input class="form-control" type="password" name="confirmar_contrasena" id="confirmar_contrasena" maxlength="60" placeholder="Ingresa la contraseña">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select class="form-control" name="rol" id="rol">
                                        <option value="">Seleccione</option>
                                        <?php foreach ($roles as $role): ?>
                                            <option value="<?= $role['id'] ?>"><?= $role['rol'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input class="form-control" type="text" name="usuario" id="usuario" maxlength="40" onkeyup="mayus(this);" placeholder="Ingresa el nombre de usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                            <select class="form-control" name="estatus" id="estatus">
                                <option value="">Seleccione</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="agregar_usuario"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Actualizar Usuario -->
<div class="modal fade" id="modalActualizarUsuario" tabindex="-1" aria-labelledby="modalActualizarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalActualizarUsuarioLabel">Modificar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formActualizarUsuario">
                    <input id="id_usuario_update" name="id_usuario_update" type="hidden" value="">

                    <!-- Campos de usuario y correo -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cedula_update">Cédula</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    name="cedula_update"
                                    id="cedula_update"
                                    maxlength="11"
                                    placeholder="Ingrese su cédula"
                                    required>
                                <span id="cedulaError" class="error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="correo_update">Correo</label>
                            <input class="form-control" type="email" id="correo_update" name="correo_update" maxlength="60" onkeyup="mayus(this);" placeholder="Correo electrónico">
                        </div>
                    </div>
                    <!-- Contraseña y Confirmación -->
                    <div class="row mb4">
                        <div class="col-sm-6">
                            <label for="contrasena_update">Contraseña</label>
                            <input class="form-control" type="password" id="contrasena_update" name="contrasena_update" maxlength="60" placeholder="Contraseña">
                        </div>
                        <div class="col-sm-6">
                            <label for="confirmar_contrasena_update">Confirmar Contraseña</label>
                            <input class="form-control" type="password" id="confirmar_contrasena_update" name="confirmar_contrasena_update" maxlength="60" placeholder="Confirmar contraseña">
                        </div>
                    </div>
                    <div class="row mb4">
                        <div class="col-sm-6">
                            <label for="usuario_update">Usuario</label>
                            <input class="form-control" type="text" id="usuario_update" name="usuario_update" maxlength="40" onkeyup="mayus(this);" placeholder="Nombre de usuario">
                        </div>
                        <div class="col-sm-6">
                            <label for="rol_update">Rol</label>
                            <select class="form-control" name="rol_update" id="rol_update">
                                <option value="">Seleccione</option>
                                <!-- Opciones dinámicas de rol -->
                                <?php foreach ($roles_update as $role): ?>
                                    <option value="<?= $role['id'] ?>"><?= $role['rol'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb4">
                        <div class="col-sm-6">
                            <label for="estatus_update">Estatus</label>
                            <select class="form-control" name="estatus_update" id="estatus_update">
                                <option value="">Seleccione</option>
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="modificar_usuario"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Visualizar Usuario-->
<div class="modal fade" id="modalVisualizarUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalVisualizarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVisualizarUsuarioLabel">Informacion del Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hove">
                        <tr>
                            <th>Cedula</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Estatus</th>
                        </tr>
                        <tr>
                            <td id="cedula_usuario"></td>
                            <td id="usuario_usuario"></td>
                            <td id="correo_usuario"></td>
                            <td id="fecha_usuario"></td>
                            <td id="estatus_usuario"></td>

                        </tr>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>