<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\

include_once realpath('../dao/interfaz/IFacturaDao.php');
include_once realpath('../dto/Factura.php');

class FacturaDao implements IFacturaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Factura en la base de datos.
     * @param factura objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($factura){
      $idfactura=$factura->getIdfactura();
$fecha=$factura->getFecha();
$fac_descueto=$factura->getFac_descueto();
$idCliente = $factura->getCliente_idcliente()->getIdcliente();

      try {
          $sql= "INSERT INTO `factura`( `idfactura`, `fecha`, `fac_descueto`, `abonos`, `cliente_idcliente`)"
          ."VALUES ('$idfactura','$fecha','$fac_descueto','[]','$idCliente')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Factura en la base de datos.
     * @param factura objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($factura){
      $idfactura=$factura->getIdfactura();

      try {
          $sql= "SELECT *"
          ."FROM `factura`"
          ."WHERE `idfactura`='$idfactura'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $factura->setIdfactura($data[$i]['idfactura']);
          $factura->setFecha($data[$i]['fecha']);
          $factura->setFac_descueto($data[$i]['fac_descueto']);
          $factura->setAbonos($data[$i]['abonos']);
          $cliente = new Cliente();
            $cliente->setIdcliente($data[$i]['cliente_idcliente']);
            $factura->setCliente_idcliente($cliente);

          }
      return $factura;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Factura en la base de datos.
     * @param factura objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($factura){
      $idfactura=$factura->getIdfactura();
$fecha=$factura->getFecha();
$fac_descueto=$factura->getFac_descueto();
$abonos = $factura->getAbonos();
      try {
          $sql= "UPDATE `factura` SET`idfactura`='$idfactura' ,`fecha`='$fecha' ,`fac_descueto`='$fac_descueto' , `abonos`='$abonos' WHERE `idfactura`='$idfactura' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Factura en la base de datos.
     * @param factura objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($factura){
      $idfactura=$factura->getIdfactura();

      try {
          $sql ="DELETE FROM `factura` WHERE `idfactura`='$idfactura'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Factura en la base de datos.
     * @return ArrayList<Factura> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idfactura`, `fecha`, `fac_descueto`, `cliente_idcliente`, `abonos`"
          ."FROM `factura`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $factura= new Factura();
          $factura->setIdfactura($data[$i]['idfactura']);
          $factura->setFecha($data[$i]['fecha']);
          $factura->setFac_descueto($data[$i]['fac_descueto']);
          $factura->setCliente_idcliente($data[$i]['cliente_idcliente']);
          $factura->setAbonos($data[$i]['abonos']);

          array_push($lista,$factura);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listRange($fecha_ini, $fecha_fin){
      $lista = array();
      try {
          $sql =" SELECT *
                  FROM `factura` 
                  WHERE DATE_FORMAT(`fecha`, '%Y-%m-%d') 
                  BETWEEN DATE_FORMAT('$fecha_ini', '%Y-%m-%d') 
                  AND DATE_FORMAT('$fecha_fin', '%Y-%m-%d')";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
            $factura= new Factura();
              $factura->setIdfactura($data[$i]['idfactura']); 
              $factura->setFecha($data[$i]['fecha']);
              $factura->setFac_descueto($data[$i]['fac_descueto']);
            $cliente = new Cliente();
              $cliente->setIdcliente($data[$i]['cliente_idcliente']);
            $factura->setCliente_idcliente($cliente);
            if($data[$i]['abonos'] == null){
              //Esto tiene que ser si o si un array 
              $factura->setAbonos(array());
            }else{
               $factura->setAbonos($data[$i]['abonos']); 
            }
           
          array_push($lista,$factura);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listByCliente($Cliente_idcliente){
      $lista = array();
      try {
          $sql ="SELECT `idfactura`, `fecha`, `fac_descueto`, `abonos`, `cliente_idcliente`"
          ."FROM `factura`"
          ."WHERE `cliente_idcliente` = ".$Cliente_idcliente;
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $factura= new Factura();
          $factura->setIdfactura($data[$i]['idfactura']);
          $factura->setFecha($data[$i]['fecha']);
          $factura->setFac_descueto($data[$i]['fac_descueto']);
          $factura->setAbonos($data[$i]['abonos']);
          $cliente = new Cliente();
            $cliente->setIdcliente($data[$i]['cliente_idcliente']);
            $factura->setCliente_idcliente($cliente);
          array_push($lista,$factura);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
    public function Count_fact(){
      $lista = array();
      try {
          $sql ="SELECT COUNT(*)+1 as idfactura FROM `factura` WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $factura= new Factura();
           $factura->setIdfactura($data[$i]['idfactura']);
         
          array_push($lista,$factura);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function consultarProductoNoDevueltosByFactura($factura_id){
    try {
      //Consulto el id de los productos, la cantidad alquilada y el json con la informacion de devolucion.
      //La idea es iterar sobre el Json para contar la cantidad de productos anexados y compararla con la cantidad alquilada
      $sql = "SELECT `idalquiler`, `producto_idprod`, `prod_nombre`, `cantidad`, `alq_devuelto` 
              FROM `alquiler`
              INNER JOIN `producto`
              ON  `alquiler`.`producto_idprod` = `producto`.`idprod`
              WHERE `factura_idfactura` = $factura_id";
      $data = $this->ejecutarConsulta($sql);
      for ($i=0; $i < count($data) ; $i++) {
        $rta = array();
        if(!empty($data[$i]['alq_devuelto'])){
          // Formatear el text en un json [ { cantidad: "", fecha: "", estado: "" },{...}]
          $alq_devuelto = json_decode($data[$i]['alq_devuelto']);
          // cantidad de productos devueltos
          $cant_devuelto = 0;
          // Itero cada devolucion y sumo la cantidad de cada devolucion
          foreach ($alq_devuelto as $devolucion) {
            $cant_devuelto = $cant_devuelto + $devolucion['cantidad'];
          }
          //Cuando la cantidad devuelto sea menor que la cantidad alquilada significa que todavia faltan por entregar
          if( $cant_devuelto < $data[$i]['cantidad'] ){
            array_push($rta, array( 'alquiler_id' => $data[$i]['idalquiler'], 
                                    'producto_nombre' => $data[$i]['prod_nombre'],
                                    'devoluciones' => $alq_devuelto,
                                    'cant_faltante' => ($data[$i]['cantidad'] - $cant_devuelto)
                                  )
                      );
          }
        }       
      }
      return $rta;
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