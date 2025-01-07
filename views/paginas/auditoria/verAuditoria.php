<!-- Begin Page Content -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f5f5f5;
    }
</style>
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



require_once 'models/AuditoriaModel.php';


$modelauditoria              = new AuditoriaModel();

$id_auditoria = $_GET['id'];

$datos_auditoria     = $modelauditoria->verAuditoria($id_auditoria);

foreach ($datos_auditoria as $datos_auditoria) {
    $fecha_registro                      = $datos_auditoria['fecha_registro'];
    $nombreCompleto = $datos_auditoria['nombre'] . ' ' . $datos_auditoria['apellido'];
    $cotiza                    = $datos_auditoria['cotiza'];
    $sexo                      = $datos_auditoria['sexo'];
    $estado_civil              = $datos_auditoria['estado_civil'];
    $fecha_nacimiento          = $datos_auditoria['fecha_nacimiento'];
    $edad                      = $datos_auditoria['edad'];
    $nacionalidad              = $datos_auditoria['nacionalidad'];
    $carga_familiar            = $datos_auditoria['carga_familiar'];

    $zurdo                     = $datos_auditoria['zurdo'];
    $peso                      = $datos_auditoria['peso'];
    $camisa                    = $datos_auditoria['camisa'];

    $chaqueta                  = $datos_auditoria['chaqueta'];

    $falto                     = $datos_auditoria['falto'];
    $falda                     = $datos_auditoria['falda'];

    $pantalon                  = $datos_auditoria['pantalon'];
    $braga                     = $datos_auditoria['braga'];
    $bata                      = $datos_auditoria['bata'];
    $zapato                    = $datos_auditoria['zapato'];

    $certificadosalud          = $datos_auditoria['certificadosalud'];
    $tipo_propiedad            = $datos_auditoria['tipo_propiedad'];
    $desc_tipo_propiedad       = $datos_auditoria['desc_tipo_propiedad'];
    $urbanizacion              = $datos_auditoria['urbanizacion'];
    $ciudad                    = $datos_auditoria['ciudad'];
    $ubicacion                 = $datos_auditoria['ubicacion'];
    $telefonohabitacion        = $datos_auditoria['telefonohabitacion'];
    $telefonocelular           = $datos_auditoria['telefonocelular'];
    $otrotelefono              = $datos_auditoria['otrotelefono'];
    $email                     = $datos_auditoria['email'];
    $grado                     = $datos_auditoria['grado'];
    $institucion               = $datos_auditoria['institucion'];
    $localidad                 = $datos_auditoria['localidad'];
    $especialidad              = $datos_auditoria['especialidad'];
    $ultimo_a                  = $datos_auditoria['ultimo_a'];
    $graduado                  = $datos_auditoria['graduado'];
    $estudiando                = $datos_auditoria['estudiando'];
    $institucion_actual        = $datos_auditoria['institucion_actual'];
    $carrera_actual            = $datos_auditoria['carrera_actual'];
    $especialidad_actual       = $datos_auditoria['especialidad_actual'];
    $horario_inicio            = $datos_auditoria['horario_inicio'];
    $horario_inicio            = $datos_auditoria['horario_inicio'];

    $nombre_empresa               = $datos_auditoria['nombre_empresa'];
}

?>



<?php


