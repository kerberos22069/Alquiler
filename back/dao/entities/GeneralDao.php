<?php

class GeneralDao {
    
    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    public function comenzarTransaccion(){
        $this->cn->beginTransaction();
    }
    
    public function confirmarTransaccion(){
        $this->cn->commit();
    }
    
    public function rollback(){
        $this->cn->rollback();
    }
    
}