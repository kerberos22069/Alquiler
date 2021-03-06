<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    -¡UNO! -¡¡ +4 !!  \\

include_once realpath('../dao/interfaz/IAlquilerDao.php');
include_once realpath('../dto/Alquiler.php');
include_once realpath('../dto/Cliente.php');
include_once realpath('../dto/Producto.php');
include_once realpath('../dto/Factura.php');

class AlquilerDao implements IAlquilerDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Alquiler en la base de datos.
     * @param alquiler objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($alquiler){
$fecha_inicio=$alquiler->getFecha_inicio();
$cantidad=$alquiler->getCantidad();
$valor=$alquiler->getValor();
$producto_idprod=$alquiler->getProducto_idprod()->getIdprod();
$factura_idfactura=$alquiler->getFactura_idfactura()->getIdfactura();
$movimientos = $alquiler->getAlq_devuelto();
      try {
          $sql= "INSERT INTO `alquiler`(`fecha_inicio`, `cantidad`, `valor`, `producto_idprod`, `factura_idfactura`,`alq_devuelto`,`alq_stado`)"
          ."VALUES ('$fecha_inicio','$cantidad','$valor','$producto_idprod','$factura_idfactura','$movimientos',0)";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null \n' . $e->getMessage());
      }
  }

    /**
     * Busca un objeto Alquiler en la base de datos.
     * @param alquiler objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($alquiler){
      $idalquiler=$alquiler->getIdalquiler();

      try {
          $sql= "SELECT `idalquiler`, `fecha_inicio`,  `cantidad`, `valor`, `pagado`, `fechafin`, `producto_idprod`, `factura_idfactura`, `alq_stado`, `alq_devuelto`"
          ."FROM `alquiler`"
          ."WHERE `idalquiler`='$idalquiler'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $alquiler->setIdalquiler($data[$i]['idalquiler']);
          $alquiler->setFecha_inicio($data[$i]['fecha_inicio']);
          $alquiler->setCantidad($data[$i]['cantidad']);
          $alquiler->setValor($data[$i]['valor']);
          $alquiler->setPagado($data[$i]['pagado']);
          $alquiler->setFechafin($data[$i]['fechafin']);
           $producto = new Producto();
           $producto->setIdprod($data[$i]['producto_idprod']);
           $alquiler->setProducto_idprod($producto);
           $factura = new Factura();
           $factura->setIdfactura($data[$i]['factura_idfactura']);
           $alquiler->setFactura_idfactura($factura);
          $alquiler->setAlq_stado($data[$i]['alq_stado']);
          $alquiler->setAlq_devuelto($data[$i]['alq_devuelto']);

          }
      return $alquiler;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Alquiler en la base de datos.
     * @param alquiler objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($alquiler){
      $idalquiler=$alquiler->getIdalquiler();
$fecha_inicio=$alquiler->getFecha_inicio();
$cantidad=$alquiler->getCantidad();
$valor=$alquiler->getValor();
$pagado=$alquiler->getPagado();
$fechafin=$alquiler->getFechafin();
$producto_idprod=$alquiler->getProducto_idprod()->getIdprod();
$factura_idfactura=$alquiler->getFactura_idfactura()->getIdfactura();
$alq_stado=$alquiler->getAlq_stado();
$alq_devuelto=$alquiler->getAlq_devuelto();

      try {
          $sql= "UPDATE `alquiler` SET`idalquiler`='$idalquiler' ,`fecha_inicio`='$fecha_inicio' ,`cantidad`='$cantidad' ,`valor`='$valor' ,`pagado`='$pagado' ,`fechafin`='$fechafin' ,`producto_idprod`='$producto_idprod' ,`factura_idfactura`='$factura_idfactura' ,`alq_stado`='$alq_stado' ,`alq_devuelto`='$alq_devuelto' WHERE `idalquiler`='$idalquiler' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Alquiler en la base de datos.
     * @param alquiler objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($alquiler){
      $idalquiler=$alquiler->getIdalquiler();

      try {
          $sql ="DELETE FROM `alquiler` WHERE `idalquiler`='$idalquiler'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Alquiler en la base de datos.
     * @return ArrayList<Alquiler> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idalquiler`, `fecha_inicio`, `cantidad`, `valor`, `pagado`, `fechafin`, `producto_idprod`, `factura_idfactura`, `alq_stado`, `alq_devuelto`"
          ."FROM `alquiler`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $alquiler= new Alquiler();
          $alquiler->setIdalquiler($data[$i]['idalquiler']);
          $alquiler->setFecha_inicio($data[$i]['fecha_inicio']);
          $alquiler->setCantidad($data[$i]['cantidad']);
          $alquiler->setValor($data[$i]['valor']);
          $alquiler->setPagado($data[$i]['pagado']);
          $alquiler->setFechafin($data[$i]['fechafin']);
           $producto = new Producto();
           $producto->setIdprod($data[$i]['producto_idprod']);
           $alquiler->setProducto_idprod($producto);
           $factura = new Factura();
           $factura->setIdfactura($data[$i]['factura_idfactura']);
           $alquiler->setFactura_idfactura($factura);
          $alquiler->setAlq_stado($data[$i]['alq_stado']);
          $alquiler->setAlq_devuelto($data[$i]['alq_devuelto']);

          array_push($lista,$alquiler);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
  public function listxAll(){
      $lista = array();
      try {
          $sql ="SELECT `fecha`, `idfactura`, `cliente_cc`, `cliente_nombre`, `fact_observacion`, `estado` FROM `reporte_ordenes` WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $alquiler= new Alquiler();
          $alquiler->setIdalquiler($data[$i]['idfactura']);
          $alquiler->setFecha_inicio($data[$i]['fecha']);
          $alquiler->setCantidad($data[$i]['cliente_cc']);
          $alquiler->setValor($data[$i]['cliente_nombre']);
          $alquiler->setPagado($data[$i]['fact_observacion']);
          $alquiler->setFechafin($data[$i]['estado']);
          
          array_push($lista,$alquiler);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listByFactura($factura_id){
      $lista = array();
      try {
          $sql ="SELECT `idalquiler`, `fecha_inicio`, `cantidad`, `valor`, `pagado`, `fechafin`, `producto_idprod`, `factura_idfactura`, `alq_stado`, `alq_devuelto`"
          ."FROM `alquiler`"
          ."WHERE `factura_idfactura` = '$factura_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $alquiler= new Alquiler();
          $alquiler->setIdalquiler($data[$i]['idalquiler']);
          $alquiler->setFecha_inicio($data[$i]['fecha_inicio']);
           
          $alquiler->setCantidad($data[$i]['cantidad']);
          $alquiler->setValor($data[$i]['valor']);
          $alquiler->setPagado($data[$i]['pagado']);
          $alquiler->setFechafin($data[$i]['fechafin']);
           $producto = new Producto();
           $producto->setIdprod($data[$i]['producto_idprod']);
           $alquiler->setProducto_idprod($producto);
           $factura = new Factura();
           $factura->setIdfactura($data[$i]['factura_idfactura']);
           $alquiler->setFactura_idfactura($factura);
          $alquiler->setAlq_stado($data[$i]['alq_stado']);
          $alquiler->setAlq_devuelto($data[$i]['alq_devuelto']);

          array_push($lista,$alquiler);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    public function editarAlquiler($alquiler){
      $idalquiler = $alquiler->getIdalquiler();
      $cantidad = $alquiler->getCantidad();
      $valor = $alquiler->getValor();
      $movimientos = $alquiler->getAlq_devuelto();
      try {

          $sql= "UPDATE `alquiler` SET `cantidad`='$cantidad' ,`valor`='$valor', `alq_devuelto` = '$movimientos' WHERE `idalquiler`='$idalquiler' ";
          $this->insertarConsulta($sql);
          return true;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
          return false;
      }
  }


  public function insert_json_devolucion($idAlquiler, $cantidad, $estado){
      try {
          $sql ="SELECT `alq_devuelto` FROM `alquiler` WHERE `idalquiler` = '$idAlquiler'";
          $json_devuelto = json_decode($this->ejecutarConsulta($sql));
          $array_push($json_devuelto, array('fecha' => date('Y-d-m h:i:s', time()), 'cantidad'=>$cantidad, 'estado'=>$estado ));
          $json_text = json_encode($json_devuelto);

          
          $sql= "INSERT INTO `alquiler`(alq_devuelto`) VALUES ('$json_text')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null \n' . $e->getMessage());
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