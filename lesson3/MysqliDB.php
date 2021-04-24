<?php

class MysqliDB
{
    public static $conn;

    public function __construct()
    {
        static::getConnection();
    }

    /**
     * @return mysqli
     */
    public function instanceConnection(): mysqli
    {
        return static::$conn;
    }

    /**
     * @return mysqli
     */
    public static function getConnection(): mysqli
    {
        if(static::$conn)
        {
            return static::$conn;
        }
        try {
            $conn = new mysqli("localhost","my_user","my_password","my_db");

            static::$conn = $conn;
            return $conn;
        } catch (\Exception $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }
}