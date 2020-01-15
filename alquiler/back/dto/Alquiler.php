<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\


class Alquiler {

  private $idalquiler;
  private $fecha_inicio;
  private $cantidad;
  private $valor;
  private $pagado;
  private $fechafin;
  private $producto_idprod;
  private $factura_idfactura;
  private $alq_stado;
  private $alq_devuelto;

    /**
     * Constructor de Alquiler
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idalquiler
     * @return idalquiler
     */
  public function getIdalquiler(){
      return $this->idalquiler;
  }

    /**
     * Modifica el valor correspondiente a idalquiler
     * @param idalquiler
     */
  public function setIdalquiler($idalquiler){
      $this->idalquiler = $idalquiler;
  }
    /**
     * Devuelve el valor correspondiente a fecha_inicio
     * @return fecha_inicio
     */
  public function getFecha_inicio(){
      return $this->fecha_inicio;
  }

    /**
     * Modifica el valor correspondiente a fecha_inicio
     * @param fecha_inicio
     */
  public function setFecha_inicio($fecha_inicio){
      $this->fecha_inicio = $fecha_inicio;
  }
    /**
     * Devuelve el valor correspondiente a cantidad
     * @return cantidad
     */
  public function getCantidad(){
      return $this->cantidad;
  }

    /**
     * Modifica el valor correspondiente a cantidad
     * @param cantidad
     */
  public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
  }
    /**
     * Devuelve el valor correspondiente a valor
     * @return valor
     */
  public function getValor(){
      return $this->valor;
  }
 
    /**
     * Modifica el valor correspondiente a valor
     * @param valor
     */
  public function setValor($valor){
      $this->valor = $valor;
  }
    /**
     * Devuelve el valor correspondiente a pagado
     * @return pagado
     */
  public function getPagado(){
      return $this->pagado;
  }

    /**
     * Modifica el valor correspondiente a pagado
     * @param pagado
     */
  public function setPagado($pagado){
      $this->pagado = $pagado;
  }
    /**
     * Devuelve el valor correspondiente a fechafin
     * @return fechafin
     */
  public function getFechafin(){
      return $this->fechafin;
  }

    /**
     * Modifica el valor correspondiente a fechafin
     * @param fechafin
     */
  public function setFechafin($fechafin){
      $this->fechafin = $fechafin;
  }
    /**
     * Devuelve el valor correspondiente a producto_idprod
     * @return producto_idprod
     */
  public function getProducto_idprod(){
      return $this->producto_idprod;
  }

    /**
     * Modifica el valor correspondiente a producto_idprod
     * @param producto_idprod
     */
  public function setProducto_idprod($producto_idprod){
      $this->producto_idprod = $producto_idprod;
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
     * Devuelve el valor correspondiente a alq_stado
     * @return alq_stado
     */
  public function getAlq_stado(){
      return $this->alq_stado;
  }

    /**
     * Modifica el valor correspondiente a alq_stado
     * @param alq_stado
     */
  public function setAlq_stado($alq_stado){
      $this->alq_stado = $alq_stado;
  }
    /**
     * Devuelve el valor correspondiente a alq_devuelto
     * @return alq_devuelto
     */
  public function getAlq_devuelto(){
      return $this->alq_devuelto;
  }

    /**
     * Modifica el valor correspondiente a alq_devuelto
     * @param alq_devuelto
     */
  public function setAlq_devuelto($alq_devuelto){
      $this->alq_devuelto = $alq_devuelto;
  }


}
//That`s all folks!