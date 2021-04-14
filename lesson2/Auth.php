<?php

class Auth
{
    private $cookieKey = "AuthCookie";

    public function __construct()
    {
    }

    private function setCookie($user_id)
    {
        setcookie($this->cookieKey, $user_id, 180);
    }

    public function login($login, $password)
    {
        if (!$this->validate($login)) {
            return false;
        }

        if (!$this->validate($password)) {
            return false;
        }

        $userId = $this->getUser($login, $password);

        if (!$userId) {
            return false;
        }

        $this->setCookie($userId);
    }

    private function getUser($login, $password)
    {
        $id = 1;
        $loginFromDB = "Admin";
        $passwordFromDB = "password";
        if ($login == $loginFromDB && $password == $passwordFromDB) {
            return $id;
        }
        return false;
    }

    public function logout()
    {
        $this->setCookie(null);
    }

    public function checkLogin()
    {
        if (isset($_COOKIE[$this->cookieKey])) {
            return "logged in";
        }

        return "uhuyuu";
    }

    private function validate($value): bool
    {
        if (is_null($value)) {
            return false;
        }
        if (strlen($value) < 6) {
            return false;
        }
        return true;
    }

    public function __toString()
    {
        return $this->checkLogin();
    }
}
