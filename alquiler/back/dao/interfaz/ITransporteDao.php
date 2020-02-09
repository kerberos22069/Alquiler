<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\


interface ITransporteDao {

    /**
     * Guarda un objeto Transporte en la base de datos.
     * @param transporte objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($transporte);
    /**
     * Modifica un objeto Transporte en la base de datos.
     * @param transporte objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($transporte);
    /**
     * Elimina un objeto Transporte en la base de datos.
     * @param transporte objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($transporte);
    /**
     * Busca un objeto Transporte en la base de datos.
     * @param transporte objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($transporte);
    /**
     * Lista todos los objetos Transporte en la base de datos.
     * @return Array<Transporte> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!