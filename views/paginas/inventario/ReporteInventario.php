<?php

require_once "./config/app.php";

ob_start();

$id_producto = $_GET['id'];

require_once 'models/InventarioModel.php';
$modelInventario        = new InventarioModel();

$producto = $modelInventario->verInventarioProducto($id_producto);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Inventario </title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-total {
            background-color: #FFCDB2 !important;
        }

        .table-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .table-responsive {
            border: 1px solid #dee2e6;
        }

        .table> :not(caption)>*>* {
            padding: 0.75rem;
        }

        table {
            border: solid 1px #000;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            font-size: 11px;

        }

        tr {
            border: solid 1px #000;
        }

        td {
            border: solid 1px #000;

            padding: 10px;
        }

        th {
            border: solid 1px #000;

            padding: 5px;
        }

        .btn-success {
            background-color: #48C9B0;
            color: #FFF;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }

        .btn-danger {
            background-color: #E74C3C;
            color: #FFF;
            border: none;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="table-container">
        <div style="width: 50%;">
            <img style="width: 50%; height:auto; position:relative;left: 70%;" src="<?= SERVERURL ?>libs/img/cropped-Logo.png" alt="">
        </div>
        <br>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
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

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

$html = ob_get_clean();
//echo $html;


require_once 'libs/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf = new Dompdf(array('enable_remote' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$nombre_documento = "ACTA_DE_RECEPCION";

$dompdf->stream("$nombre_documento", array("Atachment" => false));



?>