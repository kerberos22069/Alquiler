<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Soy la sonrisa burlona y vengativa de Jack  \\


class Choferes {

  private $idchoferes;
  private $cc_chofer;
  private $nom_chofer;

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


}
//That`s all folks!