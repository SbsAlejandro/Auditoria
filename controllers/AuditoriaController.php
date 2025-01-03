<?php

require_once './models/AuditoriaModel.php';
require_once './config/validacion.php';


class AuditoriaController
{

    #estableciendo la vista del login
    public function inicioAuditoria()
    {

        /*HEADER */
        require_once('./views/includes/cabecera.php');

        require_once('./views/paginas/auditoria/inicioAuditoria.php');

        /* FOOTER */
        require_once('./views/includes/pie.php');
    }


    public function listarAuditoria()
    {
        // Database connection info 
        $dbDetails = array(
            'host' => 'localhost',
            'user' => 'postgres',
            'pass' => 'postgres',
            'db'   => 'bd_auditoria'
        );


        $table = 'auditoria';

        // Table's primary key 
        $primaryKey = 'id';


        $columns = array(

            array('db' => 'id',         'dt' => 0),
            array('db' => 'empresa',         'dt' => 1),
            array('db' => 'cedula',         'dt' => 2),
            array('db' => 'nombre',         'dt' => 3),
            array('db' => 'apellido',         'dt' => 4),

            array('db' => 'id', 'dt' => 5),
            array('db' => 'fecha_registro', 'dt' => 6)


        );

        // Include SQL query processing class 
        require './config/ssp.class.php';

        // Output data as json format 
        echo json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }




    public function registrarAuditoriatemporales()
    {
        session_start();
        $modelAuditoria = new AuditoriaModel();

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $parentesco = $_POST['parentesco'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $sexo = $_POST['sexo'];
        $trabaja = $_POST['trabaja'];
        $donde_trabaja = isset($_POST['dondeTrabaja']) ? $_POST['dondeTrabaja'] : null;
        $id_usuario = $_SESSION['user_id'];

        // Validar que todos los campos obligatorios estén presentes
        if (empty($nombre) || empty($apellido) || empty($cedula) || empty($parentesco) || empty($fecha_nacimiento) || empty($sexo)) {
            $data = [
                'data' => [
                    'success' => false,
                    'message' => 'Campos incompletos',
                    'info' => 'Por favor, complete todos los campos obligatorios.',
                ],
                'code' => 0,
            ];
            echo json_encode($data);
            exit();
        }

        // Preparar los datos para la inserción
        $datos = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'cedula' => $cedula,
            'parentesco' => $parentesco,
            'fecha_nacimiento' => $fecha_nacimiento,
            'sexo' => $sexo,
            'trabaja' => $trabaja,
            'donde_trabaja' => $donde_trabaja,
            'id_usuario' => $id_usuario,
        ];

        // Insertar el registro en la base de datos
        $resultado = $modelAuditoria->registrarAuditoriatemporales($datos);

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            $data = [
                'data' => [
                    'success' => true,
                    'message' => 'Familiar agregado exitosamente',
                    'info' => 'El familiar se ha agregado a la lista temporal.',
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'cedula' => $cedula,
                    'parentesco' => $parentesco,
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'sexo' => $sexo,
                    'trabaja' => $trabaja,
                    'donde_trabaja' => $donde_trabaja,
                ],
                'code' => 1,
            ];
            echo json_encode($data);
            exit();
        } else {
            $data = [
                'data' => [
                    'success' => false,
                    'message' => 'Error al agregar familiar',
                    'info' => 'Hubo un problema al registrar los datos. Intente nuevamente.',
                ],
                'code' => 0,
            ];
            echo json_encode($data);
            exit();
        }
    }
}
