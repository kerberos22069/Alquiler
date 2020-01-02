<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es tu vida y se acaba a cada minuto.  \\


class Producto {

  private $idprod;
  private $prod_nombre;
  private $prod_descripcion;
  private $prod_precio;
  private $prod_stock;
  private $prod_disponible;
  private $prod_reparacion;
  private $prod_danado;

    /**
     * Constructor de Producto
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idprod
     * @return idprod
     */
  public function getIdprod(){
      return $this->idprod;
  }

    /**
     * Modifica el valor correspondiente a idprod
     * @param idprod
     */
  public function setIdprod($idprod){
      $this->idprod = $idprod;
  }
    /**
     * Devuelve el valor correspondiente a prod_nombre
     * @return prod_nombre
     */
  public function getProd_nombre(){
      return $this->prod_nombre;
  }

    /**
     * Modifica el valor correspondiente a prod_nombre
     * @param prod_nombre
     */
  public function setProd_nombre($prod_nombre){
      $this->prod_nombre = $prod_nombre;
  }
    /**
     * Devuelve el valor correspondiente a prod_descripcion
     * @return prod_descripcion
     */
  public function getProd_descripcion(){
      return $this->prod_descripcion;
  }

    /**
     * Modifica el valor correspondiente a prod_descripcion
     * @param prod_descripcion
     */
  public function setProd_descripcion($prod_descripcion){
      $this->prod_descripcion = $prod_descripcion;
  }
    /**
     * Devuelve el valor correspondiente a prod_precio
     * @return prod_precio
     */
  public function getProd_precio(){
      return $this->prod_precio;
  }

    /**
     * Modifica el valor correspondiente a prod_precio
     * @param prod_precio
     */
  public function setProd_precio($prod_precio){
      $this->prod_precio = $prod_precio;
  }
    /**
     * Devuelve el valor correspondiente a prod_stock
     * @return prod_stock
     */
  public function getProd_stock(){
      return $this->prod_stock;
  }

    /**
     * Modifica el valor correspondiente a prod_stock
     * @param prod_stock
     */
  public function setProd_stock($prod_stock){
      $this->prod_stock = $prod_stock;
  }
    /**
     * Devuelve el valor correspondiente a prod_disponible
     * @return prod_disponible
     */
  public function getProd_disponible(){
      return $this->prod_disponible;
  }

    /**
     * Modifica el valor correspondiente a prod_disponible
     * @param prod_disponible
     */
  public function setProd_disponible($prod_disponible){
      $this->prod_disponible = $prod_disponible;
  }
    /**
     * Devuelve el valor correspondiente a prod_reparacion
     * @return prod_reparacion
     */
  public function getProd_reparacion(){
      return $this->prod_reparacion;
  }

    /**
     * Modifica el valor correspondiente a prod_reparacion
     * @param prod_reparacion
     */
  public function setProd_reparacion($prod_reparacion){
      $this->prod_reparacion = $prod_reparacion;
  }
    /**
     * Devuelve el valor correspondiente a prod_danado
     * @return prod_danado
     */
  public function getProd_danado(){
      return $this->prod_danado;
  }

    /**
     * Modifica el valor correspondiente a prod_danado
     * @param prod_danado
     */
  public function setProd_danado($prod_danado){
      $this->prod_danado = $prod_danado;
  }


}
//That`s all folks!