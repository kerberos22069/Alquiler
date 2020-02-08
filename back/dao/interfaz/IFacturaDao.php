<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lo sé porque lo sabe Fredy  \\


interface IFacturaDao {

    /**
     * Guarda un objeto Factura en la base de datos.
     * @param factura objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($factura);
    /**
     * Modifica un objeto Factura en la base de datos.
     * @param factura objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($factura);
    /**
     * Elimina un objeto Factura en la base de datos.
     * @param factura objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($factura);
    /**
     * Busca un objeto Factura en la base de datos.
     * @param factura objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($factura);
    /**
     * Lista todos los objetos Factura en la base de datos.
     * @return Array<Factura> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!