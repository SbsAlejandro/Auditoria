<!-- Begin Page Content -->

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

    /* Select 2 */
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


if ($rol == 3) {
    echo "<h1>No tienes los permisos suficientes para ingresar en este modulo</h1>";
} else {
?>
    <br>

    <div class="row mb-4">
        <div class="pagetitle">
            <h1>Auditoria de Gestión Humana</h1>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <p></p>
                        <!-- Button trigger modal  -->
                        <button title="Agregar Auditoria" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarAuditoria">
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table datatable" id="tablaAuditoria">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Empresa</th>
                                        <th>Cédula</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Fecha</th>
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

<!-- Modal Agregar Ficha-->


<div class="modal fade" id="modalAgregarAuditoria" tabindex="-1" aria-labelledby="agregarAuditoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: #dcdcdc;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarAuditoriaLabel">CREA FICHA DEL TRABAJADOR </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">

                    <div class="card-body">
                        <div class="step-progress">
                            <div class="step-line"></div>
                            <div class="step-line-progress" id="stepLineProgress"></div>
                            <div class="step-progress-item active" id="progressStep1">1</div>
                            <div class="step-progress-item" id="progressStep2">2</div>
                            <div class="step-progress-item" id="progressStep3">3</div>
                            <div class="step-progress-item" id="progressStep4">4</div>
                        </div>
                        <form action="" id="empleadoForm">
                            <!-- Paso 1: Información Modelo/Serial -->

                            <div class="step" id="step1">

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="empresa" class="form-label">Seleccionar Empresa</label>
                                        <select class="form-select" id="id_empresa" name="id_empresa" required>
                                            <option value="" selected disabled>Seleccione una empresa</option>
                                            <option value="1">INMARLACA • AGROD • ROBLAR</option>
                                            <option value="2">DON RAMON Ml RANCHITO 093</option>
                                            <option value="3">MAYOLLERA 078</option>
                                            <option value="4">LAS CAMELIAS ASTREA 059</option>
                                            <option value="5">FELTRINA • MOPORO CA PAZ 058</option>
                                            <option value="6">GRUCASA CATA • COSTA 202 (01)</option>
                                            <option value="7">INV MARINAS 203 SINERITA</option>
                                            <option value="8">AQUAZUL 030</option>
                                            <option value="9">BOGOTANA 072</option>
                                            <option value="10">MONTE ALTO (COQUIVACOA) 111 N6.N7</option>
                                            <option value="11">ACUATECNICA ARAPUEY 073 N6-N7</option>
                                            <option value="12">COSTA LAGO 091 N6.N7</option>
                                            <option value="13">DON SAUL 084 N6.N7</option>
                                            <option value="14">HAC SAN MATEO 079 CC02 N6.N7</option>
                                            <option value="15">INVERCIMA 092</option>
                                            <option value="16">NAVA SERRADA MACANA 094</option>
                                            <option value="17">MATAPALITO 083</option>
                                            <option value="18">ANTARTICA 056</option>
                                            <option value="19">ATLANTICO 003</option>
                                            <option value="20">DESTAJO ATI-ANTICO</option>
                                            <option value="21">IMDACA 048</option>
                                            <option value="22">OPINDULCA 045</option>
                                            <option value="23">ALTAMAR OBR N7 088</option>
                                            <option value="24">HARIMARCA 070</option>
                                            <option value="25">ECO FALCON AQUAMAUROA • OCEAN MARINE 107</option>
                                            <option value="26">CIMA 053</option>
                                            <option value="27">GANADERIA DEL LAGO LA VINA 089 N6.N7</option>
                                            <option value="28">LOS CLAROS 090 CC 01</option>
                                            <option value="29">MONTE CARMELO 090 CC02</option>
                                            <option value="30">LAS PALMERAS 076 N6-N7</option>
                                            <option value="31">ING 3030 EVENT 049</option>
                                            <option value="32">ASERRADERO SAN ANDRES 080 N6</option>
                                            <option value="33">LOS CLAROS GASTRONOMIA 096 N6</option>
                                            <option value="34">LOS SOLES 098 N6</option>
                                            <option value="35">INSPECTORES 106 N4</option>
                                            <option value="36">RECO 097 N6</option>
                                            <option value="37">NEGRON SEM 150 N6.N7</option>
                                        </select>
                                    </div>

                                </div>

                                <p>
                                    <strong><span class="badge bg-secondary text-white" style="font-size:118%;">DATOS PERSONALES</span></strong>
                                </p>

                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cedula">Cédula</label>
                                            <input class="form-control" type="number" id="cedula" name="cedula" placeholder="E.j.: 12345678">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input class="form-control" type="text" id="nombre" name="nombre" onkeyup="mayus(this);" placeholder="Ingrese el nombre">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="apellido">Apellido</label>
                                            <input class="form-control" type="text" id="apellido" name="apellido" onkeyup="mayus(this);" placeholder="Ingrese el Apellido">
                                        </div>
                                    </div>

                                </div>
                                <!-- PASO 1 -->
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cotiza">Cotiza S.S.O</label>
                                            <input class="form-control" type="text" id="cotiza" name="cotiza" onkeyup="mayus(this);" placeholder="SI/NO">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="sexo">Sexo</label>
                                            <input class="form-control" type="text" id="sexo" name="sexo" onkeyup="mayus(this);" placeholder="F/M">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="estado_civil">Estado Civil</label>
                                            <input class="form-control" type="text" id="estado_civil" name="estado_civil" onkeyup="mayus(this);" placeholder="S.C.V.D / OTRO">
                                        </div>
                                    </div>
                                </div>
                                <!-- PASO 2 -->
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <label for="fecha_Nacimiento">Fecha de Nacimiento</label>
                                        <input class="form-control" type="date" id="fecha_nacimiento">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="edad" class="form-label">Edad</label>
                                        <input type="number" class="form-control" id="edad" name="edad" placeholder="Ingrese su edad" min="0" max="120" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="nacionalidad" class="form-label">Nacionalidad</label>
                                        <select class="form-select" id="nacionalidad" name="nacionalidad" required>
                                            <option value="" selected disabled>Seleccione su nacionalidad</option>
                                            <option value="argentina">Argentina</option>
                                            <option value="bolivia">Bolivia</option>
                                            <option value="chile">Chile</option>
                                            <option value="colombia">Colombia</option>
                                            <option value="ecuador">Ecuador</option>
                                            <option value="mexico">México</option>
                                            <option value="peru">Perú</option>
                                            <option value="venezuela">Venezuela</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- PASO 3 -->
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="carga_familiar">Carga Familiar</label>
                                            <input class="form-control" type="text" id="carga_familiar" name="carga_familiar" onkeyup="mayus(this);" placeholder="N°">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zurdo">Zurdo</label>
                                            <input class="form-control" type="text" id="zurdo" name="zurdo" onkeyup="mayus(this);" placeholder="SI/NO">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="peso">Peso</label>
                                            <input class="form-control" type="number" id="peso" name="peso" onkeyup="mayus(this);" placeholder="Kg">
                                        </div>
                                    </div>
                                </div>
                                <!-- PASO Siguiente -->
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="camisa">Camisa</label>
                                            <input class="form-control" type="text" id="camisa" name="camisa" onkeyup="mayus(this);" placeholder="ingrese la talla de la camisa">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="chaqueta">Chaqueta</label>
                                            <input class="form-control" type="text" id="chaqueta" name="chaqueta" onkeyup="mayus(this);" placeholder="ingrese la talla de la chaqueta">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="falto">Falto</label>
                                            <input class="form-control" type="text" id="falto" name="falto" onkeyup="mayus(this);" placeholder="falto ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="falda">Falda</label>
                                            <input class="form-control" type="text" id="falda" name="falda" onkeyup="mayus(this);" placeholder="Falda">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="pantalon">Pantalon</label>
                                            <input class="form-control" type="text" id="pantalon" name="pantalon" onkeyup="mayus(this);" placeholder="pantalon">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="braga">Braga</label>
                                            <input class="form-control" type="text" id="braga" name="braga" onkeyup="mayus(this);" placeholder="Ingrese la talla de braga">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bata">Bata</label>
                                            <input class="form-control" type="text" id="bata" name="bata" onkeyup="mayus(this);" placeholder="Ingrese la talla de su bata">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="zapato">Zapato</label>
                                            <input class="form-control" type="text" id="zapato" name="zapato" onkeyup="mayus(this);" placeholder="Ingrese la talla de zapato">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">¿Posee certificado de salud?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="poseeCertificadoSalud" id="certificadosalud" value="si" required onclick="mostrarFechaVencimiento(true)">
                                            <label class="form-check-label" for="certificadoSi">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="poseeCertificadoSalud" id="certificadosalud" value="no" required onclick="mostrarFechaVencimiento(false)">
                                            <label class="form-check-label" for="certificadoNo">No</label>
                                        </div>
                                    </div>

                                    <!-- Campo para fecha de vencimiento del certificado de salud -->
                                    <div id="campoVencimiento" style="display: none;" class="col-md-6">
                                        <label for="fechaVencimiento" class="form-label">Fecha de vencimiento</label>
                                        <input type="date" class="form-control" id="fechavencimientosalud" name="fechavencimientosalud">
                                    </div>
                                </div>
                                <!-- PASO 4 -->
                                <div class="row mb-4">
                                    <!-- Campo para Estatura -->
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="estatura" class="form-label">Estatura (cm)</label>
                                            <input class="form-control" type="number" id="estatura" name="estatura" placeholder="Ingrese su estatura" min="50" max="250" required>
                                        </div>
                                    </div>
                                    <!-- Campo para ¿Posee vehículos? -->
                                    <div class="col-md-6">
                                        <label class="form-label">¿Posee vehículos?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="poseeVehiculo" id="vehiculo" value="si" required onclick="mostrarCamposVehiculo(true)">
                                            <label class="form-check-label" for="vehiculoSi">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="poseeVehiculo" id="vehiculo" value="no" required onclick="mostrarCamposVehiculo(false)">
                                            <label class="form-check-label" for="vehiculoNo">No</label>
                                        </div>
                                    </div>
                                    <!-- Campos adicionales para datos del vehículo -->
                                    <div id="camposVehiculo" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="licencia" class="form-label">Licencia Grado</label>
                                                <input type="text" class="form-control" id="licencia" name="licencia" placeholder="Ingrese su número de licencia">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="marca" class="form-label">Marca</label>
                                                <input type="text" class="form-control" id="marca" name="marca" placeholder="Ingrese la marca del vehículo">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="modelo" class="form-label">Modelo</label>
                                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo del vehículo">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="anio" class="form-label">Año</label>
                                                <input type="number" class="form-control" id="anio" name="anio" placeholder="Ingrese el año del vehículo" min="1900" max="2099">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="placa" class="form-label">Placa</label>
                                                <input type="text" class="form-control" id="placa" name="placa" placeholder="Ingrese la placa del vehículo">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="color" class="form-label">Color</label>
                                                <input type="text" class="form-control" id="color" name="color" placeholder="Ingrese el color del vehículo">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- PASO 5 -->
                                <div class="row mb-4">
                                    <!-- Dirección de Habitación -->
                                    <div class="col-md-4">
                                        <label for="direccionhabitacion" class="form-label">Dirección Habitación</label>
                                        <input type="text" class="form-control" id="direccionhabitacion" name="direccionhabitacion" placeholder="Ingrese la dirección de su habitación">
                                    </div>

                                    <!-- Avenida -->
                                    <div class="col-md-4">
                                        <label for="avenida" class="form-label">Avenida</label>
                                        <input type="text" class="form-control" id="avenida" name="avenida" placeholder="Ingrese la avenida">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="conjunto_residencial" class="form-label">Conjunto Residencial</label>
                                        <input type="text" class="form-control" id="conjunto_residencial" name="conjunto_residencial" placeholder="C/R">
                                    </div>
                                </div>
                                <!-- PASO 6 -->
                                <!-- Tipo de Propiedad -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Seleccione el tipo de propiedad</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_propiedad" id="edificio" value="edificio" onclick="mostrarCampoTipo()" required>
                                            <label class="form-check-label" for="edificio">Edificio</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_propiedad" id="casa" value="casa" onclick="mostrarCampoTipo()" required>
                                            <label class="form-check-label" for="casa">Casa</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo_propiedad" id="quinta" value="quinta" onclick="mostrarCampoTipo()" required>
                                            <label class="form-check-label" for="quinta">Quinta</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Campo para Piso o Nivel (solo si es Edificio) -->
                                <div id="campoPiso" class="col-md-4" style="position: relative;top: -114px;left: 23%;display:none; ">
                                    <label for="piso" class="form-label">Piso o Nivel</label>
                                    <input type="text" class="form-control" id="piso" name="piso" placeholder="Ingrese el piso o nivel">

                                </div>

                                <!-- Campo para N° Departamento (solo si es Casa o Quinta) -->
                                <div id="campoDepartamento" class="col-md-4" style="position: relative;top: -114px;left: 23%; display:none;">
                                    <label for="departamento" class="form-label">N° Departamento</label>
                                    <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingrese el número de departamento">
                                </div>
                                <!-- PASO 7 -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="urbanizacion" class="form-label">Urbanización Sector o Parroquia</label>
                                        <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" placeholder="USP">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ingrese la Ciudad">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ubicacion" class="form-label">Otra Dirección de Ubicación</label>
                                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="ingrese su Dirección o Ubicación">
                                    </div>
                                </div>
                                <!-- PASO 8 -->
                                <div class="row mb-4">
                                    <!-- Campo para teléfonos -->
                                    <div class="col-md-4">
                                        <label class="form-label">Teléfono de habitación</label>
                                        <input type="number" class="form-control" id="telefonohabitacion" name="telefonohabitacion" placeholder="Ingrese su teléfono de habitación">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Teléfono celular</label>
                                        <input type="number" class="form-control" id="telefonocelular" name="telefonocelular" placeholder="Ingrese su teléfono celular">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Otro teléfono</label>
                                        <input type="number" class="form-control" id="otrotelefono" name="otrotelefono" placeholder="Ingrese otro teléfono">
                                    </div>
                                </div>
                                <!-- PASO 9 -->
                                <div class="row mb-4">
                                    <!-- Campo para Email -->
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico @" required>
                                    </div>

                                </div>



                                <!-- Contenido del Paso 1 -->
                                <button type="button" class="btn btn-primary" onclick="nextStep(1)">Siguiente</button>
                            </div>

                            <!-- Paso 2: Información de datos -->
                            <div class="step" id="step2" style="display: none;">
                                <p>
                                    <strong><span class="badge bg-secondary text-white" style="font-size:118%;">NIVEL DE INSTRUCCIÓN</span></strong>
                                </p>
                                <!-- PASO 1 -->
                                <div class="row mb-4">
                                    <!-- Campo para grado de instrucción -->
                                    <div class="col-md-4">
                                        <label for="grado" class="form-label">Grado de instrucción</label>
                                        <input type="grado" class="form-control" id="grado" name="grado" placeholder="Ingrese su grado" required>
                                    </div>

                                    <!-- Campo para la Institución -->
                                    <div class="col-md-4">
                                        <label for="institucion" class="form-label">Institución </label>
                                        <input type="text" class="form-control" id="institucion" name="institucion" placeholder="Ingrese la Institución" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="localidad" class="form-label">Localidad</label>
                                        <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Ingrese su Localidad" required>
                                    </div>
                                </div>
                                <!-- PASO 2 -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="especialidad" class="form-label">Especialidad</label>
                                        <input type="especialidad" class="form-control" id="especialidad" name="especialidad" placeholder="Ingrese la Especialidad" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ultimo_a" class="form-label">Ultimo año aprobado</label>
                                        <input type="text" class="form-control" id="ultimo_a" name="ultimo_a" placeholder="Ingrese su ultimo año" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Graduado</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="estadoEstudio"
                                                id="graduado"
                                                value="si"
                                                required
                                                onclick="mostrarOpcionesEstudio('si')">
                                            <label class="form-check-label" for="estudioSi">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="estadoEstudio"
                                                id="graduado"
                                                value="no"
                                                required
                                                onclick="mostrarOpcionesEstudio('no')">
                                            <label class="form-check-label" for="estudioNo">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label">¿Está estudiando actualmente?</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="estudiandoActualmente"
                                                id="estudiando"
                                                value="si"
                                                required
                                                onclick="mostrarCamposEstudio(true)">
                                            <label class="form-check-label" for="estudiandoSi">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="estudiandoActualmente"
                                                id="estudiando"
                                                value="no"
                                                required
                                                onclick="mostrarCamposEstudio(false)">
                                            <label class="form-check-label" for="estudiandoNo">No</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Campos adicionales -->
                                    <div id="camposEstudio" style="display: none;">
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="institucion" class="form-label">Institución</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="institucion_actual"
                                                    name="institucion_actual"
                                                    placeholder="Ingrese la institución">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="carrera" class="form-label">Carrera</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="carrera_actual"
                                                    name="carrera_actual"
                                                    placeholder="Ingrese la carrera">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="especialidad" class="form-label">Especialidad</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="especialidad_actual"
                                                    name="especialidad_actual"
                                                    placeholder="Ingrese la especialidad">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label for="horarioInicio" class="form-label">Horario</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="horarioInicio" class="form-label">Inicio</label>
                                                        <input
                                                            type="time"
                                                            class="form-control"
                                                            id="horario_inicio"
                                                            name="horario_inicio"
                                                            min="08:00"
                                                            max="18:00"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="horarioFin" class="form-label">Fin</label>
                                                        <input
                                                            type="time"
                                                            class="form-control"
                                                            id="horario_fin"
                                                            name="horario_fin"
                                                            min="08:00"
                                                            max="18:00"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Campo Fecha Desde -->
                                            <div class="col-md-3" style="position: relative;top: 29px;">
                                                <label for="fecha_desde" class="form-label">Fecha Desde</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="fecha_desde"
                                                    name="fecha_desde"
                                                    placeholder="Seleccione la fecha desde">
                                            </div>

                                            <!-- Campo Fecha Hasta -->
                                            <div class="col-md-3" style="position: relative;top: 29px;">
                                                <label for="fecha_hasta" class="form-label">Fecha Hasta</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    id="fecha_hasta"
                                                    name="fecha_hasta"
                                                    placeholder="Seleccione la fecha hasta">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Pregunta principal -->
                                    <div class="col-md-2">
                                        <label class="form-label">¿Tiene posgrado?</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="postgrado"
                                                id="postgrado"
                                                value="si"
                                                required
                                                onclick="mostrarTipoPosgrado(true)">
                                            <label class="form-check-label" for="posgradoSi">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="postgrado"
                                                id="postgrado"
                                                value="no"
                                                required
                                                onclick="mostrarTipoPosgrado(false)">
                                            <label class="form-check-label" for="posgradoNo">No</label>
                                        </div>
                                    </div>

                                    <!-- Campo para seleccionar el tipo de posgrado -->
                                    <div class="row mb-4" id="tipoposgrado" style="display: none;">
                                        <div class="col-md-4">
                                            <label for="tipoposgrado" class="form-label">Seleccione el tipo de posgrado</label>
                                            <select class="form-select" id="tipopostgrado" name="tipopostgrado" onchange="mostrarDetallePosgrado(this.value)">
                                                <option value="" selected disabled>Seleccione una opción</option>
                                                <option value="maestria">Maestría</option>
                                                <option value="doctorado">Doctorado</option>
                                                <option value="phd">PhD</option>
                                            </select>
                                        </div>
                                        <!-- Campo adicional para especificar "¿En qué?" -->
                                        <div class="col-md-4" id="especificacion" style="display: none;position:relative;top: -69px;left: 34%;">
                                            <label for="especificacion" class="form-label">Especificación</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="especificaciones"
                                                name="especificaciones"
                                                placeholder="Ingrese la especialidad del posgrado">
                                        </div>
                                    </div>
                                </div>



                                <!-- Contenido del Paso 2 -->
                                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Anterior</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Siguiente</button>
                            </div>
                            <!-- Paso 3: Información adicional -->
                            <div class="step" id="step3" style="display: none;">
                                <p>
                                    <strong><span class="badge bg-secondary text-white" style="font-size:118%;">JORNADA DE TRABAJO (PREFERENCIAL)</span></strong>
                                </p>
                                <div class="row mb-4">
                                    <!-- Campo Tiempo Completo o Parcial -->
                                    <div class="col-md-4">
                                        <label class="form-label">¿Tipo de jornada?</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="tipojornada"
                                                id="tipojornada"
                                                value="completo"
                                                required>
                                            <label class="form-check-label" for="jornadaCompleta">Tiempo completo</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="tipojornada"
                                                id="tipojornada"
                                                value="parcial"
                                                required>
                                            <label class="form-check-label" for="jornadaParcial">Tiempo parcial</label>
                                        </div>
                                    </div>
                                    <!-- Pregunta principal -->
                                    <div class="col-md-4">
                                        <label class="form-label">¿Realizaría guardia?</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="realizariaguardia"
                                                id="realizariaguardia"
                                                value="si"
                                                required
                                                onclick="mostrarOpcionesGuardia(true)">
                                            <label class="form-check-label" for="guardiaSi">Sí</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="realizariaguardia"
                                                id="realizariaguardia"
                                                value="no"
                                                required
                                                onclick="mostrarOpcionesGuardia(false)">
                                            <label class="form-check-label" for="guardiaNo">No</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Seleccione su horario</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="horarioguardia"
                                                id="horarioguardia"
                                                value="mañana"
                                                required>
                                            <label class="form-check-label" for="horarioManana">Mañana</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="horarioguardia"
                                                id="horarioguardia"
                                                value="tarde"
                                                required>
                                            <label class="form-check-label" for="horarioTarde">Tarde</label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="horarioguardia"
                                                id="horarioguardia"
                                                value="noche"
                                                required>
                                            <label class="form-check-label" for="horarioNoche">Noche</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Campo para seleccionar opciones de guardia -->
                                <div class="row mb-4" id="opcionesGuardia" style="display: none;">
                                    <div class="col-md-4">
                                        <label for="tipoGuardia" class="form-label">Seleccione el tipo de guardia</label>
                                        <select class="form-select" id="tipoguardia" name="tipoguardia">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="sabado">Sábado</option>
                                            <option value="domingo">Domingo</option>
                                            <option value="nocturno">Nocturno</option>
                                            <option value="feriado">Feriado</option>
                                        </select>
                                    </div>
                                </div>

                                <p>
                                    <strong><span class="badge bg-secondary text-white" style="font-size:118%;">IDIOMAS QUE DOMINA, ADEMÁS DEL ESPAÑOL</span></strong>
                                </p>
                                <div class="row mb-4">
                                    <!-- Campo de Idioma -->
                                    <div class="col-md-4">
                                        <label for="idioma" class="form-label">Seleccione su idioma</label>
                                        <select class="form-select" id="idioma" name="idioma" onchange="mostrarHabilidades()">
                                            <option value="" selected disabled>Seleccione un idioma</option>
                                            <option value="espanol">Español</option>
                                            <option value="ingles">Inglés</option>
                                            <option value="frances">Francés</option>
                                            <!-- Puedes agregar más idiomas si es necesario -->
                                        </select>
                                    </div>
                                </div>
                                <!-- Campo de Habilidades de Idioma (hablar, leer, escribir) -->
                                <div class="row mb-4" id="habilidadesidioma" style="display: none;">
                                    <div class="col-md-4">
                                        <label class="form-label">¿En qué habilidad del idioma?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="hablar" value="hablar">
                                            <label class="form-check-label" for="hablar">Hablar</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="leer" value="leer">
                                            <label class="form-check-label" for="leer">Leer</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="escribir" value="escribir">
                                            <label class="form-check-label" for="escribir">Escribir</label>
                                        </div>
                                    </div>
                                    <!-- Campo de Calificación de Habilidad (Regular, Bien, Muy bien) -->
                                    <div class="col-md-4" id="calificacionhabilidad" style="display: none;position: relative;top: -110px;left: 30%;">
                                        <label for="nivel" class="form-label">Seleccione su nivel de habilidad</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nivel" id="nivel" value="regular">
                                            <label class="form-check-label" for="nivelR">R</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nivel" id="nivel" value="bien">
                                            <label class="form-check-label" for="nivelB">B </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nivel" id="nivel" value="muyBien">
                                            <label class="form-check-label" for="nivelM">M </label>
                                        </div>
                                    </div>
                                </div>



                                <!-- Contenido del Paso 3 -->
                                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Anterior</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Siguiente</button>
                            </div>
                            <!-- Paso 4: Confirmación -->
                            <div class="step" id="step4" style="display: none;">
                                <p>
                                    <strong><span class="badge bg-secondary text-white" style="font-size:118%;">INFORMACIÓN DEL GRUPO FAMILIAR</span></strong>
                                </p>
                                <div class="container mt-5">
                                    <form id="speciesForm">
                                        <div class="row mb-3 g-3">
                                            <div class="mb-3 col-sm-4">
                                                <label for="nombrefamiliar" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombrefamiliar" placeholder="Ingrese el nombre" required>
                                            </div>

                                            <div class="mb-3 col-sm-4">
                                                <label for="apellidofamiliar" class="form-label">Apellido</label>
                                                <input type="text" class="form-control" id="apellidofamiliar" placeholder="Ingrese el apellido" required>
                                            </div>
                                            <div class="mb-3 col-sm-4">
                                                <label for="cedulafamiliar" class="form-label">Cédula</label>
                                                <input type="text" class="form-control" id="cedulafamiliar" placeholder="Ingrese la cédula" required>
                                            </div>
                                        </div>

                                        <div class="row g-3">
                                            <div class="mb-3 col-sm-4">
                                                <label for="parentesco" class="form-label">Parentesco</label>
                                                <input type="text" class="form-control" id="parentesco" placeholder="Ingrese el parentesco" required>
                                            </div>
                                            <div class="mb-3 col-sm-4">
                                                <label for="fecha_nacimiento_familiar" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="fecha_nacimiento_familiar" placeholder="Seleccione la fecha de nacimiento" required>
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label d-block">Sexo</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="sexofamiliar" name="sexofamiliar" value="F">
                                                    <label class="form-check-label" for="sexofamiliar">Femenino</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="sexofamiliar" name="sexofamiliar" value="M">
                                                    <label class="form-check-label" for="sexofamiliar">Masculino</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <label class="form-label">¿Actualmente trabaja?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="trabajafamiliar" id="trabajafamiliarSi" value="si" onclick="mostrarOpcionesTrabajo(true)">
                                                    <label class="form-check-label" for="trabajafamiliarSi">Sí</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="trabajafamiliar" id="trabajafamiliar" value="no" onclick="mostrarOpcionesTrabajo(false)">
                                                    <label class="form-check-label" for="trabajafamiliar">No</label>
                                                </div>
                                            </div>

                                            <div class="col-md-4" id="campoDondeTrabaja" style="display: none;">
                                                <label for="dondetrabajafamiliar" class="form-label">¿Dónde trabaja?</label>
                                                <input type="text" class="form-control" id="dondetrabajafamiliar" placeholder="Ingrese el lugar de trabajo">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary mt-3" id="agregarAuditoria">Guardar <i class="fas fa-plus"></i></button>

                                        </div>
                                    </form>
                                    <div id="alertModalCrearAuditoria">

                                    </div>
                                    <div class="row" id="contenedor_datos_familiar">
                                        <div class="col-sm-12 table-responsive">
                                            <table class="table table-bordered table-striped table-hover" id="multiples_familiar">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Cédula</th>
                                                        <th>Parentesco</th>
                                                        <th>Fecha</th>
                                                        <th>Sexo</th>
                                                        <th>Trabaja</th>
                                                        <th id="columnaDonde">Dónde</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Aquí se agregarán los datos de los familiares -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                                <!-- Contenido del Paso 4 -->
                                <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Anterior</button>
                                <button type="submit" id="agregar_auditoria" class="btn btn-success">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>