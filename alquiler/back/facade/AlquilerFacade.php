<?php

/*
  -------Creado por-------
  \(x.x )/ Anarchy \( x.x)/
  ------------------------
 */

//    Ahora con 25% menos groserías  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Alquiler.php');
require_once realpath('../dao/interfaz/IAlquilerDao.php');
require_once realpath('../dto/Producto.php');
require_once realpath('../dto/Factura.php');

class AlquilerFacade {

    /**
     * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
     * @return idGestor Devuelve el identificador del gestor de conexión
     */
    private static function getGestorDefault() {
        return DEFAULT_GESTOR;
    }

    /**
     * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
     * @return dbName Devuelve el nombre de la base de datos a emplear
     */
    private static function getDataBaseDefault() {
        return DEFAULT_DBNAME;
    }

    /**
     * Crea un objeto Alquiler a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idalquiler
     * @param fecha_inicio
     * @param cantidad
     * @param valor
     * @param pagado
     * @param fechafin
     * @param producto_idprod
     * @param factura_idfactura
     * @param alq_stado
     * @param alq_devuelto
     */
    public static function insert($fecha_inicio, $cantidad, $valor, $producto_idprod, $factura_idfactura) {
        

        
        $alquiler = new Alquiler();
        $alquiler->setFecha_inicio($fecha_inicio);
        $alquiler->setCantidad($cantidad);
        $alquiler->setValor($valor);
        $alquiler->setProducto_idprod($producto_idprod);
        $alquiler->setFactura_idfactura($factura_idfactura);
        date_default_timezone_set('America/Lima');
        $fecha = date("Y-m-d");        
        $alquiler->setFechafin($fecha);
        $alquiler = self::crear_json_movimiento($alquiler, $cantidad, 0, 1,$fecha);
        
      
        
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $rtn = $alquilerDao->insert($alquiler);
        $alquilerDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Alquiler de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idalquiler
     * @return El objeto en base de datos o Null
     */
    public static function select($idalquiler) {
        $alquiler = new Alquiler();
        $alquiler->setIdalquiler($idalquiler);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $result = $alquilerDao->select($alquiler);
        $alquilerDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Alquiler  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idalquiler
     * @param fecha_inicio
     * @param cantidad
     * @param valor
     * @param pagado
     * @param fechafin
     * @param producto_idprod
     * @param factura_idfactura
     * @param alq_stado
     * @param alq_devuelto
     */
    public static function update($idalquiler, $fecha_inicio, $cantidad, $valor, $pagado, $fechafin, $producto_idprod, $factura_idfactura, $alq_stado, $alq_devuelto) {
        $alquiler = self::select($idalquiler);
        $alquiler->setFecha_inicio($fecha_inicio);
        $alquiler->setCantidad($cantidad);
        $alquiler->setValor($valor);
        $alquiler->setPagado($pagado);
        $alquiler->setFechafin($fechafin);
        $alquiler->setProducto_idprod($producto_idprod);
        $alquiler->setFactura_idfactura($factura_idfactura);
        $alquiler->setAlq_stado($alq_stado);
        $alquiler->setAlq_devuelto($alq_devuelto);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $alquilerDao->update($alquiler);
        $alquilerDao->close();
    }

    /**
     * Elimina un objeto Alquiler de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param idalquiler
     */
    public static function delete($idalquiler) {
        $alquiler = new Alquiler();
        $alquiler->setIdalquiler($idalquiler);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $alquilerDao->delete($alquiler);
        $alquilerDao->close();
    }

    /**
     * Lista todos los objetos Alquiler de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Alquiler en base de datos o Null
     */
    public static function listAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $result = $alquilerDao->listAll();
        $alquilerDao->close();
        return $result;
    }
    public static function listxAll() {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $result = $alquilerDao->listxAll();
        $alquilerDao->close();
        return $result;
    }

    public static function listByFactura($factura_id) {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $result = $alquilerDao->listByFactura($factura_id);
        $alquilerDao->close();
        return $result;
    }

    public static function devolver($idalquiler, $cantidad, $estado = 0, $fecha) {
        $alquiler = self::select($idalquiler);

        $alquiler = self::crear_json_movimiento($alquiler, $cantidad, $estado, 0, $fecha);

        $alquiler->setCantidad($alquiler->getCantidad() - $cantidad);
        $alquiler->setAlq_stado(1);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $alquilerDao->update($alquiler);
        $alquilerDao->close();
    }

    public static function editarAlquiler($alquiler,$cantidad) {
        
        $fecha = date("Y-m-d");        
        $alquiler->setFechafin($fecha);
        $alquiler = self::crear_json_movimiento($alquiler, $cantidad, 0, 1,$fecha);
        
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $alquilerDao = $FactoryDao->getalquilerDao(self::getDataBaseDefault());
        $rta = $alquilerDao->editarAlquiler($alquiler);
        $alquilerDao->close();
        return $rta;
    }

    public static function crear_json_movimiento($alquiler, $cantidad, $estado, $tipo, $fecha) {
        $arrayDevoluciones = json_decode($alquiler->getAlq_devuelto());
        if($arrayDevoluciones == null){
           $arrayDevoluciones = array(); 
        }
        $nuevaDev = new stdClass();        
        $nuevaDev->fecha = $fecha;
        $nuevaDev->cantidad = $cantidad;
        $nuevaDev->estado = $estado;
        $nuevaDev->tipo = $tipo;
        array_push($arrayDevoluciones, $nuevaDev);
        
        $alquiler->setFechafin($fecha);
        $alquiler->setAlq_devuelto(json_encode($arrayDevoluciones));

        return $alquiler;
    }

}
//That`s all folks!