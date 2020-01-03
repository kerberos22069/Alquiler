<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...Y como plato principal: ¡Código espagueti!  \\


class Transporte {

  private $idtransporte;
  private $transporte_flete;
  private $factura_idfactura;
  private $transporte_conductor;

    /**
     * Constructor de Transporte
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idtransporte
     * @return idtransporte
     */
  public function getIdtransporte(){
      return $this->idtransporte;
  }

    /**
     * Modifica el valor correspondiente a idtransporte
     * @param idtransporte
     */
  public function setIdtransporte($idtransporte){
      $this->idtransporte = $idtransporte;
  }
    /**
     * Devuelve el valor correspondiente a transporte_flete
     * @return transporte_flete
     */
  public function getTransporte_flete(){
      return $this->transporte_flete;
  }

    /**
     * Modifica el valor correspondiente a transporte_flete
     * @param transporte_flete
     */
  public function setTransporte_flete($transporte_flete){
      $this->transporte_flete = $transporte_flete;
  }
    /**
     * Devuelve el valor correspondiente a factura_idfactura
     * @return factura_idfactura
     */
  public function getFactura_idfactura(){
      return $this->factura_idfactura;
  }

    /**
     * Modifica el valor correspondiente a factura_idfactura
     * @param factura_idfactura
     */
  public function setFactura_idfactura($factura_idfactura){
      $this->factura_idfactura = $factura_idfactura;
  }
    /**
     * Devuelve el valor correspondiente a transporte_conductor
     * @return transporte_conductor
     */
  public function getTransporte_conductor(){
      return $this->transporte_conductor;
  }

    /**
     * Modifica el valor correspondiente a transporte_conductor
     * @param transporte_conductor
     */
  public function setTransporte_conductor($transporte_conductor){
      $this->transporte_conductor = $transporte_conductor;
  }


}
//That`s all folks!