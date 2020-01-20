<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');
include_once realpath('../dao/entities/GeneralDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de AlquilerDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AlquilerDao
     */
     public function getAlquilerDao($dbName){
        return new AlquilerDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ClienteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ClienteDao
     */
     public function getClienteDao($dbName){
        return new ClienteDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FacturaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacturaDao
     */
     public function getFacturaDao($dbName){
        return new FacturaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Libro_diarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Libro_diarioDao
     */
     public function getLibro_diarioDao($dbName){
        return new Libro_diarioDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ProductoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProductoDao
     */
     public function getProductoDao($dbName){
        return new ProductoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de TransporteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TransporteDao
     */
     public function getTransporteDao($dbName){
        return new TransporteDao($this->conn->obtener($dbName));
    }
    
    public function getGeneralDao($dbName){
        return new GeneralDao($this->conn->obtener($dbName));
    }

}
//That`s all folks!