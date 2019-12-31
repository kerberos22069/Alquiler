<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Producto.php');
require_once realpath('../dao/interfaz/IProductoDao.php');

class ProductoFacade {

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
   * Crea un objeto Producto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idprod
   * @param prod_nombre
   * @param prod_descripcion
   * @param prod_precio
   * @param prod_stock
   * @param prod_disponible
   * @param prod_reparacion
   * @param prod_daÃÂ±ado
   */
  public static function insert( $idprod,  $prod_nombre,  $prod_descripcion,  $prod_precio,  $prod_stock,  $prod_disponible,  $prod_reparacion,  $prod_daÃÂ±ado){
      $producto = new Producto();
      $producto->setIdprod($idprod); 
      $producto->setProd_nombre($prod_nombre); 
      $producto->setProd_descripcion($prod_descripcion); 
      $producto->setProd_precio($prod_precio); 
      $producto->setProd_stock($prod_stock); 
      $producto->setProd_disponible($prod_disponible); 
      $producto->setProd_reparacion($prod_reparacion); 
      $producto->setProd_daÃÂ±ado($prod_daÃÂ±ado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productoDao =$FactoryDao->getproductoDao(self::getDataBaseDefault());
     $rtn = $productoDao->insert($producto);
     $productoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Producto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idprod
   * @return El objeto en base de datos o Null
   */
  public static function select($idprod){
      $producto = new Producto();
      $producto->setIdprod($idprod); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productoDao =$FactoryDao->getproductoDao(self::getDataBaseDefault());
     $result = $productoDao->select($producto);
     $productoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Producto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idprod
   * @param prod_nombre
   * @param prod_descripcion
   * @param prod_precio
   * @param prod_stock
   * @param prod_disponible
   * @param prod_reparacion
   * @param prod_daÃÂ±ado
   */
  public static function update($idprod, $prod_nombre, $prod_descripcion, $prod_precio, $prod_stock, $prod_disponible, $prod_reparacion, $prod_daÃÂ±ado){
      $producto = self::select($idprod);
      $producto->setProd_nombre($prod_nombre); 
      $producto->setProd_descripcion($prod_descripcion); 
      $producto->setProd_precio($prod_precio); 
      $producto->setProd_stock($prod_stock); 
      $producto->setProd_disponible($prod_disponible); 
      $producto->setProd_reparacion($prod_reparacion); 
      $producto->setProd_daÃÂ±ado($prod_daÃÂ±ado); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productoDao =$FactoryDao->getproductoDao(self::getDataBaseDefault());
     $productoDao->update($producto);
     $productoDao->close();
  }

  /**
   * Elimina un objeto Producto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param idprod
   */
  public static function delete($idprod){
      $producto = new Producto();
      $producto->setIdprod($idprod); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productoDao =$FactoryDao->getproductoDao(self::getDataBaseDefault());
     $productoDao->delete($producto);
     $productoDao->close();
  }

  /**
   * Lista todos los objetos Producto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Producto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $productoDao =$FactoryDao->getproductoDao(self::getDataBaseDefault());
     $result = $productoDao->listAll();
     $productoDao->close();
     return $result;
  }


}
//That`s all folks!