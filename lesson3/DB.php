<?php

class DB
{
    public static $conn;

    public function test()
    {
        $conn = static::getConnection();
    }

    public static function getConnection()
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


    

    public function count()
    {
        
    }
}


// DB::$title;

$db1 = new DB();
$db2 = new DB();

// echo $db->title;

$db1->test("jjhj");
$db2->test("hhjhj");


$db1->count(); //2