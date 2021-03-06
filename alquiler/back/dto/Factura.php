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
  private $abonos;
  private $obra;
  private $direccion_obra;
  private $observacion;

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
                  'fac_descueto' => $this->fac_descueto,
                  'cliente_idcliente' => $this->cliente_idcliente,
                  'abonos' => $this->abonos,
                  'obra' => $this->obra,
                  'direccion_obra'=> $this->direccion_obra,
                  'observacion'=> $this->observacion,
                );
  }

  public function getAbonos(){
      return $this->abonos;
  }
  
  public function setAbonos($abonos){
      $this->abonos = $abonos;

  }


  public function getObra(){
      return $this->obra;
  }

  public function setObra($obra){
      $this->obra = $obra;
  }

  public function getDireccionObra(){
      return $this->direccion_obra;
  }

  public function setDireccionObra($direccion_obra){
      $this->direccion_obra = $direccion_obra;
  }

  public function getObservacion(){
      return $this->observacion;
  }

  public function setObservacion($observacion){
      $this->observacion = $observacion;
  }
 
}
//That`s all folks!