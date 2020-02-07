<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\

include_once realpath('../dao/interfaz/IChoferesDao.php');
include_once realpath('../dto/Choferes.php');

class ChoferesDao implements IChoferesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Choferes en la base de datos.
     * @param choferes objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($choferes){
//      $idchoferes=$choferes->getIdchoferes();
$cc_chofer=$choferes->getCc_chofer();
$nom_chofer=$choferes->getNom_chofer();

      try {
          $sql= "INSERT INTO `choferes`( `cc_chofer`, `nom_chofer`)"
          ."VALUES ($cc_chofer','$nom_chofer')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Choferes en la base de datos.
     * @param choferes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($choferes){
      $idchoferes=$choferes->getIdchoferes();

      try {
          $sql= "SELECT `idchoferes`, `cc_chofer`, `nom_chofer`"
          ."FROM `choferes`"
          ."WHERE `idchoferes`='$idchoferes'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $choferes->setIdchoferes($data[$i]['idchoferes']);
          $choferes->setCc_chofer($data[$i]['cc_chofer']);
          $choferes->setNom_chofer($data[$i]['nom_chofer']);

          }
      return $choferes;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Choferes en la base de datos.
     * @param choferes objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($choferes){
      $idchoferes=$choferes->getIdchoferes();
$cc_chofer=$choferes->getCc_chofer();
$nom_chofer=$choferes->getNom_chofer();

      try {
          $sql= "UPDATE `choferes` SET`idchoferes`='$idchoferes' ,`cc_chofer`='$cc_chofer' ,`nom_chofer`='$nom_chofer' WHERE `idchoferes`='$idchoferes' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Choferes en la base de datos.
     * @param choferes objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($choferes){
      $idchoferes=$choferes->getIdchoferes();

      try {
          $sql ="DELETE FROM `choferes` WHERE `idchoferes`='$idchoferes'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Choferes en la base de datos.
     * @return ArrayList<Choferes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `idchoferes`, `cc_chofer`, `nom_chofer`"
          ."FROM `choferes`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $choferes= new Choferes();
          $choferes->setIdchoferes($data[$i]['idchoferes']);
          $choferes->setCc_chofer($data[$i]['cc_chofer']);
          $choferes->setNom_chofer($data[$i]['nom_chofer']);

          array_push($lista,$choferes);
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