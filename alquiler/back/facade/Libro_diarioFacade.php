<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Libro_diario.php');
require_once realpath('../dao/interfaz/ILibro_diarioDao.php');

class Libro_diarioFacade {

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
   * Crea un objeto Libro_diario a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlibro_diario
   */
  public static function insert( $idlibro_diario){
      $libro_diario = new Libro_diario();
      $libro_diario->setIdlibro_diario($idlibro_diario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $libro_diarioDao =$FactoryDao->getlibro_diarioDao(self::getDataBaseDefault());
     $rtn = $libro_diarioDao->insert($libro_diario);
     $libro_diarioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Libro_diario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlibro_diario
   * @return El objeto en base de datos o Null
   */
  public static function select($idlibro_diario){
      $libro_diario = new Libro_diario();
      $libro_diario->setIdlibro_diario($idlibro_diario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $libro_diarioDao =$FactoryDao->getlibro_diarioDao(self::getDataBaseDefault());
     $result = $libro_diarioDao->select($libro_diario);
     $libro_diarioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Libro_diario  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlibro_diario
   */
  public static function update($idlibro_diario){
      $libro_diario = self::select($idlibro_diario);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $libro_diarioDao =$FactoryDao->getlibro_diarioDao(self::getDataBaseDefault());
     $libro_diarioDao->update($libro_diario);
     $libro_diarioDao->close();
  }

  /**
   * Elimina un objeto Libro_diario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idlibro_diario
   */
  public static function delete($idlibro_diario){
      $libro_diario = new Libro_diario();
      $libro_diario->setIdlibro_diario($idlibro_diario); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $libro_diarioDao =$FactoryDao->getlibro_diarioDao(self::getDataBaseDefault());
     $libro_diarioDao->delete($libro_diario);
     $libro_diarioDao->close();
  }

  /**
   * Lista todos los objetos Libro_diario de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Libro_diario en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $libro_diarioDao =$FactoryDao->getlibro_diarioDao(self::getDataBaseDefault());
     $result = $libro_diarioDao->listAll();
     $libro_diarioDao->close();
     return $result;
  }


}
//That`s all folks!