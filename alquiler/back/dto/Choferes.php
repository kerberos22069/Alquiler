<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La última regla es confiar en Arciniegas  \\


class Choferes {

  private $idchoferes;
  private $cc_chofer;
  private $nom_chofer;
  private $chofe_telefono;
  private $direccion;

    /**
     * Constructor de Choferes
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idchoferes
     * @return idchoferes
     */
  public function getIdchoferes(){
      return $this->idchoferes;
  }

    /**
     * Modifica el valor correspondiente a idchoferes
     * @param idchoferes
     */
  public function setIdchoferes($idchoferes){
      $this->idchoferes = $idchoferes;
  }
    /**
     * Devuelve el valor correspondiente a cc_chofer
     * @return cc_chofer
     */
  public function getCc_chofer(){
      return $this->cc_chofer;
  }

    /**
     * Modifica el valor correspondiente a cc_chofer
     * @param cc_chofer
     */
  public function setCc_chofer($cc_chofer){
      $this->cc_chofer = $cc_chofer;
  }
    /**
     * Devuelve el valor correspondiente a nom_chofer
     * @return nom_chofer
     */
  public function getNom_chofer(){
      return $this->nom_chofer;
  }

    /**
     * Modifica el valor correspondiente a nom_chofer
     * @param nom_chofer
     */
  public function setNom_chofer($nom_chofer){
      $this->nom_chofer = $nom_chofer;
  }
    /**
     * Devuelve el valor correspondiente a chofe_telefono
     * @return chofe_telefono
     */
  public function getChofe_telefono(){
      return $this->chofe_telefono;
  }

    /**
     * Modifica el valor correspondiente a chofe_telefono
     * @param chofe_telefono
     */
  public function setChofe_telefono($chofe_telefono){
      $this->chofe_telefono = $chofe_telefono;
  }
    /**
     * Devuelve el valor correspondiente a direccion
     * @return direccion
     */
  public function getDireccion(){
      return $this->direccion;
  }

    /**
     * Modifica el valor correspondiente a direccion
     * @param direccion
     */
  public function setDireccion($direccion){
      $this->direccion = $direccion;
  }


}
//That`s all folks!