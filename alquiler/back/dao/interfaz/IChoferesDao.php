<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\


interface IChoferesDao {

    /**
     * Guarda un objeto Choferes en la base de datos.
     * @param choferes objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($choferes);
    /**
     * Modifica un objeto Choferes en la base de datos.
     * @param choferes objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($choferes);
    /**
     * Elimina un objeto Choferes en la base de datos.
     * @param choferes objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($choferes);
    /**
     * Busca un objeto Choferes en la base de datos.
     * @param choferes objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($choferes);
    /**
     * Lista todos los objetos Choferes en la base de datos.
     * @return Array<Choferes> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!