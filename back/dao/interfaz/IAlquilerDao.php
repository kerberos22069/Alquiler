<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\


interface IAlquilerDao {

    /**
     * Guarda un objeto Alquiler en la base de datos.
     * @param alquiler objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($alquiler);
    /**
     * Modifica un objeto Alquiler en la base de datos.
     * @param alquiler objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($alquiler);
    /**
     * Elimina un objeto Alquiler en la base de datos.
     * @param alquiler objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($alquiler);
    /**
     * Busca un objeto Alquiler en la base de datos.
     * @param alquiler objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($alquiler);
    /**
     * Lista todos los objetos Alquiler en la base de datos.
     * @return Array<Alquiler> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!