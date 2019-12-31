<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\

include_once realpath('../dao/interfaz/IClienteDao.php');
include_once realpath('../dto/Cliente.php');

class ClienteDao implements IClienteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Cliente en la base de datos.
     * @param cliente objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cliente){
//      $idcliente=$cliente->getIdcliente();
$cliente_nombre=$cliente->getCliente_nombre();
$cliente_apellido=$cliente->getCliente_apellido();
$cliente_cc=$cliente->getCliente_cc();
$cliente_correo=$cliente->getCliente_correo();
$cliente_telefono=$cliente->getCliente_telefono();
$cliente_direccion=$cliente->getCliente_direccion();
$cliente_stado=$cliente->getCliente_stado();

      try {
          $sql= "INSERT INTO `cliente`(  `cliente_nombre`, `cliente_apellido`, `cliente_cc`, `cliente_correo`, `cliente_telefono`, `cliente_direccion`, `cliente_stado`)"
          ."VALUES ('$cliente_nombre','$cliente_apellido','$cliente_cc','$cliente_correo','$cliente_telefono','$cliente_direccion','$cliente_stado')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cliente en la base de datos.
     * @param cliente objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cliente){
      $idcliente=$cliente->getIdcliente();

      try {
          $sql= "SELECT `idcliente`, `cliente_nombre`, `cliente_apellido`, `cliente_cc`, `cliente_correo`, `cliente_telefono`, `cliente_direccion`, `cliente_stado`"
          ."FROM `cliente`"
          ."WHERE `idcliente`='$idcliente'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $cliente->setIdcliente($data[$i]['idcliente']);
          $cliente->setCliente_nombre($data[$i]['cliente_nombre']);
          $cliente->setCliente_apellido($data[$i]['cliente_apellido']);
          $cliente->setCliente_cc($data[$i]['cliente_cc']);
          $cliente->setCliente_correo($data[$i]['cliente_correo']);
          $cliente->setCliente_telefono($data[$i]['cliente_telefono']);
          $cliente->setCliente_direccion($data[$i]['cliente_direccion']);
          $cliente->setCliente_stado($data[$i]['cliente_stado']);

          }
      return $cliente;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Cliente en la base de datos.
     * @param cliente objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cliente){
      $idcliente=$cliente->getIdcliente();
$cliente_nombre=$cliente->getCliente_nombre();
$cliente_apellido=$cliente->getCliente_apellido();
$cliente_cc=$cliente->getCliente_cc();
$cliente_correo=$cliente->getCliente_correo();
$cliente_telefono=$cliente->getCliente_telefono();
$cliente_direccion=$cliente->getCliente_direccion();
//$cliente_stado=$cliente->getCliente_stado();

      try {
          $sql= "UPDATE `cliente` SET `cliente_nombre`='$cliente_nombre' ,`cliente_apellido`='$cliente_apellido' ,`cliente_cc`='$cliente_cc' ,`cliente_correo`='$cliente_correo' ,`cliente_telefono`='$cliente_telefono' ,`cliente_direccion`='$cliente_direccion'  WHERE `idcliente`='$idcliente' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  public function update_delete($cliente){
      $idcliente=$cliente->getIdcliente();

//$cliente_stado=$cliente->getCliente_stado();

      try {
          $sql= "UPDATE `cliente` SET `cliente_stado`='0' WHERE `idcliente`='$idcliente' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Cliente en la base de datos.
     * @param cliente objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cliente){
      $idcliente=$cliente->getIdcliente();

      try {
          $sql ="DELETE FROM `cliente` WHERE `idcliente`='$idcliente'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cliente en la base de datos.
     * @return ArrayList<Cliente> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idcliente`, `cliente_nombre`, `cliente_apellido`, `cliente_cc`, `cliente_correo`, `cliente_telefono`, `cliente_direccion`, `cliente_stado`"
          ."FROM `cliente`"
          ."WHERE `cliente_stado`='1' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cliente= new Cliente();
          $cliente->setIdcliente($data[$i]['idcliente']);
          $cliente->setCliente_nombre($data[$i]['cliente_nombre']);
          $cliente->setCliente_apellido($data[$i]['cliente_apellido']);
          $cliente->setCliente_cc($data[$i]['cliente_cc']);
          $cliente->setCliente_correo($data[$i]['cliente_correo']);
          $cliente->setCliente_telefono($data[$i]['cliente_telefono']);
          $cliente->setCliente_direccion($data[$i]['cliente_direccion']);
          $cliente->setCliente_stado($data[$i]['cliente_stado']);

          array_push($lista,$cliente);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
    public function list_x_Id($id){
      $lista = array();
      try {
          $sql ="SELECT `idcliente`, `cliente_nombre`, `cliente_apellido`, `cliente_cc`, `cliente_correo`, `cliente_telefono`, `cliente_direccion`"
          ."FROM `cliente`"
          ."WHERE `idcliente`='$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cliente= new Cliente();
          $cliente->setIdcliente($data[$i]['idcliente']);
          $cliente->setCliente_nombre($data[$i]['cliente_nombre']);
          $cliente->setCliente_apellido($data[$i]['cliente_apellido']);
          $cliente->setCliente_cc($data[$i]['cliente_cc']);
          $cliente->setCliente_correo($data[$i]['cliente_correo']);
          $cliente->setCliente_telefono($data[$i]['cliente_telefono']);
          $cliente->setCliente_direccion($data[$i]['cliente_direccion']);
          

          array_push($lista,$cliente);
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