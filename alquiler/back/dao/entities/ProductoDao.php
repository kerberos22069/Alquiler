<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si mi madre entendiera mi código, estaría orgullosa  \\

include_once realpath('../dao/interfaz/IProductoDao.php');
include_once realpath('../dto/Producto.php');

class ProductoDao implements IProductoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Producto en la base de datos.
     * @param producto objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($producto){
//      $idprod=$producto->getIdprod();
$prod_nombre=$producto->getProd_nombre();
$prod_descripcion=$producto->getProd_descripcion();
$prod_precio=$producto->getProd_precio();
$prod_stock=$producto->getProd_stock();
$prod_alquilado=$producto->getProd_alquilado();
$prod_reparacion=$producto->getProd_reparacion();
$prod_danado=$producto->getProd_danado();

      try {
          $sql= "INSERT INTO `producto`(  `prod_nombre`, `prod_descripcion`, `prod_precio`, `prod_stock`, `prod_alquilado`, `prod_reparacion`, `prod_danado`)"
          ."VALUES ('$prod_nombre','$prod_descripcion','$prod_precio','$prod_stock','$prod_alquilado','$prod_reparacion','$prod_danado')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Producto en la base de datos.
     * @param producto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($producto){
      $idprod=$producto->getIdprod();
      var_dump($idprod);

      try {
          $sql= "SELECT `idprod`, `prod_nombre`, `prod_descripcion`, `prod_precio`, `prod_stock`, `prod_alquilado`, `prod_reparacion`, `prod_danado`"
          ."FROM `producto`"
          ."WHERE `idprod`='$idprod'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $producto->setIdprod($data[$i]['idprod']);
          $producto->setProd_nombre($data[$i]['prod_nombre']);
          $producto->setProd_descripcion($data[$i]['prod_descripcion']);
          $producto->setProd_precio($data[$i]['prod_precio']);
          $producto->setProd_stock($data[$i]['prod_stock']);
          $producto->setProd_alquilado($data[$i]['prod_alquilado']);
          $producto->setProd_reparacion($data[$i]['prod_reparacion']);
          $producto->setProd_danado($data[$i]['prod_danado']);

          }
      return $producto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Producto en la base de datos.
     * @param producto objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($producto){
      $idprod=$producto->getIdprod();
$prod_nombre=$producto->getProd_nombre();
$prod_descripcion=$producto->getProd_descripcion();
$prod_precio=$producto->getProd_precio();
$prod_stock=$producto->getProd_stock();
$prod_alquilado=$producto->getProd_alquilado();
$prod_reparacion=$producto->getProd_reparacion();
$prod_danado=$producto->getProd_danado();

      try {
          $sql= "UPDATE `producto` SET `prod_nombre`='$prod_nombre' ,`prod_descripcion`='$prod_descripcion' ,`prod_precio`='$prod_precio' ,`prod_stock`='$prod_stock' ,`prod_alquilado`='$prod_alquilado' ,`prod_reparacion`='$prod_reparacion' ,`prod_danado`='$prod_danado' WHERE `idprod`='$idprod' ";
          var_dump($sql);
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  public function update_delete($id_prod){
//      $idprod=$producto->getIdprod();


      try {
          $sql= "UPDATE `producto` SET `prod_stado`='0'  WHERE `idprod`='$id_prod' ";

         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Producto en la base de datos.
     * @param producto objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($producto){
      $idprod=$producto->getIdprod();

      try {
          $sql ="DELETE FROM `producto` WHERE `idprod`='$idprod'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Producto en la base de datos.
     * @return ArrayList<Producto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idprod`, `prod_nombre`, `prod_descripcion`, `prod_precio`, `prod_stock`, `prod_alquilado`, `prod_reparacion`, `prod_danado`"
          ."FROM `producto`"
          ."WHERE `prod_stado`=1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $producto= new Producto();
          $producto->setIdprod($data[$i]['idprod']);
          $producto->setProd_nombre($data[$i]['prod_nombre']);
          $producto->setProd_descripcion($data[$i]['prod_descripcion']);
          $producto->setProd_precio($data[$i]['prod_precio']);
          $producto->setProd_stock($data[$i]['prod_stock']);
          $producto->setProd_alquilado($data[$i]['prod_alquilado']);
          $producto->setProd_reparacion($data[$i]['prod_reparacion']);
          $producto->setProd_danado($data[$i]['prod_danado']);

          array_push($lista,$producto);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function list_detalles($id_prod){
      $lista = array();
      try {
          $sql ="SELECT `idprod`, `prod_nombre`, `prod_descripcion`, `prod_precio`, `prod_stock`, `prod_alquilado`, `prod_reparacion`, `prod_danado` ,`foto`"
          ."FROM `producto`"
          ."WHERE  `idprod` ='$id_prod'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $producto= new Producto();
          $producto->setIdprod($data[$i]['idprod']);
          $producto->setProd_nombre($data[$i]['prod_nombre']);
          $producto->setProd_descripcion($data[$i]['prod_descripcion']);
          $producto->setProd_precio($data[$i]['prod_precio']);
          $producto->setProd_stock($data[$i]['prod_stock']);
          $producto->setProd_alquilado($data[$i]['prod_alquilado']);
          $producto->setProd_reparacion($data[$i]['prod_reparacion']);
          $producto->setProd_danado($data[$i]['prod_danado']);
          $producto->setFoto($data[$i]['foto']);

          array_push($lista,$producto);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!