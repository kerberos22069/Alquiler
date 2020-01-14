<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Factura.php');
require_once realpath('../dao/interfaz/IFacturaDao.php');
require_once realpath('../dto/Cliente.php');

class FacturaFacade {
 
  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Factura a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfactura
   * @param fecha
   * @param fac_descueto
   * @param cliente_idcliente
   */
  public static function insert( $idfactura,  $fecha,  $fac_descueto,  $cliente_idcliente){
      $factura = new Factura();
      $factura->setIdfactura($idfactura); 
      $factura->setFecha($fecha); 
      $factura->setFac_descueto($fac_descueto); 
      $factura->setCliente_idcliente($cliente_idcliente); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $rtn = $facturaDao->insert($factura);
     $facturaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Factura de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfactura
   * @return El objeto en base de datos o Null
   */
  public static function select($idfactura){
      $factura = new Factura();
      $factura->setIdfactura($idfactura); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $result = $facturaDao->select($factura);
     $facturaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Factura  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfactura
   * @param fecha
   * @param fac_descueto
   * @param cliente_idcliente
   */
  public static function update($idfactura, $fecha, $fac_descueto, $cliente_idcliente){
      $factura = self::select($idfactura);
      $factura->setFecha($fecha); 
      $factura->setFac_descueto($fac_descueto); 
      $factura->setCliente_idcliente($cliente_idcliente); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $facturaDao->update($factura);
     $facturaDao->close();
  }

  /**
   * Elimina un objeto Factura de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idfactura
   */
  public static function delete($idfactura){
      $factura = new Factura();
      $factura->setIdfactura($idfactura); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $facturaDao->delete($factura);
     $facturaDao->close();
  }

  /**
   * Lista todos los objetos Factura de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Factura en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $result = $facturaDao->listAll();
     $facturaDao->close();
     return $result;
  }
  
  public static function listRange($fecha_ini, $fecha_fin){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $result = $facturaDao->listRange($fecha_ini, $fecha_fin);
     $facturaDao->close();
     return $result;
  }
  
  public static function listByCliente($Cliente_idcliente){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facturaDao =$FactoryDao->getfacturaDao(self::getDataBaseDefault());
     $result = $facturaDao->listByCliente($Cliente_idcliente);
     $facturaDao->close();
     return $result;
  }

}
//That`s all folks!