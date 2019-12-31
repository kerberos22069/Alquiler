<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\

include_once realpath('../dao/entities/AlquilerDao.php');
include_once realpath('../dao/entities/ClienteDao.php');
include_once realpath('../dao/entities/FacturaDao.php');
include_once realpath('../dao/entities/Libro_diarioDao.php');
include_once realpath('../dao/entities/ProductoDao.php');
include_once realpath('../dao/entities/TransporteDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de AlquilerDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AlquilerDao
     */
     public function getAlquilerDao($dbName);
     /**
     * Devuelve una instancia de ClienteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ClienteDao
     */
     public function getClienteDao($dbName);
     /**
     * Devuelve una instancia de FacturaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacturaDao
     */
     public function getFacturaDao($dbName);
     /**
     * Devuelve una instancia de Libro_diarioDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Libro_diarioDao
     */
     public function getLibro_diarioDao($dbName);
     /**
     * Devuelve una instancia de ProductoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProductoDao
     */
     public function getProductoDao($dbName);
     /**
     * Devuelve una instancia de TransporteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TransporteDao
     */
     public function getTransporteDao($dbName);

}
//That`s all folks!