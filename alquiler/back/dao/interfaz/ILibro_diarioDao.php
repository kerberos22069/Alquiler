<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


interface ILibro_diarioDao {

    /**
     * Guarda un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($libro_diario);
    /**
     * Modifica un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($libro_diario);
    /**
     * Elimina un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($libro_diario);
    /**
     * Busca un objeto Libro_diario en la base de datos.
     * @param libro_diario objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($libro_diario);
    /**
     * Lista todos los objetos Libro_diario en la base de datos.
     * @return Array<Libro_diario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!