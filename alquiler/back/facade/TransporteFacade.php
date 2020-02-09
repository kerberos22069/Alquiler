<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Transporte.php');
require_once realpath('../dao/interfaz/ITransporteDao.php');
require_once realpath('../dto/Factura.php');

class TransporteFacade {

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
   * Crea un objeto Transporte a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtransporte
   * @param transporte_flete
   * @param factura_idfactura
   * @param transporte_conductor
   */
  public static function insert($transporte_flete,  $factura_idfactura,  $transporte_conductor){
      $transporte = new Transporte();
      $transporte->setTransporte_flete($transporte_flete); 
      $transporte->setFactura_idfactura($factura_idfactura); 
      $transporte->setTransporte_conductor($transporte_conductor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $transporteDao =$FactoryDao->gettransporteDao(self::getDataBaseDefault());
     $rtn = $transporteDao->insert($transporte);
     $transporteDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Transporte de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtransporte
   * @return El objeto en base de datos o Null
   */
  public static function select($idtransporte){
      $transporte = new Transporte();
      $transporte->setIdtransporte($idtransporte); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $transporteDao =$FactoryDao->gettransporteDao(self::getDataBaseDefault());
     $result = $transporteDao->select($transporte);
     $transporteDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Transporte  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtransporte
   * @param transporte_flete
   * @param factura_idfactura
   * @param transporte_conductor
   */
  public static function update($idtransporte, $transporte_flete, $factura_idfactura, $transporte_conductor){
      $transporte = self::select($idtransporte);
      $transporte->setTransporte_flete($transporte_flete); 
      $transporte->setFactura_idfactura($factura_idfactura); 
      $transporte->setTransporte_conductor($transporte_conductor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $transporteDao =$FactoryDao->gettransporteDao(self::getDataBaseDefault());
     $transporteDao->update($transporte);
     $transporteDao->close();
  }

  /**
   * Elimina un objeto Transporte de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idtransporte
   */
  public static function delete($idtransporte){
      $transporte = new Transporte();
      $transporte->setIdtransporte($idtransporte); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $transporteDao =$FactoryDao->gettransporteDao(self::getDataBaseDefault());
     $transporteDao->delete($transporte);
     $transporteDao->close();
  }

  /**
   * Lista todos los objetos Transporte de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Transporte en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $transporteDao =$FactoryDao->gettransporteDao(self::getDataBaseDefault());
     $result = $transporteDao->listAll();
     $transporteDao->close();
     return $result;
  }
  
  public static function listByFactura($factura_id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $transporteDao =$FactoryDao->gettransporteDao(self::getDataBaseDefault());
     $result = $transporteDao->listByFactura($factura_id);
     $transporteDao->close();
     return $result;
  }


}
//That`s all folks!