if ($rol == 3) {
    echo "<h1>No tienes los permisos suficientes para ingresar en este modulo</h1>";
} else {
?>
    <style>
        .section-header {
            font-weight: bold;
            text-align: center;
            background-color: #f0f0f0;
            padding: 10px;
        }

        .section-content {
            padding: 10px;
        }

        th,
        td {
            text-align: center;
        }

        .container2 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* gap: 38px; */
            justify-content: center;
            /* background: red; */
            align-items: center;
            position: relative;
            left: 6%;
            width: 87%;
            top: 97px;
        }


        .img1 {
            width: 53%;
            position: relative;
            left: -25%;

        }

        .img2 {
            width: 37%;
            position: relative;
            left: 167%;
        }

        .img3 {
            width: 39%;
            margin-left: 95px;
        }

        .margen {
            position: relative;
            left: 27%;
            width: 19%;
            top: -80px;

        }
    </style>


    <br>
    <br>

    <div class="section">


        <div class="row">
            <div class="col-lg-12">
                <br>
                <br>
                <br>
                <div class="container mt-4">
                    <!--         <div class="container">
                        <a href="index.php?page=reporteFichaJornada&id=<?php echo $id_jornada; ?>" style="margin-bottom: 10px;"
                            class="btn btn-danger"
                            title="Reporte ficha"
                            target="_blank">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <br>
                    </div> -->



                    <div class="row mb4">
                        <div style="background: red;width: 23%;color: #fff;position: relative;left: 22px;" class="row mb4">
                            <strong>EMPRESA</strong>
                            <p><?= $nombre_empresa ?></p>
                        </div>
                    </div>
                    <br>

                    <div class="section-header">FECHA: <?= $fecha_registro ?></div>
                    <div class="section-content">
                        <p><strong>Nombre y Apellido:</strong> <?= htmlspecialchars($nombreCompleto) ?></p>
                        <p><strong>Edad:</strong> <?= $edad ?></p>


                        <p><strong>Fecha de Nacimiento:</strong> <?= $fecha_nacimiento ?></p>
                        <p><strong>Nacionalidad:</strong> <?= $nacionalidad ?></p>
                        <p><strong>Gmail</strong> <?= $email ?></p>
                        <hr>


                        <div class="row mb4">
                            <p><strong>Carga Familiar</strong> <?= $carga_familiar ?></p>
                            <p><strong>Gmail</strong> <?= $certificadosalud ?></p>


                            <!--    <div class="margen">
                                <p><strong>Carga Familiar</strong> <?= $carga_familiar ?></p>
                                <p><strong>Gmail</strong> <?= $certificadosalud ?></p>
                            </div>

                            <div class="margen">
                                <p><strong>Carga Familiar</strong> <?= $carga_familiar ?></p>
                                <p><strong>Gmail</strong> <?= $certificadosalud ?></p>
                            </div>

                            <div class="margen">
                                <p><strong>Carga Familiar</strong> <?= $carga_familiar ?></p>
                                <p><strong>Gmail</strong> <?= $certificadosalud ?></p>
                            </div> -->
                        </div>




                    </div>
                    <div class="row">

                        <div class="col-12 mb-3">
                            <div class="container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ESTADO CIVIL</th>
                                            <th>SEXO</th>
                                            <th>COTIZA</th>
                                            <th>ZURDO</th>
                                            <th>PESO</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= htmlspecialchars($estado_civil) ?></td>
                                            <td><?= htmlspecialchars($sexo) ?></td>
                                            <td><?= htmlspecialchars($cotiza) ?></td>
                                            <td><?= htmlspecialchars($zurdo) ?></td>
                                            <td><?= htmlspecialchars($peso) ?></td>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>CAMISA</th>
                                        <th>CHAQUETA</th>
                                        <th>PANTALON</th>
                                        <th>FALTO</th>
                                        <th>FALDA</th>
                                        <th>BRAGA</th>
                                        <th>BATA</th>
                                        <th>ZAPATO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= htmlspecialchars($camisa) ?></td>
                                        <td><?= htmlspecialchars($chaqueta) ?></td>
                                        <td><?= htmlspecialchars($pantalon) ?></td>
                                        <td><?= htmlspecialchars($falto) ?></td>
                                        <td><?= htmlspecialchars($falda) ?></td>
                                        <td><?= htmlspecialchars($braga) ?></td>
                                        <td><?= htmlspecialchars($bata) ?></td>
                                        <td><?= htmlspecialchars($zapato) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <div style="display: flex; flex-direction: column;">
            </div>

        </div>




    <?php
}

    ?>