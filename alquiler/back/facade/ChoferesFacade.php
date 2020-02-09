<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Choferes.php');
require_once realpath('../dao/interfaz/IChoferesDao.php');

class ChoferesFacade {

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
   * Crea un objeto Choferes a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idchoferes
   * @param cc_chofer
   * @param nom_chofer
   * @param chofe_telefono
   * @param direccion
   */
  public static function insert( $cc_chofer,  $nom_chofer,  $chofe_telefono,  $direccion){
      $choferes = new Choferes();
//      $choferes->setIdchoferes($idchoferes); 
      $choferes->setCc_chofer($cc_chofer); 
      $choferes->setNom_chofer($nom_chofer); 
      $choferes->setChofe_telefono($chofe_telefono); 
      $choferes->setDireccion($direccion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $rtn = $choferesDao->insert($choferes);
     $choferesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Choferes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idchoferes
   * @return El objeto en base de datos o Null
   */
  public static function select($idchoferes){
      $choferes = new Choferes();
      $choferes->setIdchoferes($idchoferes); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $result = $choferesDao->select($choferes);
     $choferesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Choferes  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idchoferes
   * @param cc_chofer
   * @param nom_chofer
   * @param chofe_telefono
   * @param direccion
   */
  public static function update($idchoferes, $cc_chofer, $nom_chofer, $chofe_telefono, $direccion){
      $choferes = self::select($idchoferes);
      $choferes->setCc_chofer($cc_chofer); 
      $choferes->setNom_chofer($nom_chofer); 
      $choferes->setChofe_telefono($chofe_telefono); 
      $choferes->setDireccion($direccion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $choferesDao->update($choferes);
     $choferesDao->close();
  }
  public static function update_Stado($idchoferes){
//      $choferes = self::select($idchoferes);
    
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $choferesDao->update_Stado($idchoferes);
     $choferesDao->close();
  }

  /**
   * Elimina un objeto Choferes de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idchoferes
   */
  public static function delete($idchoferes){
      $choferes = new Choferes();
      $choferes->setIdchoferes($idchoferes); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $choferesDao->delete($choferes);
     $choferesDao->close();
  }

  /**
   * Lista todos los objetos Choferes de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Choferes en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $result = $choferesDao->listAll();
     $choferesDao->close();
     return $result;
  }
  public static function listAll_Detalles($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $choferesDao =$FactoryDao->getchoferesDao(self::getDataBaseDefault());
     $result = $choferesDao->listAll_Detalles($id);
     $choferesDao->close();
     return $result;
  }


}
//That`s all folks!