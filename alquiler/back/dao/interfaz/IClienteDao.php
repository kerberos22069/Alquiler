<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\


interface IClienteDao {

    /**
     * Guarda un objeto Cliente en la base de datos.
     * @param cliente objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cliente);
    /**
     * Modifica un objeto Cliente en la base de datos.
     * @param cliente objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cliente);
    /**
     * Elimina un objeto Cliente en la base de datos.
     * @param cliente objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cliente);
    /**
     * Busca un objeto Cliente en la base de datos.
     * @param cliente objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cliente);
    /**
     * Lista todos los objetos Cliente en la base de datos.
     * @return Array<Cliente> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!