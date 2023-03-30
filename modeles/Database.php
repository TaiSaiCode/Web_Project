<?php

class DataBase extends PDO {
    private static $dbName = 'gestion_panier' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    private static $port = '3306';

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
    {
    try
        {
        //self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
        self::$cont =  new PDO( "mysql:host=".self::$dbHost."; port=".self::$port."; "."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);

        }
    catch(PDOException $e)
        {
        die($e->getMessage());
        }
    }
    return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }

}
