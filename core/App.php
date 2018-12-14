<?php

require_once 'exceptions/AppException.php';

class App
{
    private static $container=[];

    /**
     * @param string $key
     * @param $value
     */
    public static function bind (string $key, $value) //Añadir al array
    {
        static::$container[$key]=$value;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get (string $key) //Sacar del array
    {
        if(!array_key_exists($key, static::$container)) //Comprueba si un $key está en el array
            throw new AppException("No se ha encontrado la clave $key en el contenedor");
        return static::$container[$key];
    }

    /**
     * @return PDO
     */
    public static function getConnection() : PDO
    {
        if(!array_key_exists('connection' , static::$container))
            static::$container['connection']=Connection::make();
        return static::$container['connection'];
    }


}