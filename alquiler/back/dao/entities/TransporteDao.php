<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\

include_once realpath('../dao/interfaz/ITransporteDao.php');
include_once realpath('../dto/Transporte.php');
include_once realpath('../dto/Factura.php');
include_once realpath('../dto/Choferes.php');

class TransporteDao implements ITransporteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Transporte en la base de datos.
     * @param transporte objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($transporte){
//      $idtransporte=$transporte->getIdtransporte();
$transporte_flete=$transporte->getTransporte_flete();
$factura_idfactura=$transporte->getFactura_idfactura()->getIdfactura();
$transporte_conductor=$transporte->getTransporte_conductor();
//$choferes_idchoferes=$transporte->getChoferes_idchoferes()->getIdchoferes();

      try {
          $sql= "INSERT INTO `transporte`(  `transporte_flete`, `factura_idfactura`, `transporte_conductor`, `choferes_idchoferes`)"
          ."VALUES ('$transporte_flete','$factura_idfactura','$transporte_conductor','$transporte_conductor')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Transporte en la base de datos.
     * @param transporte objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($transporte){
      $idtransporte=$transporte->getIdtransporte();

      try {
          $sql= "SELECT `idtransporte`, `transporte_flete`, `factura_idfactura`, `transporte_conductor`, `choferes_idchoferes`"
          ."FROM `transporte`"
          ."WHERE `idtransporte`='$idtransporte'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $transporte->setIdtransporte($data[$i]['idtransporte']);
          $transporte->setTransporte_flete($data[$i]['transporte_flete']);
           $factura = new Factura();
           $factura->setIdfactura($data[$i]['factura_idfactura']);
           $transporte->setFactura_idfactura($factura);
          $transporte->setTransporte_conductor($data[$i]['transporte_conductor']);
           $choferes = new Choferes();
           $choferes->setIdchoferes($data[$i]['choferes_idchoferes']);
           $transporte->setChoferes_idchoferes($choferes);

          }
      return $transporte;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Transporte en la base de datos.
     * @param transporte objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($transporte){
      $idtransporte=$transporte->getIdtransporte();
$transporte_flete=$transporte->getTransporte_flete();
$factura_idfactura=$transporte->getFactura_idfactura()->getIdfactura();
$transporte_conductor=$transporte->getTransporte_conductor();
$choferes_idchoferes=$transporte->getChoferes_idchoferes()->getIdchoferes();

      try {
          $sql= "UPDATE `transporte` SET`idtransporte`='$idtransporte' ,`transporte_flete`='$transporte_flete' ,`factura_idfactura`='$factura_idfactura' ,`transporte_conductor`='$transporte_conductor' ,`choferes_idchoferes`='$choferes_idchoferes' WHERE `idtransporte`='$idtransporte' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Transporte en la base de datos.
     * @param transporte objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($transporte){
      $idtransporte=$transporte->getIdtransporte();

      try {
          $sql ="DELETE FROM `transporte` WHERE `idtransporte`='$idtransporte'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Transporte en la base de datos.
     * @return ArrayList<Transporte> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idtransporte`, `transporte_flete`, `factura_idfactura`, `transporte_conductor`, `choferes_idchoferes`"
          ."FROM `transporte`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $transporte= new Transporte();
          $transporte->setIdtransporte($data[$i]['idtransporte']);
          $transporte->setTransporte_flete($data[$i]['transporte_flete']);
           $factura = new Factura();
           $factura->setIdfactura($data[$i]['factura_idfactura']);
           $transporte->setFactura_idfactura($factura);
          $transporte->setTransporte_conductor($data[$i]['transporte_conductor']);
           $choferes = new Choferes();
           $choferes->setIdchoferes($data[$i]['choferes_idchoferes']);
           $transporte->setChoferes_idchoferes($choferes);

          array_push($lista,$transporte);
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
          $sql ="SELECT `idtransporte`, `transporte_flete`, `factura_idfactura`, `transporte_conductor`"
          ."FROM `transporte`"
          ."WHERE `factura_idfactura` = '$factura_id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $transporte= new Transporte();
          $transporte->setIdtransporte($data[$i]['idtransporte']);
          $transporte->setTransporte_flete($data[$i]['transporte_flete']);
           $factura = new Factura();
           $factura->setIdfactura($data[$i]['factura_idfactura']);
           $transporte->setFactura_idfactura($factura);
          $transporte->setTransporte_conductor($data[$i]['transporte_conductor']);

          array_push($lista,$transporte);
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