<?php

class Auth
{
    private $cookieKey = "AuthCookie";

    private $conn;

    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=oop", "root", "root");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";

            $this->conn = $conn;
        } catch (PDOException $e) {
            // echo "Connection failed: " . $e->getMessage();
        }
    }

    private function setCookie($user_id, $time = 180)
    {
        setcookie($this->cookieKey, $user_id, time() + $time, "/");
    }

    private function redirect($path)
    {
        header("Location: " . $path);
    }

    public function redirectIfNotAuthenticated($path)
    {
        if (!$this->checkLogin())
            $this->redirect($path);
    }

    public function redirectIfAuthenticated($path)
    {
        if ($this->checkLogin())
            $this->redirect($path);
    }

    public function user()
    {
        $id = $_COOKIE[$this->cookieKey];

        $usersQuery = "SELECT * FROM users WHERE id = '{$id}' LIMIT 1";
        $stmt = $this->conn->query($usersQuery);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function login($login, $password)
    {
        if (!$this->validate($login)) {
            return false;
        }

        if (!$this->validate($password)) {
            return false;
        }
        // die($login);

        $userId = $this->getUser($login, $password);

        if (!$userId) {
            return false;
        }

        $this->setCookie($userId);

        $this->redirect("admin.php");
    }

    private function getUser($login, $password)
    {
        $usersQuery = "SELECT * FROM users WHERE login = '{$login}' LIMIT 1";
        $stmt = $this->conn->query($usersQuery);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($user))
            return false;

        if ($user["login"] !== $login)
            return "Invalid data";

        if ($user["password"] !== $password)
            return "Invalid data";

        return $user["id"];

        // $id = 1;
        // $loginFromDB = "Admin";
        // $passwordFromDB = "password";
        // if ($login == $loginFromDB && $password == $passwordFromDB) {
        //     return $id;
        // }
        // return false;
    }

    public function logout()
    {
        $this->setCookie(null, -1);

        $this->redirect("client.php");
    }

    public function checkLogin()
    {
        if (isset($_COOKIE[$this->cookieKey]) && is_numeric($_COOKIE[$this->cookieKey])) {
            return true;
        }

        return false;
    }

    private function validate($value): bool
    {
        if (is_null($value)) {
            return false;
        }

        if (strlen($value) < 4) {
            return false;
        }
        return true;
    }

    public function __toString()
    {
        return $this->checkLogin();
    }
}
