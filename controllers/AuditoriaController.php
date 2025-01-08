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

    public function verAuditoria()
    {

        /*HEADER */
        require_once('./views/includes/cabecera.php');

        require_once('./views/paginas/auditoria/verAuditoria.php');

        /* FOOTER */
        require_once('./views/includes/pie.php');
    }

    public function listarAuditoria()
    {
        // Información de conexión a la base de datos
        $dbDetails = array(
            'host' => 'localhost',
            'user' => 'postgres',
            'pass' => 'postgres',
            'db'   => 'bd_auditoria'
        );

        $table = <<<EOT
        (
            SELECT 
                empleados.id,
                empresas.nombre_empresa,
                empleados.cedula,
                empleados.nombre,
                empleados.apellido,
                empleados.fecha_registro
            FROM 
                empleados
            INNER JOIN 
                empresas
            ON 
                empleados.id_empresa = empresas.id
            ORDER BY 
                empleados.cedula ASC
        ) temp
        EOT;

        // Llave primaria de la tabla
        $primaryKey = 'id';

        // Configuración de columnas
        $columns = array(
            array('db' => 'id',             'dt' => 0),
            array('db' => 'nombre_empresa', 'dt' => 1),
            array('db' => 'cedula',         'dt' => 2),
            array('db' => 'nombre',         'dt' => 3),
            array('db' => 'apellido',       'dt' => 4),
            array('db' => 'fecha_registro', 'dt' => 5)
        );

        // Incluir clase SSP para procesar consultas SQL
        require './config/ssp.class.php';

        // Salida en formato JSON
        echo json_encode(
            SSP::simple($_GET, $dbDetails, $table, $primaryKey, $columns)
        );
    }





    public function registrarAuditoria()
    {
        session_start();
        $modelAuditoria = new AuditoriaModel();

        $id_empresa = $_POST['id_empresa'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $cedula = $_POST['cedula'];
        $cotiza = $_POST['cotiza'];
        $sexo = $_POST['sexo'];
        $estado_civil = $_POST['estado_civil'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $edad = $_POST['edad'];
        $nacionalidad = $_POST['nacionalidad'];
        $carga_familiar = $_POST['carga_familiar'];
        $zurdo = $_POST['zurdo'];
        $peso = $_POST['peso'];
        $camisa = $_POST['camisa'];
        $chaqueta = $_POST['chaqueta'];
        $falto = $_POST['falto'];
        $falda = $_POST['falda'];
        $pantalon = $_POST['pantalon'];
        $braga = $_POST['braga'];
        $bata = $_POST['bata'];
        $zapato = $_POST['zapato'];
        $certificadosalud = $_POST['certificadosalud'];
        $fechavencimientosalud = $_POST['fechavencimientosalud'];
        $estatura = $_POST['estatura'];
        $vehiculo = $_POST['vehiculo'];
        $licencia = $_POST['licencia'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $placa = $_POST['placa'];
        $color = $_POST['color'];
        $direccionhabitacion = $_POST['direccionhabitacion'];
        $avenida = $_POST['avenida'];
        $conjunto_residencial = $_POST['conjunto_residencial'];
        $edificio = $_POST['edificio'];
        $casa = $_POST['casa'];
        $quinta = $_POST['quinta'];
        $piso = $_POST['piso'];
        $departamento = $_POST['departamento'];
        $urbanizacion = $_POST['urbanizacion'];
        $ciudad = $_POST['ciudad'];
        $ubicacion = $_POST['ubicacion'];
        $telefonohabitacion = $_POST['telefonohabitacion'];
        $telefonocelular = $_POST['telefonocelular'];
        $otrotelefono = $_POST['otrotelefono'];
        $email = $_POST['email'];
        $grado = $_POST['grado'];
        $institucion = $_POST['institucion'];
        $localidad = $_POST['localidad'];
        $especialidad = $_POST['especialidad'];
        $ultimo_a = $_POST['ultimo_a'];
        $graduado = $_POST['graduado'];
        $estudiando = $_POST['estudiando'];
        $institucion_actual = $_POST['institucion_actual'];
        $carrera_actual = $_POST['carrera_actual'];
        $especialidad_actual = $_POST['especialidad_actual'];
        $horario_inicio = $_POST['horario_inicio'];
        $horario_fin = $_POST['horario_fin'];
        $fecha_desde = $_POST['fecha_desde'];
        $fecha_hasta = $_POST['fecha_hasta'];
        $postgrado = $_POST['postgrado'];
        $tipopostgrado = $_POST['tipopostgrado'];
        $especificaciones = $_POST['especificaciones'];
        $tipojornada = $_POST['tipojornada'];
        $realizariaguardia = $_POST['realizariaguardia'];
        $horarioguardia = $_POST['horarioguardia'];
        $tipoguardia = $_POST['tipoguardia'];
        $idioma = $_POST['idioma'];
        $hablar = $_POST['hablar'];
        $leer = $_POST['leer'];
        $escribir = $_POST['escribir'];
        $nivel = $_POST['nivel'];
        $nombrefamiliar = $_POST['nombrefamiliar'];
        $apellidofamiliar = $_POST['apellidofamiliar'];
        $cedulafamiliar = $_POST['cedulafamiliar'];
        $parentesco = $_POST['parentesco'];
        $fecha_nacimiento_familiar = $_POST['fecha_nacimiento_familiar'];
        $sexofamiliar = $_POST['sexofamiliar'];
        $trabajafamiliar = $_POST['trabajafamiliar'];
        $dondetrabajafamiliar = $_POST['dondetrabajafamiliar'];

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
            'id_empresa' => $id_empresa,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'cedula' => $cedula,
            'cotiza' => $cotiza,
            'sexo' => $sexo,
            'estado_civil' => $estado_civil,
            'fecha_nacimiento' => $fecha_nacimiento,
            'edad' => $edad,
            'nacionalidad' => $nacionalidad,
            'carga_familiar' => $carga_familiar,
            'zurdo' => $zurdo,
            'peso' => $peso,
            'camisa' => $camisa,
            'chaqueta' => $chaqueta,
            'falto' => $falto,
            'falda' => $falda,
            'pantalon' => $pantalon,
            'braga' => $braga,
            'bata' => $bata,
            'zapato' => $zapato,
            'certificadosalud' => $certificadosalud,
            'fechavencimientosalud' => $fechavencimientosalud,
            'estatura' => $estatura,
            'vehiculo' => $vehiculo,
            'licencia' => $licencia,
            'marca' => $marca,
            'modelo' => $modelo,
            'anio' => $anio,
            'placa' => $placa,
            'color' => $color,
            'direccionhabitacion' => $direccionhabitacion,
            'avenida' => $avenida,
            'conjunto_residencial' => $conjunto_residencial,
            'edificio' => $edificio,
            'casa' => $casa,
            'quinta' => $quinta,
            'piso' => $piso,
            'departamento' => $departamento,
            'urbanizacion' => $urbanizacion,
            'ciudad' => $ciudad,
            'ubicacion' => $ubicacion,
            'telefonohabitacion' => $telefonohabitacion,
            'telefonocelular' => $telefonocelular,
            'otrotelefono' => $otrotelefono,
            'email' => $email,
            'grado' => $grado,
            'institucion' => $institucion,
            'localidad' => $localidad,
            'especialidad' => $especialidad,
            'ultimo_a' => $ultimo_a,
            'graduado' => $graduado,
            'estudiando' => $estudiando,
            'institucion_actual' => $institucion_actual,
            'carrera_actual' => $carrera_actual,
            'especialidad_actual' => $especialidad_actual,
            'horario_inicio' => $horario_inicio,
            'horario_fin' => $horario_fin,
            'fecha_desde' => $fecha_desde,
            'fecha_hasta' => $fecha_hasta,
            'postgrado' => $postgrado,
            'tipopostgrado' => $tipopostgrado,
            'especificaciones' => $especificaciones,
            'tipojornada' => $tipojornada,
            'realizariaguardia' => $realizariaguardia,
            'horarioguardia' => $horarioguardia,
            'tipoguardia' => $tipoguardia,
            'idioma' => $idioma,
            'hablar' => $hablar,
            'leer' => $leer,
            'escribir' => $escribir,
            'nivel' => $nivel,
            'nombrefamiliar' => $nombrefamiliar,
            'apellidofamiliar' => $apellidofamiliar,
            'cedulafamiliar' => $cedulafamiliar,
            'parentesco' => $parentesco,
            'fecha_nacimiento_familiar' => $fecha_nacimiento_familiar,
            'sexofamiliar' => $sexofamiliar,
            'trabajafamiliar' => $trabajafamiliar,
            'dondetrabajafamiliar' => $dondetrabajafamiliar
        ];

        // Insertar el registro en la base de datos
        $resultado = $modelAuditoria->registrarAuditoriaTemporal($datos);

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            $data = [
                'data' => [
                    'success' => true,
                    'message' => 'Familiar agregado exitosamente',
                    'info' => 'El familiar se ha agregado a la lista temporal.',
                    'nombrefamiliar' => $nombrefamiliar,
                    'cedulafamiliar' => $cedulafamiliar,
                    'cedula' => $cedula,
                    'parentesco' => $parentesco,
                    'fecha_nacimiento_familiar' => $fecha_nacimiento_familiar,
                    'sexofamiliar' => $sexofamiliar,
                    'trabajafamiliar' => $trabajafamiliar,
                    'dondetrabajafamiliar' => $dondetrabajafamiliar,

                ],
                'code' => 1,
            ];
            echo json_encode($data);
            exit();
        } else {
            $data = [
                'data' => [
                    'success' => false,
                    'message' => 'Error al agregar empleado',
                    'info' => 'Hubo un problema al registrar los datos. Intente nuevamente.',
                ],
                'code' => 0,
            ];
            echo json_encode($data);
            exit();
        }
    }





    public function registrarAuditoriaTemporal()
    {
        session_start();
        $modelAuditoria = new AuditoriaModel();

        $nombrefamiliar = Validacion::limpiar_cadena($_POST['nombrefamiliar']);
        $apellidofamiliar = Validacion::limpiar_cadena($_POST['apellidofamiliar']);
        $cedulafamiliar = Validacion::limpiar_cadena($_POST['cedulafamiliar']);
        $parentesco = Validacion::limpiar_cadena($_POST['parentesco']);
        $fecha_nacimiento_familiar = Validacion::limpiar_cadena($_POST['fecha_nacimiento_familiar']);
        $sexofamiliar = Validacion::limpiar_cadena($_POST['sexofamiliar']);
        $trabajafamiliar = Validacion::limpiar_cadena($_POST['trabajafamiliar']);
        $dondetrabajafamiliar = Validacion::limpiar_cadena($_POST['dondetrabajafamiliar']);
        $id_usuario = $_SESSION['user_id'];


        /* Validar que se repita la cedula */
        $entradacedula = $modelAuditoria->validarEntradaCedula($cedulafamiliar);

        foreach ($entradacedula as $entradacedula) {
            $id_entrada_cedula = $entradacedula['id'];
        }
        if (!empty($id_entrada_cedula)) {
            $data = [
                'data' => [
                    'success'            =>  false,
                    'message'            => '  ya la sido ingresado el día de hoy',
                    'info'               =>  ' '
                ],
                'code' => 0,
            ];

            echo json_encode($data);
            exit();
        }



        $datos = array(
            'nombrefamiliar' => $nombrefamiliar,
            'apellidofamiliar' => $apellidofamiliar,
            'cedulafamiliar' => $cedulafamiliar,
            'parentesco' => $parentesco,
            'fecha_nacimiento_familiar' => $fecha_nacimiento_familiar,
            'sexofamiliar' => $sexofamiliar,
            'trabajafamiliar' => $trabajafamiliar,
            'dondetrabajafamiliar' => $dondetrabajafamiliar,
            'id_usuario' => $id_usuario,
        );

        $resultado = $modelAuditoria->registrarAuditoriaTemporal($datos);

        $id_temporal = $resultado['ultimo_id'];

        if ($resultado) {
            $data = [
                'data' => [
                    'success' => true,
                    'nombrefamiliar' => $nombrefamiliar,
                    'apellidofamiliar' => $apellidofamiliar,
                    'cedulafamiliar' => $cedulafamiliar,
                    'parentesco' => $parentesco,
                    'fecha_nacimiento_familiar' => $fecha_nacimiento_familiar,
                    'sexofamiliar' => $sexofamiliar,
                    'trabajafamiliar' => $trabajafamiliar,
                    'dondetrabajafamiliar' => $dondetrabajafamiliar,
                    'id_usuario' => $id_usuario,
                    'id_temporal'   => $id_temporal,
                ],
                'code' => 1,
            ];
            echo json_encode($data);
            exit();
        } else {
            $data = [
                'data' => [
                    'success' => false,
                ],
                'code' => 0,
            ];

            echo json_encode($data);
            exit();
        }
    }


    public function eliminarAuditoriaTemporal()
    {
        $modelAuditoria = new AuditoriaModel();


        $id_temporal = $_POST['id_temporal'];


        $eliminar_item = $modelAuditoria->eliminarAuditoriaTemporal($id_temporal);


        $obtener_contador_auditoria_temporales = $modelAuditoria->obtenerContadorAuditoriaTemporales();

        foreach ($obtener_contador_auditoria_temporales as $item) {
            $contador_auditoria_temporales = $item['contador_auditoria_temporales'];
        }

        if ($eliminar_item) {

            $data = [
                'data' => [
                    'success'       => true,
                    'message'       => 'La informacion del grupo familiar fue eliminado exitosamente',
                    'info'          => '',
                    'id_temporal'   => $id_temporal,
                    'contador'      => $contador_auditoria_temporales,
                ],
                'code' => 1,
            ];
            echo json_encode($data);
            exit();
        } else {

            $data = [
                'data' => [
                    'error'   => false,
                    'message' => 'La informacion del grupo familiar fue eliminado exitosamente',
                    'info'    => '',
                    'contador'  => $contador_auditoria_temporales,
                ],
                'code' => 0,
            ];
            echo json_encode($data);
            exit();
        }



        echo json_encode($data);
        exit();
    }
}
