<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\
    require_once realpath('../dao/factory/FactoryDao.php');
    include_once realpath('../dao/entities/GeneralDao.php');

/**
   * Para su comodidad, defina aquÃ­ el gestor de conexiÃ³n predilecto para su proyecto
   */
    define("DEFAULT_GESTOR", FactoryDao::$MYSQL_FACTORY);
  /**
   * Para su comodidad, defina aquÃ­ el nombre de base de datos predilecto para su proyecto
   */    
    define("DEFAULT_DBNAME", "alquiler");

    class GlobalController{
    
    static function getGeneralDaoInstance(){
        $FactoryDao=new FactoryDao(DEFAULT_GESTOR);
        return $FactoryDao->getGeneralDao(DEFAULT_DBNAME);
    }
    
    }
    
//That`s all folks!