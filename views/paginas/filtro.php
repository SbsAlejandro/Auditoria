<?php
sleep(1);
include('config.php');

/**
 * Nota: Es recomendable guardar la fecha en formato año - mes y dia (2022-08-25)
 * No es tan importante que el tipo de fecha sea date, puede ser varchar
 * La funcion strtotime:sirve para cambiar el forma a una fecha,
 * esta espera que se proporcione una cadena que contenga un formato de fecha en Inglés US,
 * es decir año-mes-dia e intentará convertir ese formato a una fecha Unix dia - mes - año.
 */

$fechaInit = date("Y-m-d", strtotime($_POST['f_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['f_fin']));

$sqlJornadas = ("SELECT * FROM jornadas WHERE  `fecha` BETWEEN '$fechaInit' AND  '$fechaFin' ORDER BY fecha ASC");
$query = mysqli_query($con, $sqlTrabajadores);

$total   = mysqli_num_rows($query);
echo '<strong>Total: </strong> (' . $total . ')';
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>FECHA</th>
            <th scope="col">TIPO DE DISTRIBUCIÓN</th>
            <th scope="col">ORIGEN</th>
            <th scope="col">Nº DE PLACA O Nº DE CARAVANA</th>
            <th scope="col">DESTINO</th>
            <th scope="col">BENEFICIARIO</th>
            <th scope="col">PARROQUIA</th>
            <th scope="col">ESPECIE</th>
            <th scope="col">PRESENTACIÓN</th>
            <th scope="col">KG. DISTRIBUIDOS</th>
            <th scope="col">KG. VENDIDOS</th>
            <th scope="col">PRECIO UNIT. BS</th>
            <th scope="col">TASA CAMBIO</th>
            <th scope="col">TOTAL BS</th>
            <th scope="col">EQUIV. USD</th>+
            <th scope="col">OBSERVACIONES</th>

        </tr>
    </thead>
    <?php
    $i = 1;
    while ($$matriz = mysqli_fetch_array($query)) { ?>
        <tbody>
            <tr>
                <td><?= $fecha = $matriz['fecha'] ?></td>
                <td><?= $id_tipo_distribucion = $matriz['id_tipo_distribucion'] ?></td>
                <td><?= $id_origen = $matriz['id_origen'] ?></td>
                <td><?= $id_doca = $matriz['id_doca'] ?></td>
                <td><?= $id_destino = $matriz['id_destino'] ?></td>
                <td><?= $beneficiarios = $matriz['beneficiarios'] ?></td>
                <td><?= $parroquia = $matriz['parroquia'] ?></td>
                <td><?= $especie = $matriz['especie'] ?></td>
                <td><?= $presentacion = $matriz['presentacion'] ?></td>
                <td><?= $kilos_distribuidos = $matriz['kilos_distribuidos'] ?></td>
                <td><?= $kl_vendidos = $matriz['kl_vendidos'] ?></td>
                <td><?= $precio_unitario_bs = $matriz['precio_unitario_bs'] ?></td>
                <td><?= $tasa_cambio_bcv = $matriz['tasa_cambio_bcv'] ?></td>
                <td><?= $total_bs = $matriz['total_bs'] ?></td>
                <td><?= $equiv_usd = $matriz['equiv_usd'] ?></td>
                <td><?= $observacion = $matriz['observacion'] ?></td>



            </tr>
        </tbody>
    <?php } ?>
</table>