<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\


class Cliente {

  private $idcliente;
  private $cliente_nombre;
  private $cliente_apellido;
  private $cliente_cc;
  private $cliente_correo;
  private $cliente_telefono;
  private $cliente_direccion;
  private $cliente_stado;

    /**
     * Constructor de Cliente
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a idcliente
     * @return idcliente
     */
  public function getIdcliente(){
      return $this->idcliente;
  }

    /**
     * Modifica el valor correspondiente a idcliente
     * @param idcliente
     */
  public function setIdcliente($idcliente){
      $this->idcliente = $idcliente;
  }
    /**
     * Devuelve el valor correspondiente a cliente_nombre
     * @return cliente_nombre
     */
  public function getCliente_nombre(){
      return $this->cliente_nombre;
  }

    /**
     * Modifica el valor correspondiente a cliente_nombre
     * @param cliente_nombre
     */
  public function setCliente_nombre($cliente_nombre){
      $this->cliente_nombre = $cliente_nombre;
  }
    /**
     * Devuelve el valor correspondiente a cliente_apellido
     * @return cliente_apellido
     */
  public function getCliente_apellido(){
      return $this->cliente_apellido;
  }

    /**
     * Modifica el valor correspondiente a cliente_apellido
     * @param cliente_apellido
     */
  public function setCliente_apellido($cliente_apellido){
      $this->cliente_apellido = $cliente_apellido;
  }
    /**
     * Devuelve el valor correspondiente a cliente_cc
     * @return cliente_cc
     */
  public function getCliente_cc(){
      return $this->cliente_cc;
  }

    /**
     * Modifica el valor correspondiente a cliente_cc
     * @param cliente_cc
     */
  public function setCliente_cc($cliente_cc){
      $this->cliente_cc = $cliente_cc;
  }
    /**
     * Devuelve el valor correspondiente a cliente_correo
     * @return cliente_correo
     */
  public function getCliente_correo(){
      return $this->cliente_correo;
  }

    /**
     * Modifica el valor correspondiente a cliente_correo
     * @param cliente_correo
     */
  public function setCliente_correo($cliente_correo){
      $this->cliente_correo = $cliente_correo;
  }
    /**
     * Devuelve el valor correspondiente a cliente_telefono
     * @return cliente_telefono
     */
  public function getCliente_telefono(){
      return $this->cliente_telefono;
  }

    /**
     * Modifica el valor correspondiente a cliente_telefono
     * @param cliente_telefono
     */
  public function setCliente_telefono($cliente_telefono){
      $this->cliente_telefono = $cliente_telefono;
  }
    /**
     * Devuelve el valor correspondiente a cliente_direccion
     * @return cliente_direccion
     */
  public function getCliente_direccion(){
      return $this->cliente_direccion;
  }

    /**
     * Modifica el valor correspondiente a cliente_direccion
     * @param cliente_direccion
     */
  public function setCliente_direccion($cliente_direccion){
      $this->cliente_direccion = $cliente_direccion;
  }
    /**
     * Devuelve el valor correspondiente a cliente_stado
     * @return cliente_stado
     */
  public function getCliente_stado(){
      return $this->cliente_stado;
  }

    /**
     * Modifica el valor correspondiente a cliente_stado
     * @param cliente_stado
     */
  public function setCliente_stado($cliente_stado){
      $this->cliente_stado = $cliente_stado;
  }


}
//That`s all folks!