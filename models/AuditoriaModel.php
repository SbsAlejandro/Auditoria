<?php

require_once 'ModeloBase.php';

class AuditoriaModel extends ModeloBase
{

  public function __construct()
  {
    parent::__construct();
  }



  public function verAuditoria($id_auditoria)
  {
    $db = new ModeloBase();
    $query = "SELECT 
                    e.id, 
                    e.cedula, 
                    e.nombre, 
                    e.apellido, 
                    e.cotiza, 
                    e.sexo, 
                    e.estado_civil, 
                    e.fecha_nacimiento, 
                    e.edad, 
                    e.nacionalidad, 
                    e.carga_familiar, 
                    e.zurdo, 
                    e.peso, 
                    e.camisa, 
                    e.chaqueta, 
                    e.falto, 
                    e.falda, 
                    e.pantalon, 
                    e.braga, 
                    e.bata, 
                    e.zapato, 
                    e.certificadosalud, 
                    e.tipo_propiedad, 
                    e.desc_tipo_propiedad, 
                    e.urbanizacion, 
                    e.ciudad, 
                    e.ubicacion, 
                    e.telefonohabitacion, 
                    e.telefonocelular, 
                    e.otrotelefono, 
                    e.email, 
                    e.grado, 
                    e.institucion, 
                    e.localidad, 
                    e.especialidad, 
                    e.ultimo_a, 
                    e.graduado, 
                    e.estudiando, 
                    e.institucion_actual, 
                    e.carrera_actual, 
                    e.especialidad_actual, 
                    e.horario_inicio, 
                    e.horario_fin, 
                    e.fecha_desde, 
                    e.fecha_hasta, 
                    e.postgrado, 
                    e.tipopostgrado, 
                    e.especificaciones, 
                    e.tipojornada, 
                    e.realizariaguardia, 
                    e.horarioguardia, 
                    e.idioma, 
                    e.nombrefamiliar, 
                    e.apellidofamiliar, 
                    e.cedulafamiliar, 
                    e.parentesco, 
                    e.fecha_nacimiento_familiar, 
                    e.sexofamiliar, 
                    e.trabajafamiliar, 
                    e.vehiculo, 
                    e.licencia, 
                    e.marca, 
                    e.modelo, 
                    e.anio, 
                    e.placa, 
                    e.color, 
                    e.fechavencimientosalud, 
                    e.estatura, 
                    e.direccionhabitacion, 
                    e.avenida, 
                    e.conjunto_residencial, 
                    e.edificio, 
                    e.casa, 
                    e.quinta, 
                    e.piso, 
                    e.departamento, 
                    e.tipoguardia, 
                    e.hablar, 
                    e.leer, 
                    e.escribir, 
                    e.nivel, 
                    e.dondetrabajafamiliar, 
                    e.id_empresa, 
                    e.fecha_registro, 
                    emp.nombre_empresa, 
                    emp.cant_empleados_actual
                  FROM 
                    public.empleados AS e
                  LEFT JOIN 
                    public.empresas AS emp ON e.id_empresa = emp.id
                  WHERE 
                    e.id = $id_auditoria";

    $resultado = $db->obtenerTodos($query);
    return $resultado;
  }


  /*------------ Metodo para registrar Auditoria Temporal--------*/
  public function registrarAuditoriaTemporal($datos)
  {
    $db = new ModeloBase();
    try {
      $insertar = $db->insertar('temporal_familiar_auditoria', $datos);
      return $insertar;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function eliminarAuditoriaTemporal($id)
  {
    $db = new ModeloBase();
    $query = "DELETE FROM temporal_familiar_auditoria
  WHERE id=$id";
    $resultado = $db->obtenerTodos($query);
    return $resultado;
  }
  public function obtenerContadorAuditoriasTemporales()
  {
    $db = new ModeloBase();
    $query = "SELECT COUNT(*) AS contador_auditorias_temporales FROM temporal_familiar_auditoria";
    $resultado = $db->obtenerTodos($query);
    return $resultado;
  }
}
