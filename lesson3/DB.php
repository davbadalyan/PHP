<?php

class DB
{
    public static $conn;

    public function __construct()
    {
        static::getConnection();
    }

    /**
     * @return PDO
     */
    public function instanceConnection(): PDO
    {
        return static::$conn;
    }

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        if(static::$conn)
        {
            return static::$conn;
        }
        try {
            $conn = new PDO("mysql:host=localhost;dbname=oop", "root", "root");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";

            static::$conn = $conn;
            return $conn;
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }
}

// DB::getConnection();

// $db = new DB();
// $db->instanceConnection();
// PDO
