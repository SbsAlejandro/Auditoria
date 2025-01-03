<?php

require_once 'ModeloBase.php';

class AuditoriaModel extends ModeloBase
{

    public function __construct()
    {
        parent::__construct();
    }

    /*------------ Metodo para registrar Prestario--------*/
    public function registrarAuditoriatemporales($datos)
    {
        $db = new ModeloBase();
        try {
            $insertar = $db->insertar('temporal_familiar', $datos);
            return $insertar;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
