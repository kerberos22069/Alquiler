<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\


class Factura {

  private $idfactura;
  private $fecha;
  private $fac_descueto;
  private $cliente_idcliente;

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
    /**
     * Devuelve el valor correspondiente a cliente_idcliente
     * @return cliente_idcliente
     */
  public function getCliente_idcliente(){
      return $this->cliente_idcliente;
  }

    /**
     * Modifica el valor correspondiente a cliente_idcliente
     * @param cliente_idcliente
     */
  public function setCliente_idcliente($cliente_idcliente){
      $this->cliente_idcliente = $cliente_idcliente;
  }

  public function get_data_formated(){
    return  array('idfactura' => $this->idfactura,
                  'fecha' => $this->fecha,
                  'fac_descueto' => $this->fac_descueto);
  }

}
//That`s all folks!