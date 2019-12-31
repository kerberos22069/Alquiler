<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Documentaqué?  \\


class Factura {

  private $idfactura;
  private $fecha;
  private $fac_descueto;

    /**
     * Constructor de Factura
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idfactura
     * @return idfactura
     */
  public function getIdfactura(){
      return $this->idfactura;
  }

    /**
     * Modifica el valor correspondiente a idfactura
     * @param idfactura
     */
  public function setIdfactura($idfactura){
      $this->idfactura = $idfactura;
  }
    /**
     * Devuelve el valor correspondiente a fecha
     * @return fecha
     */
  public function getFecha(){
      return $this->fecha;
  }

    /**
     * Modifica el valor correspondiente a fecha
     * @param fecha
     */
  public function setFecha($fecha){
      $this->fecha = $fecha;
  }
    /**
     * Devuelve el valor correspondiente a fac_descueto
     * @return fac_descueto
     */
  public function getFac_descueto(){
      return $this->fac_descueto;
  }

    /**
     * Modifica el valor correspondiente a fac_descueto
     * @param fac_descueto
     */
  public function setFac_descueto($fac_descueto){
      $this->fac_descueto = $fac_descueto;
  }


}
//That`s all folks!