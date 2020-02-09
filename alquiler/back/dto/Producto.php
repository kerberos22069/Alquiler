<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Documentaqué?  \\


class Producto {

  private $idprod;
  private $prod_nombre;
  private $prod_descripcion;
  private $prod_precio;
  private $prod_stock;
  private $prod_alquilado;
  private $prod_reparacion;
  private $prod_danado;
  private $prod_stado;
  private $foto;

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
     * Devuelve el valor correspondiente a prod_alquilado
     * @return prod_alquilado
     */
  public function getProd_alquilado(){
      return $this->prod_alquilado;
  }

    /**
     * Modifica el valor correspondiente a prod_alquilado
     * @param prod_alquilado
     */
  public function setProd_alquilado($prod_alquilado){
      $this->prod_alquilado = $prod_alquilado;
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
    /**
     * Devuelve el valor correspondiente a prod_stado
     * @return prod_stado
     */
  public function getProd_stado(){
      return $this->prod_stado;
  }

    /**
     * Modifica el valor correspondiente a prod_stado
     * @param prod_stado
     */
  public function setProd_stado($prod_stado){
      $this->prod_stado = $prod_stado;
  }
    /**
     * Devuelve el valor correspondiente a foto
     * @return foto
     */
  public function getFoto(){
      return $this->foto;
  }

    /**
     * Modifica el valor correspondiente a foto
     * @param foto
     */
  public function setFoto($foto){
      $this->foto = $foto;
  }


}
//That`s all folks!