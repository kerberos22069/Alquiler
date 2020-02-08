<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\

include_once realpath('../dao/interfaz/ILibro_diarioDao.php');
include_once realpath('../dto/Libro_diario.php');

class Libro_diarioDao implements ILibro_diarioDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($libro_diario){
      $idlibro_diario=$libro_diario->getIdlibro_diario();

      try {
          $sql= "INSERT INTO `libro_diario`( `idlibro_diario`)"
          ."VALUES ('$idlibro_diario')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($libro_diario){
      $idlibro_diario=$libro_diario->getIdlibro_diario();

      try {
          $sql= "SELECT `idlibro_diario`"
          ."FROM `libro_diario`"
          ."WHERE `idlibro_diario`='$idlibro_diario'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $libro_diario->setIdlibro_diario($data[$i]['idlibro_diario']);

          }
      return $libro_diario;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($libro_diario){
      $idlibro_diario=$libro_diario->getIdlibro_diario();

      try {
          $sql= "UPDATE `libro_diario` SET`idlibro_diario`='$idlibro_diario' WHERE `idlibro_diario`='$idlibro_diario' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($libro_diario){
      $idlibro_diario=$libro_diario->getIdlibro_diario();

      try {
          $sql ="DELETE FROM `libro_diario` WHERE `idlibro_diario`='$idlibro_diario'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Libro_diario en la base de datos.
     * @return ArrayList<Libro_diario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idlibro_diario`"
          ."FROM `libro_diario`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $libro_diario= new Libro_diario();
          $libro_diario->setIdlibro_diario($data[$i]['idlibro_diario']);

          array_push($lista,$libro_diario);
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