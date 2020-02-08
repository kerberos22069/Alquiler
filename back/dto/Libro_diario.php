<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\


class Libro_diario {

  private $idlibro_diario;

    /**
     * Constructor de Libro_diario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idlibro_diario
     * @return idlibro_diario
     */
  public function getIdlibro_diario(){
      return $this->idlibro_diario;
  }

    /**
     * Modifica el valor correspondiente a idlibro_diario
     * @param idlibro_diario
     */
  public function setIdlibro_diario($idlibro_diario){
      $this->idlibro_diario = $idlibro_diario;
  }


}
//That`s all folks!